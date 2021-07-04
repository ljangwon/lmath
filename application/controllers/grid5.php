<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Grid5 extends MY_Controller
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
		$this->load->model('grid5_m');
	}

	public function index()
	{
		$this->load->view('grid5/head_v');

		$students = $this->student_m->gets();

		$this->load->view('grid5/header_v');
		$this->load->view(
			'grid5/sidebar_v',
			array(
				'students' => $students
			)
		);

		$this->load->view('grid5/main_v');

		$this->load->view('grid5/footer_v');
	}

	function get($id)
	{
		$this->load->view('grid5/head_v');

		$students = $this->student_m->gets();

		$this->load->view('grid5/header_v');

		$this->load->view(
			'grid5/sidebar_v',
			array(
				'students' => $students
			)
		);


		$this->load->helper(array('HTML', 'korean'));

		$student = $this->student_m->get($id);
		$tests = $this->test_m->gets($id);
		$schedule = $this->grid5_m->schedule_get($id);

		$this->load->view('grid5/dashboard_v', array(
				'student' => $student,
				'tests' => $tests,
				'schedule' => $schedule
		));


		$this->load->view('grid5/footer_v');
	}

	function schedule_add()
	{
		if ( $this->input->post('st_id') == null )
		{
				 $this->load->view('grid5/main_v');
		}
		else
		{
				$this->grid5_m->schedule_add( array(
						'st_id'=>$this->input->post('st_id')
						)
				);

				redirect( site_url('/grid5/get/'.$this->input->post('st_id')) );
		}

	}
}


