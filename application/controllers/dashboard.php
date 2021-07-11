<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	// 기본 생성자
	function __construct()
	{
		parent::__construct();

		$this->load->model('student_m');
		$this->load->model('test_m');
		$this->load->model('test_history_m');
		$this->load->model('dashboard_m');
	}

	// Default 컨트롤러
	public function index()
	{
		$this->load->view('dashboard/head_v');

		$students = $this->student_m->gets();

		$this->load->view('dashboard/header_v');
		$this->load->view(
			'dashboard/sidebar_v',
			array(
				'students' => $students
			)
		);

		if( !$st_id = $this->session->userdata('st_id') )	{
			$this->load->view('dashboard/default_v');
			$this->load->view('dashboard/footer_v');
		}
		else {
			redirect( site_url('/dashboard/dashboard_get/' . $st_id) );
		}
	}

	// Dashboard 상세화면 컨트롤러
	function dashboard_get($st_id)
	{
		if (empty($st_id)) {
			$st_id = $this->session->userdata('st_id');
		} else {
			$this->session->set_userdata('st_id', $st_id);
		}

		if (empty($st_id)) {
			alert('st_id의 값이 없습니다', site_url('/dashboard'));
		}

		// loading head
		$this->load->view('dashboard/head_v');

		// select db
		$students = $this->student_m->gets();

		// header 
		$this->load->view('dashboard/header_v');

		// sidebar (left)
		$this->load->view(
			'dashboard/sidebar_v',
			array(
				'students' => $students
			)
		);

		$this->load->helper(array('HTML', 'korean'));

		$student = $this->student_m->get($st_id);
		$tests = $this->test_m->gets($st_id);
		$schedules = $this->dashboard_m->schedule_gets($st_id);
		$checkmemos = $this->dashboard_m->checkmemo_gets($st_id);

		// main 
		$this->load->view('dashboard/dashboard_v', array(
			'student' => $student,
			'tests' => $tests,
			'schedules' => $schedules,
			'checkmemos' => $checkmemos
		));

		// footer
		$this->load->view('dashboard/footer_v');
	}

	function st_add()
	{
			// 로그인 필요
			// 로그인이 되어 있지 않다면 로그인 페이지로 리다이렉션
			$st_id = $this->session->userdata('st_id');

			$new_st_id = $this->dashboard_m->st_add(
				array(
						'name' => $this->input->post('name'),
						'class_name' => $this->input->post('class_name'),
							)
				);
	
			if (!$st_id) {
				alert("학생 추가 실패했습니다.", site_url('/dashboard/dashboard_get/' . $st_id));
			} else {
				alert("학생 추가 성공했습니다.", site_url('/dashboard/dashboard_get/' . $new_st_id));
			}
	}

	// 학생 수정 컨트롤러
	function st_modify()
	{
		$st_id = $this->session->userdata('st_id');

		$result = $this->dashboard_m->st_modify(
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
			alert("st 업데이트가 실패했습니다.", site_url('/dashboard/dashboard_get/' . $st_id) );
		} else {
			alert("st 업데이트가 성공했습니다.", site_url('/dashboard/dashboard_get/' . $this->input->post('id')));
		}
	}

	function st_delete()
	{
			$student_id = $this->input->post('student_id');
			$this->_require_login(site_url('/dashboard'));
			$this->dashboard_m->st_delete($student_id);
			$this->session->set_userdata('st_id', '');
			redirect(site_url('/dashboard'));
	}

	// 스케줄 추가 컨트롤러
	function schedule_add()
	{
		$st_id = $this->session->userdata('st_id');

		$result = $this->dashboard_m->schedule_add(
			array(
				'st_id' => $st_id
			)
		);

		if (!$result) {
			alert("schedule 추가 실패했습니다.", site_url('/dashboard/dashboard_get/' . $st_id));
		} else {
			alert("schedule 추가 성공했습니다.", site_url('/dashboard/dashboard_get/' . $st_id));
		}
	}

	// 스케줄 수정 컨트롤러
	function schedule_modify()
	{
		$result = $this->dashboard_m->schedule_modify(
			array(
				'id' => $this->input->post('id'),
				'st_id' => $this->input->post('st_id'),
				'mon_s' => $this->input->post('mon_s'),
				'tue_s' => $this->input->post('tue_s'),
				'wed_s' => $this->input->post('wed_s'),
				'thr_s' => $this->input->post('thr_s'),
				'fri_s' => $this->input->post('fri_s'),
				'sat_s' => $this->input->post('sat_s'),
				'sun_s' => $this->input->post('sun_s'),
				'time_per_week' => $this->input->post('time_per_week'),
				's_date' => $this->input->post('s_date'),
				'e_date' => $this->input->post('e_date')
			)
		);

		if (!$result) {
			alert("업데이트가 실패했습니다.", site_url('/dashboard/dashboard_get/' . $this->input->post('st_id')));
		} else {
			alert("업데이트가 성공했습니다.", site_url('/dashboard/dashboard_get/' . $this->input->post('st_id')));
		}
	}

	// 스케줄 삭제 컨트롤러
	function schedule_delete($schedule_id)
	{
		$st_id = $this->session->userdata('st_id');

		$this->_require_login(site_url('dashboard/dashboard_get/' . $st_id));

		$result = $this->dashboard_m->schedule_delete($schedule_id);

		if (!$result) {
			alert("schedule 삭제 실패했습니다.", site_url('/dashboard/dashboard_get/' . $st_id));
		} else {
			alert("schedule 삭제 성공했습니다.", site_url('/dashboard/dashboard_get/' . $st_id));
		}
	}

	// 지적사항 추가 컨트롤러
	function checkmemo_add()
	{
		$st_id = $this->session->userdata('st_id');

		$result = $this->dashboard_m->checkmemo_add(
			array(
				'st_id' => $st_id
			)
		);

		if (!$result) {
			alert("지적사항 추가 실패했습니다.", site_url('/dashboard/dashboard_get/' . $st_id));
		} else {
			alert("지적사항 추가 성공했습니다.", site_url('/dashboard/dashboard_get/' . $st_id));
		}
	}

	// 지적사항 수정 컨트롤러
	function checkmemo_modify()
	{
		$st_id = $this->session->userdata('st_id');
		$result = $this->dashboard_m->checkmemo_modify(
			array(
				'id' => $this->input->post('id'),
				'st_id' => $this->input->post('st_id'),
				'memo' => $this->input->post('memo'),
				'm_date' => $this->input->post('m_date'),
				'f_memo' => $this->input->post('f_memo'),
				'f_date' => $this->input->post('f_date'),
				'status' => $this->input->post('status'),
			)
		);

		if (!$result) {
			alert("지적사항 업데이트가 실패했습니다.", site_url('/dashboard/dashboard_get/' . $st_id) );
		} else {
			alert("지적사항 업데이트가 성공했습니다.", site_url('/dashboard/dashboard_get/' . $this->input->post('st_id')));
		}
	}

	// 스케줄 삭제 컨트롤러
	function checkmemo_delete($memo_id)
	{
		$st_id = $this->session->userdata('st_id');

		$this->_require_login(site_url('dashboard/dashboard_get/' . $st_id));

		$result = $this->dashboard_m->checkmemo_delete($memo_id);

		if (!$result) {
			alert("지적사항 삭제 실패했습니다.", site_url('/dashboard/dashboard_get/' . $st_id));
		} else {
			alert("지적사항 삭제 성공했습니다.", site_url('/dashboard/dashboard_get/' . $st_id));
		}
	}
}
