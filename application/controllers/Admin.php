<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('category_model');
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
        
        $categories = $this->category_model->get_all_category();
        // return;
        // $data['all_request'] = $this->user_model->get_upgrade_requests();
        // $this->load->view('layout/dashboard/header', array('title' => 'Admin Dashboard'));
        // $this->loadSidebar(null, null);
        // $this->load->view('admin/dashboard', $data);
        $this->load->view('layout/head');
        $this->load->view('layout/side');
        $data['categories'] = $categories;
        $this->load->view('admin/add_product', $data);
    }
    // Danh sách mục vhi
    public function dsmucchi()
    {
        $categories = $this->product_model->get_all_product();
        $data['categories'] = $categories;
        $this->load->view('layout/head');
        $this->load->view('layout/side');
        $this->load->view('admin/products', $data);
    }
    
    // Them loai dv
    public function loaidv()
    {
        // $this->gate_model->admin_gate();
        // return;
        // $data['all_request'] = $this->user_model->get_upgrade_requests();
        // $this->load->view('layout/dashboard/header', array('title' => 'Admin Dashboard'));
        // $this->loadSidebar(null, null);
        // $this->load->view('admin/dashboard', $data);
        $this->load->view('layout/head');
        $this->load->view('layout/side');
        $data['link'] = "/index.php/admin/themloaidv";
        $this->load->view('admin/add_category', $data);
    }
    // Post them loai dv
    public function themloaidv(){
        // $this->gate_model->admin_gate();
        $data['name'] = $this->input->post('name');
        $insert = $this->category_model->create_category($data);
        if ($insert){
            $this->load->view('admin/add_category');
            return;
        }
        echo ("cannot insert");
    }
    
    // public function loaidv()
    // {
    //     // $this->gate_model->admin_gate();
    //     // return;
    //     // $data['all_request'] = $this->user_model->get_upgrade_requests();
    //     // $this->load->view('layout/dashboard/header', array('title' => 'Admin Dashboard'));
    //     // $this->loadSidebar(null, null);
    //     // $this->load->view('admin/dashboard', $data);
    //     $data['link'] = "/index.php/admin/sualoaidv";
    //     $this->load->view('admin/add_category', $data);
    // }
    // Post thêm mục chi
    public function themmucchi(){
        // $this->gate_model->admin_gate();
        $data['pname'] = $this->input->post('name');
        $data['cid'] = $this->input->post('category');
        $data['price1'] = $this->input->post('price1');
        $data['price2'] = $this->input->post('price2');
        $data['price3'] = $this->input->post('price3');
        $data['price4'] = $this->input->post('price4');
        $insert = $this->product_model->create_product($data);
        if ($insert){
            $this->load->view('admin/add_category');
            return;
        }
        echo ("cannot insert");
    }
    // DS dịch vụ
    public function dichvu()
    {
        $categories = $this->category_model->get_all_category();
        $data['categories'] = $categories;
        $this->load->view('layout/head');
        $this->load->view('layout/side');
        $this->load->view('admin/categories', $data);
    }
    public function xoadichvu($id)
    {
        $is_used = $this->category_model->checkUseCategory($id);
        if (!$is_used){
            $res = $this->category_model->delete_category($id);
        }
        return redirect('/admin/dichvu');
    }
    public function suadichvu($id)
    {
        $categories = $this->category_model->get_category_id($id);
        if (count($categories)>0){
            $data['category'] = $categories[0];
        }
        $this->load->view('layout/head');
        $this->load->view('layout/side');
        $data['link'] = "/index.php/admin/updateloaidv";
        $this->load->view('admin/add_category', $data);
    }
    
    public function updateloaidv()
    {
        $data['id'] = $this->input->post('id');
        $data['name'] = $this->input->post('name');
        $insert = $this->category_model->update_category($data['id'],$data);
        return redirect('/admin/dichvu');
    }
    
    
}
