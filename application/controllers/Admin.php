<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('product_model');
    }
    
    public function index()
    {
        // $this->gate_model->admin_gate();
        // return;
        // $data['all_request'] = $this->user_model->get_upgrade_requests();
        // $this->load->view('layout/dashboard/header', array('title' => 'Admin Dashboard'));
        // $this->loadSidebar(null, null);
        // $this->load->view('admin/dashboard', $data);
        // $this->load->view('layout/dashboard/footer');
    }
    
    public function mucchi()
    {
        // $this->gate_model->admin_gate();
        
        $categories = $this->product_model->get_all_category();
        // return;
        // $data['all_request'] = $this->user_model->get_upgrade_requests();
        // $this->load->view('layout/dashboard/header', array('title' => 'Admin Dashboard'));
        // $this->loadSidebar(null, null);
        // $this->load->view('admin/dashboard', $data);
        $data['categories'] = $categories;
        $this->load->view('admin/add_product', $data);
    }
    
    
    public function loaidv()
    {
        // $this->gate_model->admin_gate();
        // return;
        // $data['all_request'] = $this->user_model->get_upgrade_requests();
        // $this->load->view('layout/dashboard/header', array('title' => 'Admin Dashboard'));
        // $this->loadSidebar(null, null);
        // $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/add_category');
    }
    public function themloaidv(){
        // $this->gate_model->admin_gate();
        $data['name'] = $this->input->post('name');
        $insert = $this->product_model->create_category($data);
        if ($insert){
            $this->load->view('admin/add_category');
            return;
        }
        echo ("cannot insert");
    }
    
    public function dichvu()
    {
        $categories = $this->product_model->get_all_category();
        $data['categories'] = $categories;
        $this->load->view('admin/categories', $data);
    }
    public function xoadichvu($id)
    {
        $is_used = $this->product_model->checkUseCategory($id);
        if (!$is_used){
            $res = $this->product_model->delete_category($id);
        }
        return redirect('/admin/dichvu');
    }
    public function suadichvu()
    {
        $categories = $this->product_model->get_all_category();
        $data['categories'] = $categories;
        $this->load->view('admin/categories', $data);
    }
    
    
}
