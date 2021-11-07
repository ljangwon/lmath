<?php
class Payment_m extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    // 학생정보 CRUD start 
    function add($option = null)
    {
        if ($option['year']) {
            $this->db->set('year', $option['year']);
        }

        if ($option['month']) {
            $this->db->set('month', $option['month']);
        }
        if ($option['st_id']) {
            $this->db->set('st_id', $option['st_id']);
        }

        if ($option['fees']) {
            $this->db->set('regular_price', $option['fees']);
        }

        $this->db->set('pay_status', '0');

        $this->db->insert('st_payment');
        return true;
    }
}
