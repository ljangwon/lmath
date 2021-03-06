<?php
class Payment extends My_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->_require_login(site_url('payment'), 1);

		$this->load->model('payment_m');
		$this->load->model('student_m');
	}
	function index()
	{
		$this->load->view('payment/payment_v');
	}

	function payment_list()
	{
		if ($this->input->post('pay_status') == '전체') {
			$data = $this->payment_m->payment_list(
				array(
					'year' => $this->session->userdata('year'),
					'month' => $this->input->post('month')
				)
			);
		} else {
			$data = $this->payment_m->payment_list(
				array(
					'year' => $this->session->userdata('year'),
					'month' => $this->input->post('month'),
					'pay_status' => $this->input->post('pay_status')
				)
			);
		}

		echo json_encode($data);
	}

	function save()
	{
		$data = $this->payment_m->save_payment(
			array(
				'year'  => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'st_id' => $this->input->post('st_id'),
				'name' 	=>  $this->input->post('st_name'),
				'pay_status'  => "미납"
			)
		);
		echo json_encode($data);
	}

	function add_payment_by_month()
	{
		$data = $this->payment_m->add_payment_by_month(
			array(
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month')
			)
		);
		echo json_encode($data);
	}

	function update_discount()
	{

		$data = $this->payment_m->update_discount(
			array(
				'payment_id' => $this->input->post('payment_id'),
				'pay_status' => $this->input->post('pay_status'),
				'regular_price' => $this->input->post('regular_price'),
				'discount1' => $this->input->post('discount1'),
				'discount2' => $this->input->post('discount2'),
				'return_price' => $this->input->post('return_price'),
				'discount_memo' => $this->input->post('discount_memo'),
				'receipt_use' => $this->input->post('receipt_use'),
				'receipt_phone' => $this->input->post('receipt_phone'),
				'net_income' => $this->input->post('net_income')
			)
		);

		echo json_encode($data);
	}


	function update_pay_status()
	{
		$data = $this->payment_m->update_pay_status(
			array(
				'payment_id' => $this->input->post('payment_id'),
				'pay_status' => $this->input->post('pay_status')
			)
		);

		echo json_encode($data);
	}

	function update_receipt_status()
	{
		$data = $this->payment_m->update_receipt_status(
			array(
				'payment_id' => $this->input->post('payment_id')
			)
		);
		echo json_encode($data);
	}

	function delete()
	{
		$data = $this->payment_m->delete_payment();
		echo json_encode($data);
	}

	function month_delete()
	{
		$data = $this->payment_m->month_delete(
			array(
				'year' => $this->input->post('year_del'),
				'month' => $this->input->post('month_del')
			)
		);
		echo json_encode($data);
	}
}
