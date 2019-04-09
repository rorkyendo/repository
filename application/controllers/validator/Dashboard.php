<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

		public function __construct()
    {
			parent::__construct();
			$login = $this->session->userdata('loggedIn');
			$group_id = $this->session->userdata('group_id');
			if($login!=true&&$group_id!=4){
				redirect('auth/logout');
			}
			$this->session->set_userdata('menu','dashboard');
			$this->session->set_userdata('submenu','');
			$this->load->model('validator/dashboard_model','dbObject');
    }

    public function index()
    {
      $data['title']='Repository Fasilkom-TI';
			$data['jumlah_kategori']=COUNT($this->dbObject->get_general('repository_category'));
			$data['jumlah_persetujuan']=COUNT($this->dbObject->get_general_by_id2('repository','status','0','2'));
	    $this->load->view('validator/templates/header',$data);
      $this->load->view('validator/templates/navbar');
      $this->load->view('validator/templates/sidebar');
      $this->load->view('validator/dashboard/index');
      $this->load->view('validator/templates/footer');
    }

  }
?>
