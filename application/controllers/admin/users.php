<?php

class Users extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }

    function index() {
        $data['logo'] = $this->db->get('site_settings')->row();
        $data['title'] = "Users";
        $data['users'] = $this->db->get('users')->result();
        $data['main'] = 'users/list';
        $data['res']='';
        $this->load->view('admin/index', $data);
    }

    function add_new() {
        $data['logo'] = $this->db->get('site_settings')->row();
        $data['title'] = "Add User";
        $data['main'] = 'users/form';
        $data['res']='';
        $this->load->view('admin/index', $data);
    }

    function edit($id) {
        $data['logo'] = $this->db->get('site_settings')->row();
        $data['user'] = $this->db->get_where('users', array('id' => $id))->row();
        $data['title'] = "Edit User";
        $data['main'] = 'users/form';
        $data['res']='';
        $this->load->view('admin/index', $data);
    }

    function save() {


        if ($this->input->post('password') != $this->input->post('repeat_password')) {
            $this->session->set_flashdata('message', 'Password and repeated password did not match');
            redirect(admin_url('users'));
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|');
        $this->form_validation->set_rules('email', 'Eamil', 'valid_email|trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->add_new();
            return false;
        }

        $data['email'] = $this->input->post('email');
        $data['username'] = $this->input->post('username');
        $password = md5(config_item('salt') . $this->input->post('password'));
        $data['password'] = $password;
        $data['created'] = time();
        $data['name'] = $this->input->post('name');
        $this->db->insert('users', $data);
        $this->session->set_flashdata('success', 'User added successfully!');
        redirect(admin_url('users'));
    }

    function update($id) {
        if ($this->input->post('password') != "" && $this->input->post('password') != $this->input->post('repeat_password')) {
            $this->session->set_flashdata(
                    'message', 'New password should match to repeat password to change password');
            redirect(admin_url('users/edit/' . $id));
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');

        $this->form_validation->set_rules('email', 'Eamil', 'valid_email|trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
            return false;
        }

        if ($this->input->post('password') != "") {
            $password = md5(config_item('salt') . $this->input->post('password'));
            $data['password'] = $password;
        }
        $data['email'] = $this->input->post('email');
        $data['username'] = $this->input->post('username');
        $data['created'] = time();
        $data['name'] = $this->input->post('name');
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        $this->session->set_flashdata('success', 'User updated successfully!');
        redirect(admin_url('users'));
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('users');
        $this->session->set_flashdata('success', 'User deleted succesfully');
        redirect(admin_url('users'));
    }
   
}


?>