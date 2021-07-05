<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();

		$this->load->model('student_m');
		$this->load->model('test_m');
		$this->load->model('test_history_m');
		$this->load->model('dashboard_m');
	}

	public function index()
	{
		$this->load->view('dashboard/head_v');

		$students = $this->student_m->gets();

		$this->load->view('dashboard/header_v');
		$this->load->view('dashboard/sidebar_v', array(
					'students' => $students
					 )
			);

		$this->load->view('dashboard/default_v');
		$this->load->view('dashboard/footer_v');
	}

	function dashboard_get($st_id)
	{
		if( empty($st_id) ) {
			$st_id = $this->session->userdata('st_id');
		}
		else {
			$this->session->set_userdata('st_id', $st_id);
		}

		if( empty($st_id) ) {
			alert('st_id의 값이 없습니다', site_url('/dashboard'));
		}

		// loading head
		$this->load->view('dashboard/head_v');

		// select db
		$students = $this->student_m->gets();

		// header 
		$this->load->view('dashboard/header_v');

		// sidebar (left)
		$this->load->view('dashboard/sidebar_v', array(
				'students' => $students
			)
		);

		$this->load->helper(array('HTML', 'korean'));

		$student = $this->student_m->get($st_id);
		$tests = $this->test_m->gets($st_id);
		$schedules = $this->dashboard_m->schedule_gets($st_id);

		// main 
		$this->load->view('dashboard/dashboard_v', array(
				'student' => $student,
				'tests' => $tests,
				'schedules' => $schedules
		));

		// footer
		$this->load->view('dashboard/footer_v');
	}

	function st_modify()
	{
			$result = $this->student_m->modify(
					array(
							'id' => $this->input->post('id'),
							'name' => $this->input->post('name'),
							'grade1' => $this->input->post('grade1'),
							'school_name' => $this->input->post('school_name'),
							'grade2' => $this->input->post('grade2'),
							'class_name' => $this->input->post('class_name'),
							'class_day1' => $this->input->post('class_day1'),
							'class_time1' => $this->input->post('class_time1'),
							'class_day2' => $this->input->post('class_day2'),
							'class_time2' => $this->input->post('class_time2'),
							'class_day3' => $this->input->post('class_day3'),
							'class_time3' => $this->input->post('class_time3'),
							'memo' => $this->input->post('memo'),
							'fees' => $this->input->post('fees'),
							'flag' => $this->input->post('flag')
					)
			);

			if (!$result) {
					alert( "업데이트가 실패했습니다.", site_url('/dashboard/dashboard_get/' . $this->input->post('id')));
			}

			else {
					alert( "업데이트가 성공했습니다.", site_url('/dashboard/dashboard_get/' . $this->input->post('id')));
			}
	}

	function schedule_add()
	{
			$st_id = $this->session->userdata('st_id');
		
			$result = $this->dashboard_m->schedule_add( array(
						'st_id'=>$st_id
						)
				);

			if (!$result) {
					alert( "schedule 추가 실패했습니다.", site_url('/dashboard/dashboard_get/' . $st_id) );
			}

			else {
					alert( "schedule 추가 성공했습니다.", site_url('/dashboard/dashboard_get/' . $st_id) );
			}
	}

	function schedule_delete($schedule_id)
	{
		$st_id = $this->session->userdata('st_id');

		$this->_require_login(site_url('dashboard/dashboard_get/' .$st_id));

		$result = $this->dashboard_m->schedule_delete($schedule_id);

		if (!$result) {
			alert( "schedule 삭제 실패했습니다.", site_url('/dashboard/dashboard_get/' . $st_id) );
		}

		else {
			alert( "schedule 삭제 성공했습니다.", site_url('/dashboard/dashboard_get/' . $st_id) );
		}
	}

	function schedule_modify()
	{
			$result = $this->dashboard_m->schedule_modify(
					array(
							'mon_s' => $this->input->post('name'),
							'tue_s' => $this->input->post('grade1'),
							'school_name' => $this->input->post('school_name'),
							'grade2' => $this->input->post('grade2'),
							'class_name' => $this->input->post('class_name'),
							'class_day1' => $this->input->post('class_day1'),
							'class_time1' => $this->input->post('class_time1'),
							'class_day2' => $this->input->post('class_day2'),
							'class_time2' => $this->input->post('class_time2'),
							'class_day3' => $this->input->post('class_day3'),
							'class_time3' => $this->input->post('class_time3'),
							'memo' => $this->input->post('memo'),
							'fees' => $this->input->post('fees'),
							'flag' => $this->input->post('flag')
					)
			);

			if (!$result) {
					alert( "업데이트가 실패했습니다.", site_url('/dashboard/dashboard_get/' . $this->input->post('id')));
			}

			else {
					alert( "업데이트가 성공했습니다.", site_url('/dashboard/dashboard_get/' . $this->input->post('id')));
			}
	}

}




