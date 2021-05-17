<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    public function index()
    {
        $this->gate_model->admin_gate();
        return;
        // $data['all_request'] = $this->user_model->get_upgrade_requests();
        // $this->load->view('layout/dashboard/header', array('title' => 'Admin Dashboard'));
        // $this->loadSidebar(null, null);
        // $this->load->view('admin/dashboard', $data);
        // $this->load->view('layout/dashboard/footer');
    }
    
}
