<?php
//defined('BASEPAHT') or exit('No direct script access Allowed');

class CategoryController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CategoryModel');
	}

	public function index()
	{
		$categore = new CategoryModel;
		$data['data'] = $categore->getAllCategory();
		$this->load->view('includes/header');
		$this->load->view('categorys/index', $data);
		$this->load->view('includes/footer');
	}

	public function create()
	{
		$this->load->view('includes/header');
		$this->load->view('categorys/create');
		$this->load->view('includes/footer');
	}

	public function store()
	{
		$categore = new CategoryModel;
		$categore->createCategory();
		redirect(base_url('categorys'));
	}

	public function edit($id)
	{
		$this->load->model('CategoryModel');
		$categore['data'] = $this->CategoryModel->getCategoryById($id);

		$this->load->view('includes/header');
		$this->load->view('categorys/edit', $categore);
		$this->load->view('includes/footer');
	}

	public function update()
	{
		$categore = new CategoryModel;
		$categore->updateCategory();
		redirect(base_url('categorys'));
	}

	public function delete($id)
	{
		$categore = new CategoryModel;
		$categore->DeleteCategory($id);
		redirect(base_url('categorys'));
	}


	public function storeFile()
	{
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2000;
		$config['max_width'] = 1500;
		$config['max_height'] = 1500;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('profile_image')) {
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('files/upload_form', $error);
		} else {
			$data = array('image_metadata' => $this->upload->data());

			$this->load->view('files/upload_result', $data);
		}
	}
}
