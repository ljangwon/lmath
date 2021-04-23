<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Student extends MY_Controller {
    function __construct()
    {       
        parent::__construct();
        
        $this->load->model('student_m');
    }
    function index(){        
        $this->_student_head();
        $this->_student_sidebar();

        $this->load->view('student/main_v');

        $this->_student_footer();
    }
    function get($id){        

        $this->_student_head();
        $this->_student_sidebar();

        if(!$id) {
            redirect( site_url('/student'));
        }

        $student = $this->student_m->get($id);

        if(empty($student)){
            alert('student의 값이 없습니다');
        }

        $this->load->helper(array( 'HTML', 'korean'));

        $this->load->view('student/get_v', array('student'=>$student));

        $this->_student_footer();

    }

    function delete(){
        $student_id = $this->input->post('student_id');
        $this->_require_login(site_url('/student/get/'.$student_id));
        $this->load->model('student_m');
        $this->student_m->delete($student_id);
        $this->cache->delete('students');
        redirect( site_url('/student') );
    }

    function add(){
     
        // 로그인 필요
        // 로그인이 되어 있지 않다면 로그인 페이지로 리다이렉션

        $this->_require_login(site_url('/student/add'));
     
        $this->_student_head();
        $this->_student_sidebar();
         
        $this->load->library('form_validation');
     
        $this->form_validation->set_rules('name', '이름', 'required');
        $this->form_validation->set_rules('grade1', '학년구분1', 'required');
        $this->form_validation->set_rules('grade2', '학년구분2', 'required');
        $this->form_validation->set_rules('class_name', '수업이름', 'required');
        $this->form_validation->set_rules('memo', '메모', 'required');
         
        if ($this->form_validation->run() == FALSE)
        {
             $this->load->view('student/add_v');
        }
        else
        {
            $student_id = $this->student_m->add( array(
                'name'=>$this->input->post('name'), 
                'grade1'=>$this->input->post('grade1'),
                'grade2'=>$this->input->post('grade2'),
                'class_name'=>$this->input->post('class_name'),
                'memo'=>$this->input->post('memo')
                )
            );

            $this->cache->delete('students');

            redirect( site_url('/student/get/'.$student_id) );
        }
         
        $this->_student_footer();
    }

    function modify() {
        // 로그인 필요
        // 로그인이 되어 있지 않다면 로그인 페이지로 리다이렉션

        $this->_require_login(site_url('/student/modify'));
     
        $this->_student_head();
        $this->_student_sidebar();
         
        $this->load->library('form_validation');
     
        $this->form_validation->set_rules('name', '이름', 'required');
        $this->form_validation->set_rules('grade1', '학년구분1', 'required');

        $this->form_validation->set_rules('grade2', '학년구분2', 'required');
        $this->form_validation->set_rules('class_name', '수업이름', 'required');
        $this->form_validation->set_rules('memo', '메모', 'required');
        $this->form_validation->set_rules('fees', '수업료', 'required');
         
        if ($this->form_validation->run() == FALSE)
        {
            
             redirect( site_url('/student/get/'.$this->input->post('id')) ) ;
        }
        else
        {
            $student_id = $this->student_m->modify( array (
                'id'=>$this->input->post('id'),
                'name'=>$this->input->post('name'), 
                'grade1'=>$this->input->post('grade1'),
                'school_name'=>$this->input->post('school_name'),
                'grade2'=>$this->input->post('grade2'),
                'class_name'=>$this->input->post('class_name'),
                'memo'=>$this->input->post('memo'),
                'fees'=>$this->input->post('fees')
                )
            );

            $this->cache->delete('students');

            redirect( site_url('/student/get/'.$student_id) );
        }
         
        $this->_student_footer();
    }

}
?>