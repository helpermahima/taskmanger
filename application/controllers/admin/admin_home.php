<?php
class Admin_home extends Admin_Controller{
    function __construct() {
        parent::__construct();

    }
    function index(){
    	$data['logo'] = $this->db->get('site_settings')->row();
        $data['profile'] = $this->db->get('site_profile')->row();
    	$data['main'] = 'dashboard';
        $sql = "SELECT name as label, left(users.name, 2) as symbol, count('tbl_task') as y FROM tbl_task JOIN users ON users.id= tbl_task.user_id GROUP BY tbl_task.user_id ";
        $data['res']=$this->db->query($sql)->result_array();


        // $data['result']=$this->db->get()->result_array();
        // print_r($data['result']);die;
        $this->load->view('admin/index',$data);
    }
    
 




}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>