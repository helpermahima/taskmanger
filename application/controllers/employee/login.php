<?php

class Login extends Base_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->library('form_validation');
    }

    function index() {
      $this->load->helper('admin_helper');
      $data['logo'] = $this->db->get_where('site_settings', array('id'=>'1'))->row();
      $this->load->view('employee/login_form',$data);
    }

    function process() {

        $this->form_validation->set_rules('username', 'ID', 'trim|required|xss_clean');
        $this->form_validation->set_rules('userpass', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('msg','Username and Password both are required');
           redirect(site_url('employee/login'));
        } else {

           $username=$this->input->post('username');
           $password=$this->input->post('userpass');

           $user_exists= $this->Employee_model->username_exists($username);

           if($user_exists){

               $password=md5(config_item('salt').$password);
               $database_password = $this->Employee_model->get_password_username($username);

               if(strcmp($password,$database_password)==0){
                 $employee_detail=$this->Employee_model->get_user_id($username,$database_password);

                 if($employee_detail){
                      $this->Employee_model->saveLastLogin($employee_detail->id);
                     $this->session->set_userdata('employee_id',$employee_detail->id);
                     $this->session->set_userdata('student_name',$employee_detail->name);
                     $this->session->set_userdata('student_email',$employee_detail->email);
                     redirect(site_url('employee'));
                 }
               }else{
                  $this->session->set_flashdata('message','Invalid login ');
                  redirect(site_url('employee/login'));
               }
           }else{
                 $this->session->set_flashdata('message','Invalid Login');
                 redirect(site_url('employee/login'));
           }
           
        }
    }
    function logout(){

      $data['last_login'] = time();
      $id = $this->session->userdata('user_id');
      $this->db->where('id',$id);
      $this->db->update('users',$data);

        $this->session->sess_destroy();
        if(isset($_SESSION)){
            session_destroy();
            unset($_SESSION);
        }
        redirect(site_url());
    }
    
    function auto(){
        $this->session->set_userdata('employee_id',1);
    }

}


?>