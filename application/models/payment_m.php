<?php
class Payment_m extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    function payment_list()
    {
        $this->db->select('p.id, p.month, p.st_id, s.name, s.class_name, p.pay_status');
        $this->db->from('st_payment as p');
        $this->db->join('student as s', 's.id=p.st_id');
        $this->db->where('year', "2021");
        $result = $this->db->get()->result();
        return $result;
    }

    function save_product()
    {
        $data = array(
            'year'  => "2021",
            'month' => $this->input->post('month'),
            'st_id' => $this->input->post('st_id'),
            'name' =>  $this->input->post('name'),
            'pay_status'  => "미납"
        );
        $result = $this->db->insert('st_payment', $data);
        return $result;
    }

    function update_payment()
    {
        $payment_id = $this->input->post('id');
        $pay_status = $this->input->post('pay_status');

        $this->db->set('pay_status', $pay_status);
        $this->db->where('id', $payment_id);
        $result = $this->db->update('st_payment');
        return $result;
    }

    function delete_payment()
    {
        $payment_id = $this->input->post('payment_id');
        $this->db->where('id', $payment_id);
        $result = $this->db->delete('st_payment');
        return $result;
    }

    // insert
    function insert($option = null)
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

        $this->db->set('pay_status', '미납');

        $this->db->insert('st_payment');
        return true;
    }

    // select
    function select_by_month($option)
    {
        $this->db->select('*');
        $this->db->from('st_payment');
        $this->db->join('student', 'student.id=st_payment.st_id');
        $this->db->where('year', "2021");
        $this->db->where('month', $option['month']);
        $result = $this->db->get()->result();

        return $result;
    }

    function select_st_payment_by_option($option)
    {
        $this->db->select('*');
        $this->db->from('st_payment as p');
        $this->db->join('student as s', 's.id=p.st_id');
        $this->db->where('year', "2021");

        if ($option['month']) {
            $this->db->where('month', $option['month']);
        }

        $result = $this->db->get()->result();

        return $result;
    }
}
