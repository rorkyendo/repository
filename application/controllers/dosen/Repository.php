<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repository extends CI_Controller {

		public function __construct()
    {
			parent::__construct();
			$this->session->set_userdata('menu','repository');
    }

    public function index()
    {
			$this->session->set_userdata('submenu','repository');
      $data['title']='Repository Fasilkom-TI';
	    $this->load->view('dosen/templates/header',$data);
      $this->load->view('dosen/templates/navbar');
      $this->load->view('dosen/templates/sidebar');
      $this->load->view('dosen/repository/index');
      $this->load->view('dosen/templates/footer');
    }

		public function create()
    {
			$this->session->set_userdata('submenu','repository');
      $data['title']='Repository Fasilkom-TI';
	    $this->load->view('dosen/templates/header',$data);
      $this->load->view('dosen/templates/navbar');
      $this->load->view('dosen/templates/sidebar');
      $this->load->view('dosen/repository/create');
      $this->load->view('dosen/templates/footer');
    }

		public function edit($id)
    {
			$this->session->set_userdata('submenu','repository');
      $data['title']='Repository Fasilkom-TI';
	    $this->load->view('dosen/templates/header',$data);
      $this->load->view('dosen/templates/navbar');
      $this->load->view('dosen/templates/sidebar');
      $this->load->view('dosen/repository/edit');
      $this->load->view('dosen/templates/footer');
    }

		public function not_accepted()
		{
			$this->session->set_userdata('submenu','not_accepted');
			$data['title']='Repository Fasilkom-TI';
			$this->load->view('dosen/templates/header',$data);
			$this->load->view('dosen/templates/navbar');
			$this->load->view('dosen/templates/sidebar');
			$this->load->view('dosen/repository/not_accepted');
			$this->load->view('dosen/templates/footer');
		}

		public function log_acceptance()
		{
			$this->session->set_userdata('submenu','log_acceptance');
			$data['title']='Repository Fasilkom-TI';
			$this->load->view('dosen/templates/header',$data);
			$this->load->view('dosen/templates/navbar');
			$this->load->view('dosen/templates/sidebar');
			$this->load->view('dosen/repository/log_acceptance');
			$this->load->view('dosen/templates/footer');
		}

  }
?>
