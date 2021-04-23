<?php
class Student_m extends CI_Model {

    function __construct()
    {    	
        parent::__construct();
    }

    function gets($option=null) {
        $this->db->select('*');
        $this->db->order_by('class_name', 'ASC');
        $this->db->order_by('grade1', 'DESC');
        $this->db->order_by('grade2', 'ASC');
            if( $option) {
                $this->db->where('grade1', $option);        
            }        
        $result = $this->db->get('student')->result();;
        //$result =  $this->db->query("SELECT * FROM student")->result();
     	return $result;
    }

    function get($student_id){
        $this->db->select('id');
        $this->db->select('name');
        $this->db->select('grade1');
        $this->db->select('school_name');
        $this->db->select('grade2');
        $this->db->select('class_name');
        $this->db->select('memo');
        $this->db->select('fees');
        //$this->db->select('house');
        //$this->db->select('distance');
        //$this->db->select('start_date');
        //$this->db->select('s_phone');
        //$this->db->select('m_phone');
        //$this->db->select('mon_memo');
        $this->db->select('UNIX_TIMESTAMP(created) AS created');
        $result = $this->db->get_where('student', array('id'=>$student_id))->row();
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
        $this->db->set('name', $option['name']);
        $this->db->set('grade1', $option['grade1']);
        $this->db->set('grade2', $option['grade2']);
        $this->db->set('class_name', $option['class_name']);
        $this->db->set('memo', $option['memo']);

        $this->db->insert('student');
        $result = $this->db->insert_id();
        return $result;
    }

    function delete($student_id)
    {
        $result = $this->db->delete('student', array(
            'id'=>$student_id
        ));
        return $result;
    }

    function modify($option)
    {
        $this->db->set('created', 'NOW()', false);
        $this->db->set('name', $option['name']);
        $this->db->set('grade1', $option['grade1']);
        $this->db->set('school_name', $option['school_name']);
        $this->db->set('grade2', $option['grade2']);
        $this->db->set('class_name', $option['class_name']);
        $this->db->set('memo', $option['memo']);
        $this->db->set('fees', $option['fees']);

        $this->db->where('id', $option['id']);

        $result = $this->db->update('student');

        return $option['id'];
    }

    function backup($student_id){
        return $student_id.'백업 되었습니다.';
        //return $this->db->update('student', )
    }
}