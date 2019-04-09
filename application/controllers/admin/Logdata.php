<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logdata extends CI_Controller {

  public function __construct()
    {
      parent::__construct();
      $login = $this->session->userdata('loggedIn');
      $group_id = $this->session->userdata('group_id');
      if($login!=true&&$group_id!=1){
        redirect('auth/logout');
      }
      $this->session->set_userdata('menu','logdata');
      $this->load->model('admin/log_model','dbObject');
    }

    public function log_download()
    {
      $this->session->set_userdata('submenu','log_download');
      $data['title']='Repository Fasilkom-TI';
      $this->load->view('admin/templates/header',$data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/log_download/index');
      $this->load->view('admin/templates/footer');
    }

    public function log_login()
    {
      $this->session->set_userdata('submenu','log_login');
      $data['title']='Repository Fasilkom-TI';
      $this->load->view('admin/templates/header',$data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/log_login/index',$data);
      $this->load->view('admin/templates/footer');
    }

    public function log_login_detail()
    {
      $data['login']=$this->dbObject->get_login();
      $this->load->view('admin/log_login/detail',$data);
    }

    public function log_revision()
    {
      $this->session->set_userdata('submenu','log_revision');
      $data['title']='Repository Fasilkom-TI';
      $this->load->view('admin/templates/header',$data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/log_revision/index');
      $this->load->view('admin/templates/footer');
    }

    public function log_revision_detail()
    {
      $data['revisi']=$this->dbObject->get_log_revision();
      $this->load->view('admin/log_revision/detail',$data);
    }

    public function log_acceptance()
    {
      $this->session->set_userdata('submenu','log_acceptance');
      $data['title']='Repository Fasilkom-TI';
      $this->load->view('admin/templates/header',$data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/log_acceptance/index');
      $this->load->view('admin/templates/footer');
    }

    public function log_acceptance_detail()
    {
      $data['persetujuan']=$this->dbObject->get_log_repository_acceptance();
      $this->load->view('admin/log_acceptance/detail',$data);
    }

  }
?>
