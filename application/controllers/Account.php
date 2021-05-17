<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('account_model');
    }
    public function index() {
        $this->load->view('admin/login');
    }
    public function login() {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $data = [
            "username" => $username,
            "password" => $password,
        ];
        // "password" => password_hash($password, PASSWORD_DEFAULT),
        $result = $this->account_model->login($data);
        if ($result){
            echo json_encode(array("code" => 200, "msg" => "Đăng nhập thành công"));
            return;
        }
        else{
            echo json_encode(array("code" => 404, "msg" => "Đăng nhập không thành công"));
            return;
        }
    }
    public function logout()
    {
        $array_items = array('username', 'usertype');
        $this->session->unset_userdata($array_items);
        redirect('shop');
    }
}
