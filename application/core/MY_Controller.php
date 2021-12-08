<?php
class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        /*         if ($peak = $this->config->item('peak_page_cache')) {
            if ($peak == current_url()) {
                $this->output->cache(5);
            }
        }

        $this->load->database();

        if (!$this->input->is_cli_request())
            $this->load->library('session');
        $this->load->driver('cache', array('adapter' => 'file')); */
    }

    function _require_login($return_url, $level)
    {
        // 로그인이 되어 있지 않다면 로그인 페이지로 리다이렉션
        if (!$this->session->userdata('is_login')) {
            alert('로그인이 필요합니다.', site_url('/auth/login?returnURL=' . rawurlencode($return_url)));
        }

        if ($this->session->userdata('level') < $level) {
            alert('권한이 부족합니다.', site_url('/auth/login?returnURL=' . rawurlencode($return_url)));
        }
    }
}
