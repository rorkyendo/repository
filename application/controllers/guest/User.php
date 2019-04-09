<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

		public function __construct()
    {
			parent::__construct();
			$login = $this->session->userdata('loggedIn');
			$group_id = $this->session->userdata('group_id');
			if($login!=true&&$group_id!=5){
				redirect('auth/logout');
			}
			$this->session->set_userdata('menu','dashboard');
			$this->session->set_userdata('submenu','');
			$this->load->model('guest/user_model','dbObject');
			$this->user_id = $this->session->userdata('user_id');
			$this->kon_id = $this->session->userdata('kon_id');
    }

    public function profile($param1='',$param2='',$param3='')
    {
			if($param1=='edit')
			{
				$nik = $this->input->post('nik');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$nama_depan = $this->input->post('nama_depan');
				$nama_belakang = $this->input->post('nama_belakang');
				$email = $this->input->post('email');
				$nomor_hp = $this->input->post('nomor_hp');
				$tempat_lahir = $this->input->post('tempat_lahir');
				$tgl_lahir = $this->input->post('tgl_lahir');
				$data_member = array(
					'nik' => $nik,
					'nama_depan' => $nama_depan,
					'nama_belakang' => $nama_belakang,
					'tempat_lahir' => $tempat_lahir,
					'tgl_lahir' => date('Y-m-d',strtotime($tgl_lahir)),
					'email' => $email,
					'nomor_hp' => $nomor_hp
				);
				$this->dbObject->update_general('data_member','id_member',$param3,$data_member);

				$data_user = array(
					'password' => md5($password),
				);
				$this->dbObject->update_general('users','user_id',$param2,$data_user);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Profile kamu berhasil di edit</div>');
				redirect('guest/user/profile/'.$this->user_id);
			}else{
			$data['title']='Repository Fasilkom-TI';
			$data['profile']=$this->dbObject->get_profile($param1,$this->kon_id);
	    $this->load->view('guest/templates/header',$data);
      $this->load->view('guest/templates/navbar');
      $this->load->view('guest/templates/sidebar');
      $this->load->view('guest/user/edit',$data);
      $this->load->view('guest/templates/footer');
			}
		}

  }
?>
