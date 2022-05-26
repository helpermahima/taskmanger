<?php

class Front extends Front_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('text', 'url', 'text');
        $this->load->helper('date');
        $this->load->library('pagination');
    }

    function show_msg(){
        $setting = $this->db->get('site_settings')->row();
        $data['setting'] = $setting;
        $this->load->view('temp', $data);
    }



    function index() {

        $setting = $this->db->get('site_settings')->row();
        // if($setting->offline == 1){
        //    $this->show_msg();
        // }else{
            $this->home();
        
    }

    function home(){ 
        $data['seo'] = $this->db->get('site_settings')->row();
        $this->load->view('index',$data);   
    }

}
?>