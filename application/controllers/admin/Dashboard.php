<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

		public function __construct()
    {
			parent::__construct();
			$login = $this->session->userdata('loggedIn');
			$group_id = $this->session->userdata('group_id');
			if($login!=true&&$group_id!=1){
				redirect('auth/logout');
			}
			$this->session->set_userdata('menu','dashboard');
			$this->session->set_userdata('submenu','');
			$this->load->model('admin/dashboard_model','dbObject');
    }

    public function index()
    {
      $data['title']='Repository Fasilkom-TI';
			$data['jumlah_login']=COUNT($this->dbObject->get_general('users_session_login'));
			$data['jumlah_revisi']=COUNT($this->dbObject->get_general_by_id('repository','status','2'));
			$data['jumlah_persetujuan']=COUNT($this->dbObject->get_general_by_id('repository','status','0'));
	    $this->load->view('admin/templates/header',$data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/dashboard/index',$data);
      $this->load->view('admin/templates/footer');
    }

  }
?>
