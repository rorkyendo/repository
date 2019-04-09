<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

		public function __construct()
    {
			parent::__construct();
			$this->session->set_userdata('menu','dashboard');
			$this->session->set_userdata('submenu','');
    }

    public function index()
    {
      $data['title']='Repository Fasilkom-TI';
	    $this->load->view('dosen/templates/header',$data);
      $this->load->view('dosen/templates/navbar');
      $this->load->view('dosen/templates/sidebar');
      $this->load->view('dosen/dashboard/index');
      $this->load->view('dosen/templates/footer');
    }

  }
?>
