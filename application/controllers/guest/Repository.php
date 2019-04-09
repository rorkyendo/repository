<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repository extends CI_Controller {

		public function __construct()
    {
			parent::__construct();
			$login = $this->session->userdata('loggedIn');
			$group_id = $this->session->userdata('group_id');
			if($login!=true&&$group_id!=5){
				redirect('auth/logout');
			}
			$this->session->set_userdata('menu','repository');
			$this->load->model('guest/repository_model','dbObject');
			$this->user_id = $this->session->userdata('user_id');
    }

    public function index()
    {
			$this->session->set_userdata('submenu','repository');
      $data['title']='Repository Fasilkom-TI';
			$data['repository']=$this->dbObject->get_repository('repository',$this->user_id,1);
	    $this->load->view('guest/templates/header',$data);
      $this->load->view('guest/templates/navbar');
      $this->load->view('guest/templates/sidebar');
      $this->load->view('guest/repository/index',$data);
      $this->load->view('guest/templates/footer');
    }

		public function all()
		{
			$this->session->set_userdata('menu','all_repository');
			$data['title']='Repository Fasilkom-TI';
			$data['repository']=$this->dbObject->get_repository_all('repository',1);
			$this->load->view('guest/templates/header',$data);
			$this->load->view('guest/templates/navbar');
			$this->load->view('guest/templates/sidebar');
			$this->load->view('guest/repository/all',$data);
			$this->load->view('guest/templates/footer');
		}

		public function create($param1='')
    {
			if($param1=='do')
			{
				$file_data = array();
				$gbr_data = array();

				$this->load->library('upload');

				$judul = $this->input->post('judul');
				$category_file = $this->input->post('category_file');
				$category_repository = $this->input->post('category_repository');
				$abstract = $this->input->post('abstract');
				//--------------------------- UPLOAD FILE REPOSITORY ------------------------------//
				$check_file_kategori = $this->dbObject->get_general_by_id('file_category','id_file_category',$category_file);
				foreach($check_file_kategori as $key){
					$category_file_name = $key->nama_file_category;
				}
				if (!is_dir('assets/repository/guest/'.$category_file_name)){
						$oldmask = umask(0);
    				mkdir('./assets/repository/guest/' . $category_file_name, 0777, TRUE);
						umask($oldmask);
				}
						$file_config['upload_path']          = 'assets/repository/guest/'.$category_file_name;
						$file_config['allowed_types']        = 'pdf';
						$file_config['max_size']             = 10000;
						$this->upload->initialize($file_config);
						if($this->upload->do_upload('file')){
							$file_data = $this->upload->data('file_name');
							$upload_file = TRUE;
						}else{
							$upload_file = FALSE;
						}
			//--------------------------- END OF UPLOAD FILE REPOSITORY ------------------------------//

			//---------------------------- Upload File Gambar Repository -----------------------------//
				$image_config['upload_path']          = 'assets/img/cover/';
				$image_config['allowed_types']        = 'img|jpg|jpeg|png';
				$image_config['max_size']             = 10000;
				$this->upload->initialize($image_config);
				if($this->upload->do_upload('image')){
					$gbr_data = $this->upload->data('file_name');
					$upload_file_gbr = TRUE;
				}else{
					$upload_file_gbr = FALSE;
				}
			//-------------------------- End of Upload File Gambar Repository -----------------------//

						if ($upload_file_gbr == FALSE && $upload_file == FALSE)
						{
									$error = array('error' => $this->upload->display_errors());
									var_dump($error);die;
						}else{
							$data_repository = array(
								'id_repository_category' => $category_repository,
								'id_file_category' => $category_file,
								'title' => $judul,
								'abstract' => $abstract,
								'author_user_id' => $this->session->userdata('user_id'),
								'status' => '0',
								'repository_location' => $file_config['upload_path']."/".$file_data,
								'repository_cover_image' => $image_config['upload_path']."/".$gbr_data
							);

							chmod($data_repository['repository_location'], 0777);
							$this->dbObject->create_general('repository',$data_repository);
							$this->session->set_flashdata('notif','<div class="alert alert-success"> Repository berhasil dibuat dan Telah masuk dalam antrian persetujuan </div>');
							redirect('guest/repository/log_acceptance');
						}

			}else{
			$this->session->set_userdata('submenu','repository');
      $data['title']='Repository Fasilkom-TI';
			$data['kategori_repository']=$this->dbObject->get_general_by_id('repository_category','status',1);
			$data['kategori_file_repository']=$this->dbObject->get_general_by_id('file_category','status',1);
	    $this->load->view('guest/templates/header',$data);
      $this->load->view('guest/templates/navbar');
      $this->load->view('guest/templates/sidebar');
      $this->load->view('guest/repository/create');
      $this->load->view('guest/templates/footer');
			}
    }

		public function edit($param1='',$param2='')
    {
			if($param1=='do_edit')
			{

				$file_data = array();
				$gbr_data = array();

				$this->load->library('upload');

				$judul = $this->input->post('judul');
				$category_file = $this->input->post('category_file');
				$category_repository = $this->input->post('category_repository');
				$abstract = $this->input->post('abstract');

				//--------------------------- UPLOAD FILE REPOSITORY ------------------------------//
				$check_file_kategori = $this->dbObject->get_general_by_id('file_category','id_file_category',$category_file);
				foreach($check_file_kategori as $key){
					$category_file_name = $key->nama_file_category;
				}
				if (!is_dir('assets/repository/guest/'.$category_file_name)){
						$oldmask = umask(0);
    				mkdir('./assets/repository/guest/' . $category_file_name, 0777, TRUE);
						umask($oldmask);
				}
						$file_config['upload_path']          = 'assets/repository/guest/'.$category_file_name;
						$file_config['allowed_types']        = 'pdf';
						$file_config['max_size']             = 10000;
						$this->upload->initialize($file_config);
						if($this->upload->do_upload('file')){
							$file_data = $this->upload->data('file_name');
							$upload_file = TRUE;
						}else{
							$upload_file = FALSE;
						}
			//--------------------------- END OF UPLOAD FILE REPOSITORY ------------------------------//

			//---------------------------- Upload File Gambar Repository -----------------------------//
				$image_config['upload_path']          = 'assets/img/cover/';
				$image_config['allowed_types']        = 'img|jpg|jpeg|png';
				$image_config['max_size']             = 10000;
				$this->upload->initialize($image_config);
				if($this->upload->do_upload('image')){
					$gbr_data = $this->upload->data('file_name');
					$upload_file_gbr = TRUE;
				}else{
					$upload_file_gbr = FALSE;
				}
			//-------------------------- End of Upload File Gambar Repository -----------------------//

						if ($upload_file == FALSE && $upload_file_gbr == FALSE)
						{
							//-------------------JIKA FILE TIDAK ADA YANG DI EDIT-----------------------//
								$data_repository = array(
									'id_repository_category' => $category_repository,
									'id_file_category' => $category_file,
									'title' => $judul,
									'abstract' => $abstract,
									'author_user_id' => $this->session->userdata('user_id'),
									'status' => '2'
								);
								$this->dbObject->update_general('repository','id_repository',$param2,$data_repository);
								$this->session->set_flashdata('notif','<div class="alert alert-success"> Repository Telah di edit dan masuk dalam antrian persetujuan </div>');
								redirect('guest/repository/log_acceptance');
								//-------------------END OF JIKA FILE TIDAK ADA YANG DI EDIT-----------------------//
						}elseif($upload_file == TRUE && $upload_file_gbr == FALSE) {
							$data_repository = array(
								'id_repository_category' => $category_repository,
								'id_file_category' => $category_file,
								'title' => $judul,
								'abstract' => $abstract,
								'author_user_id' => $this->session->userdata('user_id'),
								'status' => '2',
								'repository_location' => $file_config['upload_path']."/".$file_data,
							);
							chmod($data_repository['repository_location'], 0777);
							//--------------------------- MENGAMBIL DATA LAMA DAN MENGHAPUS FILE LAMA -------------------------//
							$old_file =	$this->input->post('old_file');
							unlink("./".$old_file);
							//--------------------------- END OF MENGAMBIL DATA LAMA DAN MENGHAPUS FILE LAMA -------------------------//
							$this->dbObject->update_general('repository','id_repository',$param2,$data_repository);
							$this->session->set_flashdata('notif','<div class="alert alert-success"> Repository Telah di edit dan masuk dalam antrian persetujuan </div>');
							redirect('guest/repository/log_acceptance');
						}
						elseif ($upload_file == FALSE && $upload_file_gbr == TRUE ) {
							$data_repository = array(
								'id_repository_category' => $category_repository,
								'id_file_category' => $category_file,
								'title' => $judul,
								'abstract' => $abstract,
								'author_user_id' => $this->session->userdata('user_id'),
								'status' => '2',
								'repository_cover_image' => $image_config['upload_path']."/".$gbr_data,
							);
							//--------------------------- MENGAMBIL DATA LAMA DAN MENGHAPUS FILE LAMA -------------------------//
							$old_file_gbr =	$this->input->post('old_file_gbr');
							if($old_file_gbr!='assets/img/noimg.jpg')
							{
								unlink("./".$old_file_gbr);
							}
							//--------------------------- END OF MENGAMBIL DATA LAMA DAN MENGHAPUS FILE LAMA -------------------------//
							$this->dbObject->update_general('repository','id_repository',$param2,$data_repository);
							$this->session->set_flashdata('notif','<div class="alert alert-success"> Repository Telah di edit dan masuk dalam antrian persetujuan </div>');
							redirect('guest/repository/log_acceptance');
						}
						else{
							$data_repository = array(
								'id_repository_category' => $category_repository,
								'id_file_category' => $category_file,
								'title' => $judul,
								'abstract' => $abstract,
								'author_user_id' => $this->session->userdata('user_id'),
								'status' => '2',
								'repository_location' => $file_config['upload_path']."/".$file_data,
								'repository_cover_image' => $image_config['upload_path']."/".$gbr_data,
							);
							chmod($data_repository['repository_location'], 0777);
							//--------------------------- MENGAMBIL DATA LAMA DAN MENGHAPUS FILE LAMA -------------------------//
							$old_file =	$this->input->post('old_file');
							unlink("./".$old_file);
							$old_file_gbr =	$this->input->post('old_file_gbr');
							if($old_file_gbr!='assets/img/noimg.jpg')
							{
								unlink("./".$old_file_gbr);
							}
							//--------------------------- END OF MENGAMBIL DATA LAMA DAN MENGHAPUS FILE LAMA -------------------------//
							$this->dbObject->update_general('repository','id_repository',$param2,$data_repository);
							$this->session->set_flashdata('notif','<div class="alert alert-success"> Repository Telah di edit dan masuk dalam antrian persetujuan </div>');
							redirect('guest/repository/log_acceptance');
						}
			}
			$this->session->set_userdata('submenu','repository');
      $data['title']='Repository Fasilkom-TI';
			$data['repository']=$this->dbObject->get_repository_log_acceptance_by_id('repository',$param1,$this->user_id);
			$data['kategori_repository']=$this->dbObject->get_general_by_id('repository_category','status',1);
			$data['kategori_file_repository']=$this->dbObject->get_general_by_id('file_category','status',1);
			$this->load->view('guest/templates/header',$data);
      $this->load->view('guest/templates/navbar');
      $this->load->view('guest/templates/sidebar');
      $this->load->view('guest/repository/edit',$data);
      $this->load->view('guest/templates/footer');
    }

		public function not_accepted()
		{
			$this->session->set_userdata('submenu','not_accepted');
			$data['title']='Repository Fasilkom-TI';
			$data['repository']=$this->dbObject->get_repository('repository',$this->user_id,3);
			$this->load->view('guest/templates/header',$data);
			$this->load->view('guest/templates/navbar');
			$this->load->view('guest/templates/sidebar');
			$this->load->view('guest/repository/not_accepted',$data);
			$this->load->view('guest/templates/footer');
		}

		public function log_acceptance($param1='',$param2='')
		{
			if($param1=='delete')
			{
				$this->dbObject->delete_general('repository','id_repository',$param2);
				$this->session->set_flashdata('notif','<div class="alert alert-success"> Data repository berhasil dihapus </div>');
				redirect('guest/repository/log_acceptance');
			}
			$this->session->set_userdata('submenu','log_acceptance');
			$data['title']='Repository Fasilkom-TI';
			$data['repository']=$this->dbObject->get_repository_log_acceptance('repository',$this->user_id);
			$this->load->view('guest/templates/header',$data);
			$this->load->view('guest/templates/navbar');
			$this->load->view('guest/templates/sidebar');
			$this->load->view('guest/repository/log_acceptance',$data);
			$this->load->view('guest/templates/footer');
		}

		public function detail($id)
		{
			$this->session->set_userdata('submenu','log_acceptance');
			$data['title']='Repository Fasilkom-TI';
			$data['repository']=$this->dbObject->get_repository_by_id('repository',$id);
			$this->load->view('guest/templates/header',$data);
			$this->load->view('guest/templates/navbar');
			$this->load->view('guest/templates/sidebar');
			$this->load->view('guest/repository/detail',$data);
			$this->load->view('guest/templates/footer');
		}

		public function create_category($param1='')
		{
				$category_repository = $this->input->post('addCategory');
				$data = array(
					'nama_repository_category' => $category_repository,
					'status' => '1',
					'created_by' => $this->session->userdata('user_id')
				);
				$this->dbObject->create_general('repository_category',$data);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Kategori Berhasil dibuat</div>');
				if($param1!=''){
					redirect('guest/repository/edit/'.$param1);
				}else {
					redirect('guest/repository/create');
				}
		}

  }
?>
