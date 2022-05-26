<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\htdocs\email\vendor\autoload.php';
class Task extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->helper('email');

    }

    function index() {
        
        $data['logo'] = $this->db->get('site_settings')->row();
        $data['title'] = "Tasks";
        $this->db->select("users.*,tbl_task.*");
        $this->db->from('tbl_task');
        $this->db->join('users','users.id= tbl_task.user_id');
        $data['result']=$this->db->get()->result_array();
//          echo '<pre>';
// print_r($data['result']);die;
    /*Compares two date call back function*/
            function date_compare($element1, $element2) {
                $datetime1 = strtotime($element1['deadline']);
                $datetime2 = strtotime($element2['deadline']);
                return $datetime1 - $datetime2;
            } 
        usort($data['result'], 'date_compare');
        $data['main'] = 'task/list';
        $this->load->view('admin/index', $data);
    }

// public function getDetails(){
//     // $arr =[];
        
//         echo json_encode($data);
//     }
    function add() {
        $data['logo'] = $this->db->get('site_settings')->row();
        $data['title'] = "Add Task";
        $data['main'] = 'task/form';
        $data['res'] = '';
        $data['users'] = $this->db->order_by('id','desc')->get('users')->result();
        // $this->session->set_flashdata('success', 'Task has been added sucessfully');
        $this->load->view('admin/index', $data);
    }

    function view($id){
        $data['logo'] = $this->db->get('site_settings')->row();
        $data['result'] = $this->db->get_where('tbl_task', array('id' => $id))->row();
        $data['comments'] = $this->db->get_where('tbl_comment', array('task_id'=>$id))->result();
        $data['title'] = "View Task";
        $data['main'] = 'task/detail';
        $this->load->view('admin/index', $data);
    }

    function edit($id) {
        $data['logo'] = $this->db->get('site_settings')->row();
        $data['result'] = $this->db->get_where('tbl_task', array('id' => $id))->row();
        $data['users'] = $this->db->order_by('id','desc')->get('users')->result();
        $data['title'] = "Edit Task";
        $data['main'] = 'task/form';
        $this->load->view('admin/index', $data);
    }

    function save(){
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['user_id'] = $this->input->post('user_id');
        $data['deadline'] = date("Y-m-d",strtotime($this->input->post('deadline')));
        $data['str_date'] = date("Y-m-d",strtotime($this->input->post('str_date')));
        // $data['str_date'] = $this->input->post('str_date');
        $data['priority'] = $this->input->post('priority');
        $data['created'] = time();

        $config['upload_path'] = './uploads/files';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2000000';

        $this->load->library('upload', $config);
        
        if ( $this->upload->do_upload('file')) {
            $upload_data    = $this->upload->data();
            $data['file'] = $upload_data['file_name']; 
        }
// $last_id=6;
        $this->db->insert('tbl_task',$data);
        $last_id = $this->db->insert_id();
        if($last_id){   
        $mail = new PHPMailer(TRUE);
try {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->join('tbl_task', 'user_id = users.id');
    $this->db->where('users.id',$data['user_id']);
    $this->db->where('tbl_task.id',$last_id);
    $data = $this->db->get()->result_array();
    
    $email = $data[0]['email'];
    $username = $data[0]['username'];
    $title ='';
    $deadline ='';
    $description ='';
    // $table .='<table border="1"><thead><tr><th>Task Title</th><th>Description</th>Deadline</th></tr></thead><tbody>'; 
    foreach ($data as $val){
        $title = $val['title'];
        $deadline = $val['deadline'];
        $description = $val['description'];
        // $table .="<tr><td>".$val['title']."</td><td>".$val['description']."</td><td>".$val['deadline']."</td></tr>";
    }
    // $table .= '<tbody></table>';
    // echo $email;die;
    // $this->db->get_where('users', array('user_id' => $data['user_id']))->r();
   $mail->setFrom('mahimabh93@gmail.com', 'System');
   $mail->addAddress($email, 'Employee');

   $mail->Subject ="Task Regarding";
   $mail->Body = 'Dear '.$username.",

   The task $title has been assigned to you with description $description and deadline $deadline don't reply to this email";
   
   /* SMTP parameters. */
   
   /* Tells PHPMailer to use SMTP. */
   $mail->isSMTP();
   
   /* SMTP server address. */
   $mail->Host = 'smtp.elasticemail.com';

   /* Use SMTP authentication. */
   $mail->SMTPAuth = TRUE;
   
   /* Set the encryption system. */
   $mail->SMTPSecure = 'tls';
   
   /* SMTP authentication username. */
   $mail->Username = 'mahimabh93@gmail.com';
   
   /* SMTP authentication password. */
   $mail->Password = '4856E79B9DB34BDD4FD5F78FCA078A942CCD';
   
   /* Set the SMTP port. */
   $mail->Port = 2525;
   
   /* Finally send the mail. */
   
   if($mail->send()){
    $this->session->flashdata('success','Task Created Sucessfully !');
    redirect(admin_url('task'));


   }


}
catch (Exception $e)
{
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   echo $e->getMessage();
}
        }
        $this->session->flashdata('success','Task Created Sucessfully !');
        redirect(admin_url('task'));
    }


    function update($id){

        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['user_id'] = $this->input->post('user_id');
        $data['deadline'] = $this->input->post('deadline');
        $data['priority'] = $this->input->post('priority');
       
        $config['upload_path'] = './uploads/files';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2000000';

        $this->load->library('upload', $config);
        
        if ( $this->upload->do_upload('file')) {
            $upload_data    = $this->upload->data();
            $data['file'] = $upload_data['file_name']; 
        }

        $this->db->where('id',$id);
        $this->db->update('tbl_task',$data);
        $this->session->flashdata('msg','Task Updated Sucessfully !');
        redirect(admin_url('task'));
    }

    function comment($id){
        $data['action']= $this->input->post('action');
        $data['comment'] = $this->input->post('comment');
        $data['task_id'] = $id; 
        $data['user_id'] = $this->session->userdata('admin_user_id');
        $data['user_type'] = 'admin';
        $config['upload_path'] = './uploads/files';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2000000';

        $this->load->library('upload', $config);
        
        if ( $this->upload->do_upload('file')) {
            $upload_data    = $this->upload->data();
            $data['file'] = $upload_data['file_name']; 
        }
        $this->db->insert('tbl_comment',$data);
        redirect(site_url('admin/task/view/'.$id));

    }

    function delete($id){
        // echo $id;die;
        $this->db->where('task_id',$id);
        $this->db->delete('tbl_comment');
        $this->db->where('id',$id);
        $this->db->delete('tbl_task');
        $this->session->set_flashdata('success', 'Task has been deleted sucessfully');
        redirect(admin_url('task'));
    }


    function complete($id){
        $data['status'] = '1';
        $this->db->where('id',$id);
        $this->db->update('tbl_task',$data);
        redirect(admin_url('task'));
    }
    


}