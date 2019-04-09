<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repository extends CI_Controller {

		public function __construct()
    {
			parent::__construct();
			$login = $this->session->userdata('loggedIn');
			$group_id = $this->session->userdata('group_id');
			if($login!=true&&$group_id!=1){
				redirect('auth/logout');
			}
			$this->session->set_userdata('menu','repository');
			$this->load->model('admin/repository_model','dbObject');
			$this->user_id = $this->session->userdata('user_id');
    }

		public function detail($id)
		{
			$this->session->set_userdata('submenu','log_acceptance');
			$data['title']='Repository Fasilkom-TI';
			$data['repository']=$this->dbObject->get_repository_by_id('repository',$id);
			$this->load->view('admin/templates/header',$data);
			$this->load->view('admin/templates/navbar');
			$this->load->view('admin/templates/sidebar');
			$this->load->view('admin/repository/detail',$data);
			$this->load->view('admin/templates/footer');
		}

		public function all()
		{
			$this->session->set_userdata('menu','all_repository');
			$data['title']='Repository Fasilkom-TI';
			$data['repository']=$this->dbObject->get_repository_all('repository',1);
			$this->load->view('admin/templates/header',$data);
			$this->load->view('admin/templates/navbar');
			$this->load->view('admin/templates/sidebar');
			$this->load->view('admin/repository/all',$data);
			$this->load->view('admin/templates/footer');
		}

  }
?>
