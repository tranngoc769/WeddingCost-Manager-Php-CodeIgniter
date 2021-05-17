<?php

class Account_model extends CI_Model {

    
    public function login($data) {
        $query = $this->db
            ->limit(1)
            ->get_where(USER, array("username" => $data["username"]))
            ->row();
        $vv = password_verify( $data['password'], $query->password );
        if ($vv) {
            $data = array ("username" => $query->username, "usertype" => $query->user_type, "userid" => $query->user_id);
            $this->session->set_userdata($data);
            return  $query->user_type;
        } elseif($query->ban_flag == 1){
            return "ban";
        } else { 
            return false; 
        }	
    }
    public function register($data)
    {
        return $this->db->insert(USER, $data);
    }

}
