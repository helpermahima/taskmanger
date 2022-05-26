
<?php 
class Report extends Admin_Controller {

    function __construct() {
        parent::__construct();
        // $this->load->library('form_validation');
        $this->load->helper('date');
    }

    function reportPerMonth(){
        $data['title'] = "Report";

    	$data['logo'] = $this->db->get('site_settings')->row();
        $data['profile'] = $this->db->get('site_profile')->row();
    	$data['main'] = 'report';

        $sql = "SELECT  count(tbl_task.title) as y, Monthname(deadline) AS label from tbl_task GROUP by monthname(deadline) order by deadline asc";
        $data['result']=$this->db->query($sql)->result_array();
        	$this->load->view('admin/index',$data);
    }
    function reportPerUser(){
    	 $data['title'] = "Report Per User";
    	$data['logo'] = $this->db->get('site_settings')->row();
        $data['profile'] = $this->db->get('site_profile')->row();
    	$data['main'] = 'reportperuser';
    	$this->db->select('id,username');
    	$this->db->from('users');
    	$data['result']= $this->db->get()->result_array();
    	$this->load->view('admin/index',$data);
    }
    function generateReport(){
    	// print_r($_POST);die;
    	$userid= $_POST['id'];
    	$this->db->select('users.email,users.name,users.username, tbl_task.title,tbl_task.description,tbl_task.priority,tbl_task.str_date,tbl_task.deadline,tbl_task.status,tbl_task.rating');
    	$this->db->from('tbl_task');
    	$this->db->join('users','users.id= tbl_task.user_id');
    	$this->db->where('tbl_task.user_id ='.$userid);
    	$this->db->order_by('deadline','asc');
    	$data= $this->db->get()->result_array();
    	echo json_encode($data);
            }
        }
    