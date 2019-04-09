	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repository extends CI_Controller {

		public function __construct()
    {
			parent::__construct();
			$login = $this->session->userdata('loggedIn');
			$group_id = $this->session->userdata('group_id');
			if($login!=true&&$group_id!=4){
				redirect('auth/logout');
			}
			$this->session->set_userdata('menu','repository');
			$this->load->model('validator/repository_model','dbObject');
    }

    public function index()
    {
			$this->log_acceptance();
    }

		public function log_acceptance($param1='',$param2='')
		{
			if($param1=='accept')
			{
				$data = array(
					'status' => '1',
					'accepted_by'=> $this->session->userdata('user_id')
				);
				$this->dbObject->update_general('repository','id_repository',$param2,$data);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Repository Berhasil disetujui</div>');
				redirect('validator/repository/log_acceptance');
			}elseif ($param1=='reject') {
				$data = array(
					'status' => '3',
					'accepted_by'=> $this->session->userdata('user_id')
				);
				$this->dbObject->update_general('repository','id_repository',$param2,$data);
				$this->session->set_flashdata('notif','<div class="alert alert-danger">Repository Berhasil ditolak</div>');
				redirect('validator/repository/log_acceptance');
			}
			$this->session->set_userdata('submenu','log_acceptance');
			$data['title']='Repository Fasilkom-TI';
			$data['persetujuan']=$this->dbObject->get_repository_log_acceptance('repository');
			$this->load->view('validator/templates/header',$data);
			$this->load->view('validator/templates/navbar');
			$this->load->view('validator/templates/sidebar');
			$this->load->view('validator/repository/log_acceptance',$data);
			$this->load->view('validator/templates/footer');
		}

		public function category()
		{
			$this->session->set_userdata('submenu','category');
			$data['title']='Repository Fasilkom-TI';
			$table='repository_category';
			$data['repository_category']=$this->dbObject->get_general($table);
			$this->load->view('validator/templates/header',$data);
			$this->load->view('validator/templates/navbar');
			$this->load->view('validator/templates/sidebar');
			$this->load->view('validator/repository/category',$data);
			$this->load->view('validator/templates/footer');
		}

		public function create_category($param1='')
		{
			$this->session->set_userdata('submenu','category');
			$data['title']='Repository Fasilkom-TI';
			$this->load->view('validator/templates/header',$data);
			$this->load->view('validator/templates/navbar');
			$this->load->view('validator/templates/sidebar');
			$this->load->view('validator/repository/create_category',$data);
			$this->load->view('validator/templates/footer');
			if($param1=='do')
			{
				$tables = 'repository_category';
				$category_name = $this->input->post('category_name');
				$val='nama_repository_category';
				if($this->dbObject->get_general_like($tables,$val,$category_name)==TRUE){
				$this->session->set_flashdata('notif','<div class="alert alert-danger">Nama Kategori sudah ada</div>');
				redirect('validator/repository/category');
				}
				else
				{
					$data = array(
						'nama_repository_category' => $category_name,
						'status' => '1',
						'created_by' => $this->session->userdata('user_id')
					);
					$this->dbObject->create_general($tables,$data);
					$this->session->set_flashdata('notif','<div class="alert alert-success">Kategori Berhasil dibuat</div>');
					redirect('validator/repository/category');
				}
			}
		}

		public function edit_category($param1='',$param2='')
		{
			if($param1=="not_active")
			{
				$data = array(
					'status' => '0',
					'updated_by' => $this->session->userdata('user_id')
				);
				$this->dbObject->update_general('repository_category','id_repository_category',$param2,$data);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Kategori repository Berhasil dinonaktifkan</div>');
				redirect('validator/repository/category');
			}elseif ($param1=="active") {
				$data = array(
					'status' => '1',
					'updated_by' => $this->session->userdata('user_id')
				);
				$this->dbObject->update_general('repository_category','id_repository_category',$param2,$data);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Kategori repository Berhasil diaktifkan</div>');
				redirect('validator/repository/category');
			}elseif($param1=="do_edit"){
				$data = array(
					'nama_repository_category' => $this->input->post('nama_repository_category')
				);
				$this->dbObject->update_general('repository_category','id_repository_category',$param2,$data);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Kategori repository Berhasil diedit</div>');
				redirect('validator/repository/category');
			}else{
			$this->session->set_userdata('submenu','category');
			$data['title']='Repository Fasilkom-TI';
			$data['repository_category']=$this->dbObject->get_general_by_id('repository_category','id_repository_category',$param1);
			$this->load->view('validator/templates/header',$data);
			$this->load->view('validator/templates/navbar');
			$this->load->view('validator/templates/sidebar');
			$this->load->view('validator/repository/edit_category',$data);
			$this->load->view('validator/templates/footer');
		}
	}

	public function category_file()
	{
		$this->session->set_userdata('submenu','category_file');
		$data['title']='Repository Fasilkom-TI';
		$table='file_category';
		$data['file_category']=$this->dbObject->get_general($table);
		$this->load->view('validator/templates/header',$data);
		$this->load->view('validator/templates/navbar');
		$this->load->view('validator/templates/sidebar');
		$this->load->view('validator/repository/category_file',$data);
		$this->load->view('validator/templates/footer');
	}

	public function create_category_file($param1='')
	{
		$this->session->set_userdata('submenu','category_file');
		$data['title']='Repository Fasilkom-TI';
		$this->load->view('validator/templates/header',$data);
		$this->load->view('validator/templates/navbar');
		$this->load->view('validator/templates/sidebar');
		$this->load->view('validator/repository/create_category_file',$data);
		$this->load->view('validator/templates/footer');
		if($param1=='do')
		{
			$tables = 'file_category';
			$category_name = $this->input->post('category_name');
			$val='nama_file_category';
			if($this->dbObject->get_general_like($tables,$val,$category_name)==TRUE){
			$this->session->set_flashdata('notif','<div class="alert alert-danger">Nama Kategori File sudah ada</div>');
			redirect('validator/repository/category_file');
			}
			else
			{
				$data = array(
					'nama_file_category' => $category_name,
					'status' => '1',
					'created_by' => $this->session->userdata('user_id')
				);
				$this->dbObject->create_general($tables,$data);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Kategori File Berhasil dibuat</div>');
				redirect('validator/repository/category_file');
			}
		}
	}

	public function edit_category_file($param1='',$param2='')
	{
		if($param1=="not_active")
		{
			$data = array(
				'status' => '0',
				'updated_by' => $this->session->userdata('user_id')
			);
			$this->dbObject->update_general('file_category','id_file_category',$param2,$data);
			$this->session->set_flashdata('notif','<div class="alert alert-success">Kategori File Berhasil dinonaktifkan</div>');
			redirect('validator/repository/category_file');
		}elseif ($param1=="active") {
			$data = array(
				'status' => '1',
				'updated_by' => $this->session->userdata('user_id')
			);
			$this->dbObject->update_general('file_category','id_file_category',$param2,$data);
			$this->session->set_flashdata('notif','<div class="alert alert-success">Kategori File repository Berhasil diaktifkan</div>');
			redirect('validator/repository/category_file');
		}elseif($param1=="do_edit"){
			$data = array(
				'nama_file_category' => $this->input->post('nama_file_category')
			);
			$this->dbObject->update_general('file_category','id_file_category',$param2,$data);
			$this->session->set_flashdata('notif','<div class="alert alert-success">Kategori File Berhasil diedit</div>');
			redirect('validator/repository/category_file');
		}else{
		$this->session->set_userdata('submenu','category_file');
		$data['title']='Repository Fasilkom-TI';
		$data['file_category']=$this->dbObject->get_general_by_id('file_category','id_file_category',$param1);
		$this->load->view('validator/templates/header',$data);
		$this->load->view('validator/templates/navbar');
		$this->load->view('validator/templates/sidebar');
		$this->load->view('validator/repository/edit_category_file',$data);
		$this->load->view('validator/templates/footer');
		}
	}

	public function detail($id)
	{
		$this->session->set_userdata('submenu','log_acceptance');
		$data['title']='Repository Fasilkom-TI';
		$data['repository']=$this->dbObject->get_repository_by_id('repository',$id);
		$this->load->view('validator/templates/header',$data);
		$this->load->view('validator/templates/navbar');
		$this->load->view('validator/templates/sidebar');
		$this->load->view('validator/repository/detail',$data);
		$this->load->view('validator/templates/footer');
	}

	public function all()
	{
		$this->session->set_userdata('menu','all_repository');
		$data['title']='Repository Fasilkom-TI';
		$data['repository']=$this->dbObject->get_repository_all('repository',1);
		$this->load->view('validator/templates/header',$data);
		$this->load->view('validator/templates/navbar');
		$this->load->view('validator/templates/sidebar');
		$this->load->view('validator/repository/all',$data);
		$this->load->view('validator/templates/footer');
	}

}
?>
