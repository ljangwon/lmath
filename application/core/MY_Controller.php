<?php
class MY_Controller extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        if($peak = $this->config->item('peak_page_cache')){
            if($peak == current_url()){
                $this->output->cache(5);
            }
        }
        $this->load->database();
        if(!$this->input->is_cli_request())
            $this->load->library('session');      
        $this->load->driver('cache', array('adapter' => 'file'));
    }
    
    function _head(){
        $this->load->config('leanmath');
        $this->load->view('head');        
    }
    function _sidebar(){
        if ( ! $topics = $this->cache->get('topics')) {
            $topics = $this->topic_model->gets();    
            //$this->cache->save('topics', $topics, 300);
        }
        $this->load->view('topic_list', array('topics'=>$topics));
    }
    function _footer(){
        $this->load->view('footer');
    }
    function _require_login($return_url){
        // 로그인이 되어 있지 않다면 로그인 페이지로 리다이렉션
        if(!$this->session->userdata('is_login')){
            alert('로그인이 필요합니다.',site_url('/auth/login?returnURL='.rawurlencode($return_url) ));
        }
    }

    function _student_head(){
        //$this->_head();
        $this->load->config('leanmath');
        $this->load->view('student/head_v');  
    }

    function _student_sidebar(){
        if ( ! $students = $this->cache->get('students')) {
            $students = $this->student_m->gets();    
            //$this->cache->save('students', $students, 300);
       }
        $this->load->view('student/list_v', 
            array(
                'students'=>$students
            ));
    }

    function _student_footer(){

        //$this->_footer();
        $this->load->view('student/footer_v');

    }

}