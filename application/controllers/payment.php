<?php
class Payment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('payment_m');
    }
    function index()
    {
        $this->load->view('payment/payment_v');
    }

    function payment_data()
    {
        $data = $this->payment_m->payment_list();
        echo json_encode($data);
    }

    function save()
    {
        $data = $this->payment_m->save_payment();
        echo json_encode($data);
    }

    function update()
    {
        $data = $this->payment_m->update_payment();
        echo json_encode($data);
    }

    function delete()
    {
        $data = $this->payment_m->delete_payment();
        echo json_encode($data);
    }
}
