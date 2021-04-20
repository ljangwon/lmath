<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends MY_Controller {
    function __construct()
    {       
        parent::__construct();    
    }

    function index(){        
        $this->login();
    }

    function login(){
    	$this->_head();
        $this->load->helper('url');
        $this->load->view('login', array('returnURL'=>$this->input->get('returnURL')));     
        $this->_footer();   
    }

    function logout(){
    	$this->session->sess_destroy();
    	$this->load->helper('url');
        redirect($this->config->item('base_url'));
    }

    function register(){
        $this->_head();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', '이메일 주소', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('nickname', '닉네임', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('password', '비밀번호', 'required|min_length[6]|max_length[30]|matches[re_password]');
        $this->form_validation->set_rules('re_password', '비밀번호 확인', 'required');

        if($this->form_validation->run() === false){
            $this->load->view('register');    
        } else {
            if(!function_exists('password_hash')){
                $this->load->helper('password');
            }
            $hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            $this->load->model('user_model');
            $this->user_model->add(array(
                'email'=>$this->input->post('email'),
                'password'=>$hash,
                'nickname'=>$this->input->post('nickname')
            ));

            $this->session->set_flashdata('message', '회원가입에 성공했습니다.');
            $this->load->helper('url');
            redirect($this->config->item('base_url'));
        }
        
        $this->_footer();   
    }

    function authentication(){
    	$this->load->model('user_model');
        $user = $this->user_model->getByEmail(array('email'=>$this->input->post('email')));
        if(!function_exists('password_hash')){
            $this->load->helper('password');
        }
    	if(
    		$this->input->post('email') == $user->email && 
            password_verify($this->input->post('password'), $user->password)
    	) {
    		$this->session->set_userdata('is_login', true);
            $this->session->set_userdata('name', $user->name );
    		$this->load->helper('url');
            $returnURL = $this->input->get('returnURL');
            if($returnURL === false){
                $returnURL = $this->config->item('base_url');
            }
            redirect($returnURL);
    	} else {
    		$this->session->set_flashdata('message', '로그인에 실패 했습니다.');
    		$this->load->helper('url');
    		redirect( site_url('/auth/login') );
    	}
    }

    function _head() {
        $this->load->view('head');
    }

    function _footer() {
        $this->load->view('footer');
    }
    
}