<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

		public function __construct()
    {
			parent::__construct();
			$login = $this->session->userdata('loggedIn');
			$group_id = $this->session->userdata('group_id');
			if($login!=true&&$group_id!=3){
				redirect('auth/logout');
			}
			$this->session->set_userdata('menu','dashboard');
			$this->session->set_userdata('submenu','');
			$this->load->model('mahasiswa/dashboard_model','dbObject');
			$this->user_id = $this->session->userdata('user_id');
    }

    public function index()
    {
      $data['title']='Repository Fasilkom-TI';
			$data['koleksi']=COUNT($this->dbObject->get_general_by_id('repository','author_user_id',$this->user_id));
			$data['menunggu_persetujuan']=COUNT($this->dbObject->get_repository('repository',$this->user_id,0));
			$data['sedang_diperbarui']=COUNT($this->dbObject->get_repository('repository',$this->user_id,2));
			$data['disetujui']=COUNT($this->dbObject->get_repository('repository',$this->user_id,1));
	    $this->load->view('mahasiswa/templates/header',$data);
      $this->load->view('mahasiswa/templates/navbar');
      $this->load->view('mahasiswa/templates/sidebar');
      $this->load->view('mahasiswa/dashboard/index');
      $this->load->view('mahasiswa/templates/footer');
    }

  }
?>
