<?php
class Employee_home extends Employee_Controller{
    function __construct() {
        parent::__construct();
    }
    function index(){
    	$data['logo'] = $this->db->get('site_settings')->row();
        $data['profile'] = $this->db->get('site_profile')->row();
    	$data['main'] = 'task/list';
    	$data['result'] = $this->db->order_by('id','desc')->get_where('tbl_task', array('user_id'=>$this->employee->id))->result();
        // $data['comments'] = $this->db->get('action')->result();
        $this->db->select('COUNT(status) as count');
        // $this->db->from('tbl_comment');
        // $this->db->where('action',1);
        $data['comments']=$this->db->get_where('tbl_comment', array('status' => "1",'user_id'=>$this->employee->id))->result_array();

        // print_r($data['comments']);die;
        
        $this->load->view('employee/index', $data);
    }
    // function getList(){
    //     echo 'hello';die;
    // }
 




}

?>