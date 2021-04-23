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
            $st_count_h = $this->student_m->get_count('고등');
            $st_count_m = $this->student_m->get_count('중등');
            $st_count_e = $this->student_m->get_count('초등');

            $st_fees_sum_h = $this->student_m->get_fees_sum('고등');
            $st_fees_sum_m = $this->student_m->get_fees_sum('중등');
            $st_fees_sum_e = $this->student_m->get_fees_sum('초등');

       }
        $this->load->view('student/list_v', 
            array(
                'students'=>$students, 
                'st_count_h'=>$st_count_h,
                'st_count_m'=>$st_count_m,
                'st_count_e'=>$st_count_e,
                'st_fees_sum_h'=>$st_fees_sum_h,
                'st_fees_sum_m'=>$st_fees_sum_m,
                'st_fees_sum_e'=>$st_fees_sum_e            
            ));
    }
    function _student_footer(){

        //$this->_footer();
        $this->load->view('student/footer_v');

    }

}