<?php
class Admin_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function username_exists($username){
        $this->db->from('admin');
        $this->db->where('username',$username);
        $query=$this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
             return $query->row()->id;
        }
    }
    function get_password_username($username){
        return $this->db->get_where('admin',array('username'=>$username))->row()->password;
    }
    function saveLastLogin($id){
        $data['last_login'] = date('Y-m-d h:i:sa');
        $this->db->where('id',$id);
        $this->db->update('admin',$data);
    }
    function get_user_id($username,$password){
        $this->db->from('admin');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $query=$this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
             return $query->row();
        }
    }
}

?>
