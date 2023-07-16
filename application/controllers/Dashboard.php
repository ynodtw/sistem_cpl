<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');

		if (!$this->session->has_userdata('data_login')) {
			redirect("/login");
		}
	}

	public function index()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['page'] = "admin/dashboard/index";
		$data['title'] = "Dashboard";
		$this->load->view('admin/template', $data);
	}
}
