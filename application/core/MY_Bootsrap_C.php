<?php
class MY_Bootstrap_C extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    function _head(){
        $this->load->view('bootstrap/header_v');        
    }

    function _main(){
        $this->load->view('bootstrap/main_v');
    }

    function _footer(){
        $this->load->view('bootstrap/footer_v');
    }

    function _require_login($return_url){
        // 로그인이 되어 있지 않다면 로그인 페이지로 리다이렉션
        if(!$this->session->userdata('is_login')){
            alert('로그인이 필요합니다.',
            site_url('/auth/login?returnURL='.rawurlencode($return_url) ));
        }
    }   
}