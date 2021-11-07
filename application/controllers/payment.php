<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends MY_Controller
{
	// 기본 생성자
	function __construct()
	{
		parent::__construct();

		$this->load->view('common/head_v');
		$this->_require_login(site_url('/dashboard'));

		$this->load->model('student_m');
		$this->load->model('payment_m');
	}

	// Default 컨트롤러
	public function index()
	{
		/* 		$students = $this->dashboard_m->st_gets();

		$this->load->view('dashboard/header_v');
		$this->load->view(
			'dashboard/sidebar_v',
			array(
				'students' => $students
			)
		);
 */
		if (!$st_id = $this->session->userdata('st_id')) {
			redirect(site_url('/dashboard/st_summary'));
		} else {
			redirect(site_url('/dashboard/dashboard_get/' . $st_id));
		}
	}

	// 추가 컨트롤러
	function create_payments()
	{
		$year = "2021";
		$month = "11";


		$students = $this->student_m->gets();

		foreach ($students as $entry) {

			$this->payment_m->add(
				array(
					'st_id' => $entry->id,
					'year'  => $year,
					'month' => $month,
					'fees'  => $entry->fees
				)
			);
		}
		redirect(site_url('/dashboard/st_summary'));
	}
}
