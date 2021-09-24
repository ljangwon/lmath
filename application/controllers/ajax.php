<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends MY_Controller
{
	// 기본 생성자
	function __construct()
	{
		parent::__construct();

		$this->load->view('ajax/head_v');
		$this->load->model('shopping_m');
	}

	// 기본 컨트롤
	public function index()
	{
		$this->load->view(
			'ajax/index_v',
			array(
			)
		);
		$this->load->view(
			'ajax/footer_v',
			array(
			)
		);
	}

	public function gets()
	{
		$items = $this->shopping_m->shopping_gets();

		return $items;

	}

	public function ajax_test()
	{
	
		$this->load->view(
			'ajax/ajax_test_v',
			array(
			)
		);
		
	}

}

