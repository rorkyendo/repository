<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
    {
			parent::__construct();
			$this->load->model('repository/page_model','dbObject');
			$this->load->library('pagination');
    }

  public function index()
  {
	    $data['title']='Repository';
      $this->load->view('repository/templates/header',$data);
     	$this->load->view('repository/templates/navbar');
      $this->load->view('repository/templates/sidebar');
			$config = array();
			$config["base_url"] = base_url() . "repository/page/index";
			$total_row = $this->dbObject->get_rows_repository();
			$config["total_rows"] = $total_row;
			$config['use_page_numbers'] = TRUE;
			$config["per_page"] = 5;
			$config["uri_segment"] = 4;
			$config['first_link']       = 'First';
    	$config['last_link']        = 'Last';
      $config['next_link']        = 'Next';
      $config['prev_link']        = 'Prev';
      $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
      $config['full_tag_close']   = '</ul></nav></div>';
      $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
      $config['num_tag_close']    = '</span></li>';
      $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
      $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
      $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
      $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['prev_tagl_close']  = '</span>Next</li>';
      $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
      $config['first_tagl_close'] = '</span></li>';
      $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['last_tagl_close']  = '</span></li>';
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data["repository"] = $this->dbObject->data_repository($config["per_page"], $data['page']);
			$data["links"] = $this->pagination->create_links();
			$this->session->set_userdata('search',false);
			$this->load->view('repository/home/index',$data);
     	$this->load->view('repository/templates/footer');
  }

	public function search()
	{
			$title = $this->input->get('title');
			$author = $this->input->get('author');
			$category = $this->input->get('category');
			$data['title']='Repository';
			$this->load->view('repository/templates/header',$data);
			$this->load->view('repository/templates/navbar');
			$this->load->view('repository/templates/sidebar');
			$config = array();
			$config["base_url"] = base_url() . "repository/page/search?title=".$title."&author=".$author."&category=".$category;
			$total_row = $this->dbObject->get_rows_repository_by_keyword($title,$author,$category);
			$config["total_rows"] = $total_row;
			$config['use_page_numbers'] = TRUE;
			$config["per_page"] = 5;
			$config["uri_segment"] = 5;
			$config['first_link']       = 'First';
			$config['last_link']        = 'Last';
			$config['next_link']        = 'Next';
			$config['prev_link']        = 'Prev';
			$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
			$this->pagination->initialize($config);
			$this->session->set_userdata('search',true);
			$data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$data["repository"] = $this->dbObject->data_repository_by_keyword($config["per_page"], $data['page'],$title,$author,$category);
			$data["links"] = $this->pagination->create_links();
			$this->load->view('repository/home/index',$data);
			$this->load->view('repository/templates/footer');
	}

  public function login()
  {
      $data['title']='Repository';
      $this->load->view('repository/templates/header',$data);
      $this->load->view('repository/templates/navbar');
      $this->load->view('repository/templates/sidebar');
      $this->load->view('repository/login/index');
      $this->load->view('repository/templates/footer');
  }

  public function publish()
  {
      $data['title']='Repository';
      $this->load->view('repository/templates/header',$data);
      $this->load->view('repository/templates/navbar');
      $this->load->view('repository/templates/sidebar');
      $this->load->view('repository/templates/footer');
  }

  public function about()
  {
      $data['title']='Repository';
      $this->load->view('repository/templates/header',$data);
      $this->load->view('repository/templates/navbar');
      $this->load->view('repository/templates/sidebar');
      $this->load->view('repository/home/about');
      $this->load->view('repository/templates/footer');
  }

  public function faq()
  {
      $data['title']='Repository';
      $this->load->view('repository/templates/header',$data);
      $this->load->view('repository/templates/navbar');
      $this->load->view('repository/templates/sidebar');
      $this->load->view('repository/home/faq');
      $this->load->view('repository/templates/footer');
  }

	public function register()
	{
			$data['title']='Repository';
			$this->load->view('repository/templates/header',$data);
			$this->load->view('repository/templates/navbar');
			$this->load->view('repository/templates/sidebar');
			$this->load->view('repository/register/index');
			$this->load->view('repository/templates/footer');
	}

	public function detail($id)
  {
      $data['title']='Repository';
			$data['repository']=$this->dbObject->get_repository_by_id('repository',$id);
      $this->load->view('repository/templates/header',$data);
      $this->load->view('repository/templates/navbar');
      $this->load->view('repository/templates/sidebar');
      $this->load->view('repository/detail/index',$data);
      $this->load->view('repository/templates/footer');
  }

}
?>
