<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

		public function __construct()
    {
			parent::__construct();
			$login = $this->session->userdata('loggedIn');
			$group_id = $this->session->userdata('group_id');
			if($login!=true&&$group_id!=1){
				redirect('auth/logout');
			}
			$this->session->set_userdata('menu','users');
			$this->load->model('admin/users_model','dbObject');
		}

    public function index()
    {
			$this->active();
    }

		public function active($param1='')
    {
			$this->session->set_userdata('submenu','users');
			if($param1=='mahasiswa'){
				$this->session->set_userdata('user','mahasiswa');
				$tbl='data_mahasiswa';
				$val='id_mahasiswa';
				$group_id = 3;
				$status = 1;
			}elseif($param1==''||$param1=='member'){
				$this->session->set_userdata('user','member');
				$tbl='data_member';
				$val='id_member';
				$group_id = 5;
				$status = 1;
			}elseif($param1=='validator'){
				$this->session->set_userdata('user','validator');
				$tbl='data_validator';
				$val='id_validator';
				$group_id = 4;
				$status = 1;
			}
			$data['users']=$this->dbObject->get_users_by_status($tbl,$val,$group_id,$status);
			$data['title']='Repository Fasilkom-TI';
	    $this->load->view('admin/templates/header',$data);
      $this->load->view('admin/templates/navbar');
			$this->load->view('admin/templates/sidebar');
      $this->load->view('admin/users/index',$data);
      $this->load->view('admin/templates/footer');
		}

		public function not_active()
    {
			$this->session->set_userdata('submenu','users_not_active');
			$tbl='data_member';
			$val='id_member';
			$group_id = 5;
			$status = 0;
			$data['users']=$this->dbObject->get_users_by_status($tbl,$val,$group_id,$status);
      $data['title']='Repository Fasilkom-TI';
	    $this->load->view('admin/templates/header',$data);
      $this->load->view('admin/templates/navbar');
			$this->load->view('admin/templates/sidebar');
      $this->load->view('admin/users/not_active',$data);
      $this->load->view('admin/templates/footer');
    }

		public function edit($param1='',$param2='')
		{
			if($param1=='not_active')
			{
				$data = array(
					'status' => '0'
				);
				$this->dbObject->update_general('data_member','id_member',$param2,$data);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Users Berhasil dinonaktifkan</div>');
				redirect('admin/users');
			}elseif($param1=='active') {
				$data = array(
					'status' => '1'
				);
				$this->dbObject->update_general('data_member','id_member',$param2,$data);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Users Berhasil diaktifkan</div>');
				redirect('admin/users');
			}else{
				redirect('admin/users/active');
			}
		}

		public function create($param1='',$param2='')
		{
			if($param1=='validator'&&$param2=='do_create')
			{
				$nama_validator =	$this->input->post('nama_validator');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				if($this->dbObject->get_general_like('users','username',$username)==TRUE){
					$this->session->set_flashdata('notif','<div class="alert alert-danger">Username telah digunakan</div>');
					redirect('admin/users/create/validator');
				}
				$data_validator = array(
					'nama_validator' => $nama_validator,
					'created_by' => $this->session->userdata('user_id'),
				);
				$this->dbObject->create_general('data_validator',$data_validator);
				$kon_id = $this->db->insert_id();
				$data_user = array(
					'username' => $username,
					'password' => md5($password),
					'group_id' => 4,
					'kon_id' => $kon_id
				);
				$this->dbObject->create_general('users',$data_user);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Validator berhasil dibuat</div>');
				redirect('admin/users/active/validator');
			}
			$data['title']='Repository Fasilkom-TI';
			$this->load->view('admin/templates/header',$data);
			$this->load->view('admin/templates/navbar');
			$this->load->view('admin/templates/sidebar');
			if($param1=='validator'){
			$this->load->view('admin/users/create_validator');
			}
			$this->load->view('admin/templates/footer');
		}

  }
?>
