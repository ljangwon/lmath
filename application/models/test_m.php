<?php
class Test_m extends CI_Model {

    function __construct()
    {    	
        parent::__construct();
    }

    function gets($option=null) {
        $this->db->select('*');
        $this->db->order_by('grade', 'DESC');
        $this->db->order_by('chapter', 'DESC');
        $this->db->order_by('created', 'ASC');
            if( $option ) {
                $this->db->where('st_id', $option);        
            }        
        $result = $this->db->get('test')->result();;
        //$result =  $this->db->query("SELECT * FROM test")->result();
     	return $result;
    }

    function get($test_id){
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

    function get_count($option) {
        $this->db->select('count(*) as cnt');
        $result = $this->db->get_where('student', array('grade1'=>$option))->row();
        return $result;
    }

    function get_fees_sum($option) {
        $this->db->select_sum('fees');
        $result = $this->db->get_where('student', array('grade1'=>$option))->row();
        return $result;
    }

    function add($option)
    {
        $this->db->set('created', 'NOW()', false);
        $this->db->set('st_id', $option['st_id']);

        $this->db->insert('test');
        $result = $this->db->insert_id();
        return $result;
    }

    function delete($test_id)
    {
        $result = $this->db->delete('test', array(
            'id'=>$test_id
        ));
        return $result;
    }

    function modify($option)
    {
        $this->db->set('created', 'NOW()', false);
        $this->db->set('st_id', $option['st_id']);
        $this->db->set('score', $option['score']);

        $this->db->where('id', $option['id']);

        $this->db->update('test');

        $test_id= $option['id'];

        return $test_id;
    }

    function backup($student_id){
        return $student_id.'백업 되었습니다.';
        //return $this->db->update('student', )
    }
}