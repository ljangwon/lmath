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

		$this->load->view('payment/main_v');
	}

	// 추가 컨트롤러
	function add()
	{
		$year = "2021";
		$month = "11";

		$students = $this->student_m->gets();

		foreach ($students as $entry) {

			$this->payment_m->insert(
				array(
					'st_id' => $entry->id,
					'year'  => $year,
					'month' => $month,
					'fees'  => $entry->fees
				)
			);
		}
		redirect(site_url('/payment/summary'));
	}

	// Read 컨트롤러
	function read_by_month()
	{
		$data =	$this->payment_m->select_by_month(
			array(
				'month' => "11"
			)
		);

		foreach ($data as $result) {
			$value[] = (float) $result->product_id;
		}
		echo json_encode($value);

		return $result;
	}

	// Update 컨트롤러
	function modify()
	{
		$result =	$this->payment_m->update(
			array()
		);

		return $result;
	}

	// Delete 컨트롤러
	function remove()
	{
		$result =	$this->payment_m->delete(
			array()
		);

		return $result;
	}
}
