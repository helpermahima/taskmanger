<?php

class Task extends Employee_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('date');
    }

    function index() {
        $data['logo'] = $this->db->get('site_settings')->row();
        $data['title'] = "Tasks";
        $data['result'] = $this->db->order_by('deadline','asc')->get_where('tbl_task', array('user_id'=>$this->employee->id))->result();
        $data['main'] = 'task/list';
        $this->load->view('employee/index', $data);
    }

    function view($id){
        $data['logo'] = $this->db->get('site_settings')->row();
        $data['title'] = "Task Detail";
        $data['result'] = $this->db->get_where('tbl_task', array('id'=>$id,'user_id'=>$this->employee->id))->row();
        $data['comments'] = $this->db->get_where('tbl_comment', array('task_id'=>$id))->result();
        $data['messages'] = $this->db->get_where('tbl_comment', array('task_id'=>$id))->result();
        $data['main'] = 'task/detail';
        $this->load->view('employee/index', $data);        
    }

    function comment($id){
        $data['comment'] = $this->input->post('comment');
        $data['task_id'] = $id;
        $data['user_id'] = $this->employee->id;
        $data['user_type'] = 'employee';
        $config['upload_path'] = './uploads/files';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2000000';

        $this->load->library('upload', $config);
        
        if ( $this->upload->do_upload('file')) {
            $upload_data    = $this->upload->data();
            $data['file'] = $upload_data['file_name']; 
        }
        $this->db->insert('tbl_comment',$data);
        redirect(site_url('employee/task/view/'.$id));

    }
    function submit($id){
        $data['status'] = '2';
        $this->db->where('id',$id);
        $this->db->update('tbl_task',$data);
        redirect(site_url('employee/task'));
    }
   
}