<?php
class Dashboard_m extends CI_Model {

    function __construct()
    {    	
        parent::__construct();
    }


    // schedule CRUD start
    function schedule_add($option)
    {
        $this->db->set('s_date', 'NOW()', false);
        $this->db->set('st_id', $option['st_id']);

        $this->db->insert('st_schedule');
        $result = $this->db->insert_id();
        return $result;
    }

    function schedule_gets($option=null) {
        $this->db->select('*');
        $this->db->order_by('s_date', 'DESC');
        if( $option ) {
             $this->db->where('st_id', $option);        
        }        
        $result = $this->db->get('st_schedule')->result();
     	return $result;
    }

    function schedule_get($id){
        $this->db->select('*');
        $result = $this->db->get_where('st_schedule', 
                            array('id'=>$id)
                            )->row();
    	return $result;
    }

    function schedule_modify($option)
    {
        $this->db->set('st_id', $option['st_id']);
        $this->db->set('mon_s', $option['mon_s']);
        $this->db->set('tue_s', $option['tue_s']);
        $this->db->set('wed_s', $option['wed_s']);
        $this->db->set('thr_s', $option['thr_s']);
        $this->db->set('fri_s', $option['fri_s']);
        $this->db->set('sat_s', $option['sat_s']);
        $this->db->set('sun_s', $option['sun_s']);
        $this->db->set('time_per_week', $option['time_per_week']);
        $this->db->set('s_date', $option['s_date']);
        $this->db->set('e_date', $option['e_date']);

        $this->db->where('id', $option['id']);

        $this->db->update('st_schedule');

        $id= $option['id'];

        return $id;
    }

    function schedule_delete($id)
    {
        $result = $this->db->delete('st_schedule', array(
            'id'=>$id
        ));
        return $result;
    }

    // checkmemo CRUD start

    function checkmemo_add($option)
    {
        $this->db->set('m_date', 'NOW()', false);
        $this->db->set('st_id', $option['st_id']);

        $result = $this->db->insert('st_checkmemo');
        return $result;
    }

    function checkmemo_gets($option=null) {
        $this->db->select('*');
        $this->db->order_by('m_date', 'DESC');
        if( $option ) {
             $this->db->where('st_id', $option);        
        }        
        $result = $this->db->get('st_checkmemo')->result();
     	return $result;
    }

    function checkmemo_get($id){
        $this->db->select('*');
        $result = $this->db->get_where('st_checkmemo', 
                            array('id'=>$id)
                            )->row();
    	return $result;
    }

    function checkmemo_modify($option)
    {
        $this->db->set('st_id', $option['st_id']);
        $this->db->set('memo', $option['memo']);
        $this->db->set('m_date', $option['m_date']);
        $this->db->set('f_memo', $option['f_memo']);
        $this->db->set('status', $option['status']);

        $this->db->where('id', $option['id']);

        $result = $this->db->update('st_checkmemo');

        return $result;
    }

    function checkmemo_delete($id)
    {
        $result = $this->db->delete('st_checkmemo', array(
            'id'=>$id
        ));
        return $result;
    }
    // checkmemo CRUD end


    // test CRUD start
    function test_add($option)
    {
        $this->db->set('created', 'NOW()', false);
        $this->db->set('st_id', $option['st_id']);

        $this->db->insert('test');
        $test_id = $this->db->insert_id();
        return $test_id;
    }

    function test_gets($option=null) {
        $this->db->select('test.id as id');
        $this->db->select('test.st_id as st_id');
        $this->db->select('st.name as name');
        $this->db->select('test.type');
        $this->db->select('test.grade');
        $this->db->select('test.level');
        $this->db->select('test.chapter');
        $this->db->select('test.corrt_num');
        $this->db->select('test.total_num');
        $this->db->select('test.score');
        $this->db->select('test.result');
        $this->db->select('test.test_date');
        $this->db->select('test.memo');
        $this->db->from('test as test');
        $this->db->join('student as st', 'test.st_id=st.id', 'left');
        $this->db->order_by('test.grade', 'DESC');
        $this->db->order_by('test.chapter', 'DESC');
        $this->db->order_by('test.created', 'ASC');
            if( $option ) {
                $this->db->where('test.st_id', $option);        
            }        
        $result = $this->db->get()->result();
        //$result =  $this->db->query("SELECT * FROM test")->result();
     	return $result;
    }

    function test_get($id){
        $this->db->select('id');
        $this->db->select('st_id');
        $this->db->select('test_date');
        $this->db->select('score');
        $this->db->select('corrt_num');
        $this->db->select('total_num');
        $this->db->select('subject');
        $this->db->select('type');
        $this->db->select('grade');
        $this->db->select('chapter');
        $this->db->select('result');
        $this->db->select('level');
        $this->db->select('memo');
        $this->db->select('UNIX_TIMESTAMP(created) AS created');
        $result = $this->db->get_where('test', array('id'=>$test_id))->row();

    	return $result;
    }

    function test_modify($option)
    {
			$this->db->set('st_id', $option['st_id']);
			$this->db->set('type', $option['type']);
			$this->db->set('grade', $option['grade']);
			$this->db->set('level', $option['level']);
			$this->db->set('chapter', $option['chapter']);
			$this->db->set('corrt_num', $option['corrt_num']);
			$this->db->set('total_num', $option['total_num']);
			$this->db->set('score', $option['score']);
			$this->db->set('result', $option['result']);
			$this->db->set('test_date', $option['test_date']);
			$this->db->set('memo', $option['memo']);

			$this->db->where('id', $option['id']);

			$this->db->update('test');

			$test_id= $option['id'];

			return $test_id;
    }

    function test_delete($test_id)
    {
			$result = $this->db->delete('test', array(
				'id'=>$test_id
			));
		return $result;
    }
    // test CRUD end

    // student CRUD start 
    function st_add($option)
    {
        $this->db->set('created', 'NOW()', false);
        $this->db->set('name', $option['name']);
        $this->db->set('class_name', $option['class_name']);

        $this->db->insert('student');
        $st_id = $this->db->insert_id();
        return $st_id;
    }

    function st_modify($option)
    {
        $this->db->set('created', 'NOW()', false);
        $this->db->set('name', $option['name']);
        $this->db->set('grade1', $option['grade1']);
        $this->db->set('school_name', $option['school_name']);
        $this->db->set('grade2', $option['grade2']);
        $this->db->set('class_name', $option['class_name']);
        $this->db->set('class_day1', $option['class_day1']);
        $this->db->set('class_time1', $option['class_time1']);
        $this->db->set('class_day2', $option['class_day2']);
        $this->db->set('class_time2', $option['class_time2']);
        $this->db->set('class_day3', $option['class_day3']);
        $this->db->set('class_time3', $option['class_time3']);

        $this->db->set('memo', ltrim( $option['memo'] ));
        $this->db->set('fees', $option['fees']);
        $this->db->set('flag', $option['flag']);

        $this->db->where('id', $option['id']);

        $result = $this->db->update('student');

        if( true) {
            $this->load->view('error/main_error_v', array(
                'error'=>'update error '. 'result: ' . $result
            ));
        }

        return $result;
    }

    function st_delete($student_id)
    {
        $result = $this->db->delete('student', array(
            'id'=>$student_id
        ));
        return $result;
    }

    // student CRUD end


}