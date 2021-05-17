<?php

class User_model extends CI_Model {

    public function update_userdetail($userid, $data)
    {
        return $this->db->where("user_id", $userid)->update(USER, $data);
    }
    public function update_cash($userid, $data)
    {
        return $this->db->where("user_id", $userid)->update(USER, $data);
    }

    public function get_userdetail()
    {
        return $this->db->get_where(USER, array("user_id" => $this->session->userdata('userid')));
    }
    
    public function change_userpassword($data) 
    {
        $userid = $this->session->userdata('userid');
        $old = $data['oldpassword'];
        $new = $data['newpassword'];
        $renew = $data['renewpassword'];
        $data = array('password' => password_hash($new, PASSWORD_DEFAULT));
        $query = $this->db->limit(1)->get_where(USER, array('user_id' => $userid))->row();
        
        if ($new == $renew && password_verify($old, $query->password)){
            $this->db->where('user_id', $userid)->update(USER, $data);
            $this->session->set_flashdata('msg','<div class="alert alert-primary" style="margin-top:5px" role="alert">Password changed.</div>');
            redirect(site_url('user/change_password'));
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger" style="margin-top:5px" role="alert">Password change failed.</div>');
            redirect(site_url('user/change_password'));	
        }
        
    }
    
    public function get_shipping_address($userid) {
        return $this->db
            ->join('user_table ut', 'ut.user_id = at.user_id')
            ->get_where('address_table at', array('at.user_id' => $userid));
    }
    
    public function add_shipping_address($data) {
        return $this->db->insert('address_table', $data);
    }
    
    public function get_upgrade_status($user_id){
        $query = $this->db->get_where('upgrade_table', array('user_id' => $user_id));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function upgrade_request($data) {
        return $this->db->insert('upgrade_table', $data);
    }
    public function get_upgrade_requests() {
        return $this->db
            ->join('user_table ut', 'ut.user_id = ugt.user_id')
            ->get_where('upgrade_table ugt')->result();
    }
    
    public function update_shipping_address($data, $user_id) {
        return $this->db->where(array("user_id" => $user_id))->update('address_table', $data);
    }
}
