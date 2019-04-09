<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends CI_Controller {

		public function __construct()
    {
			parent::__construct();
			$login = $this->session->userdata('loggedIn');
			$group_id = $this->session->userdata('group_id');
			if($login!=true&&$group_id!=1){
				redirect('auth/logout');
			}
			$this->session->set_userdata('menu','departemen');
			$this->session->set_userdata('submenu','');
			$this->load->model('admin/departemen_model','dbObject');
    }

    public function index()
    {
      $data['title']='Repository Fasilkom-TI';
			$data['departemen']=$this->dbObject->get_general('users_group');
	    $this->load->view('admin/templates/header',$data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/departemen/index',$data);
      $this->load->view('admin/templates/footer');
    }

		public function create($param1='')
    {
      $data['title']='Repository Fasilkom-TI';
	    $this->load->view('admin/templates/header',$data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/departemen/create');
      $this->load->view('admin/templates/footer');
			if($param1=='do')
			{
				$tables = 'users_group';
				$nama_departemen = $this->input->post('nama_departemen');
				$val='departemen';
				if($this->dbObject->get_general_like($tables,$val,$nama_departemen)==TRUE){
				$this->session->set_flashdata('notif','<div class="alert alert-danger">Nama Departemen sudah ada</div>');
				redirect('admin/departemen');
				}
				else
				{
					$data = array(
						'departemen' => $nama_departemen,
						'status' => '1',
					);
					$this->dbObject->create_general($tables,$data);
					$this->session->set_flashdata('notif','<div class="alert alert-success">Departemen Berhasil dibuat</div>');
					redirect('admin/departemen');
				}
			}
    }

		public function edit($param1='',$param2='')
    {
			if($param1=="not_active")
			{
				$data = array(
					'status' => '0'
				);
				$this->dbObject->update_general('users_group','group_id',$param2,$data);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Departemen Berhasil dinonaktifkan</div>');
				redirect('admin/departemen');
			}elseif ($param1=="active") {
				$data = array(
					'status' => '1'
				);
				$this->dbObject->update_general('users_group','group_id',$param2,$data);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Departemen Berhasil diaktifkan</div>');
				redirect('admin/departemen');
			}elseif($param1=="do_edit"){
				$data = array(
					'departemen' => $this->input->post('departemen')
				);
				$this->dbObject->update_general('users_group','group_id',$param2,$data);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Departemen Berhasil diedit</div>');
				redirect('admin/departemen');
			}else{
      $data['title']='Repository Fasilkom-TI';
			$data['departemen']=$this->dbObject->get_general_by_id('users_group','group_id',$param1);
	    $this->load->view('admin/templates/header',$data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/departemen/edit',$data);
      $this->load->view('admin/templates/footer');
			}
    }

  }
?>
