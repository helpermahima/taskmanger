<?php

/**
 * The base controller which is used by the Front and the Admin controllers
 */
class Base_Controller extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
}

class Front_Controller extends Base_Controller
{
    var $data;
    function __construct() {
        parent::__construct();
      
        $this->setting = $this->db->get('site_settings')->row();
        $this->profile = $this->db->get('site_profile')->row();

    }
}

class Admin_Controller extends Base_Controller 
{
    function __construct()
    {
               
        parent::__construct();
                $this->load->helper('admin');
                $admin_id=$this->session->userdata('admin_user_id');

         if(!$admin_id || empty($admin_id)){
                    redirect(admin_url('login'));
                }

    }
}


class Employee_Controller extends Base_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('admin');

        $this->setting = $this->db->get('site_settings')->row();
        $this->profile = $this->db->get('site_profile')->row();

        
        $userid = $this->session->userdata('employee_id');
        $this->employee = $this->db->get_where('users', array('id'=>$userid))->row();
            if(!$userid || empty($userid)){
                redirect(site_url('employee'));
            }


    }
}

