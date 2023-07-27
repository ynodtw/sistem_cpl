<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_mahasiswa');

		if (!$this->session->has_userdata('data_login')) {
			redirect("/login");
		}
	}

	public function index()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['title'] = "Dashboard";

		$data['page'] = "admin/dashboard/index";
		if ($_SESSION['data_login']['role'] == "mahasiswa") {
			$cpl = $this->Model_mahasiswa->getChartCpl($_SESSION['data_login']['username']);

			$cpl_mhs = [];
			foreach ($cpl as $c) {
				$cpl_mhs[$c['cpl_kategori']][] = $c['cpl_kd'];
			}

			echo "<pre>";
			print_r($cpl_mhs);
			die;
			$data['page'] = "admin/dashboard/mahasiswa";
		}

		$this->load->view('admin/template', $data);
	}
}
