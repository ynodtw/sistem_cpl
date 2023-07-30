<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_mahasiswa');
		$this->load->model('Model_cpl');

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
			return $this->mahasiswa();
		}

		$this->load->view('admin/template', $data);
	}

	function mahasiswa()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['title'] = "Dashboard";

		$cpl = $this->Model_mahasiswa->getChartCpl($_SESSION['data_login']['username']);
		$cpl_tot = $this->Model_cpl->getCplTot();

		$arr_cpl = [];
		foreach ($cpl as $v) {
			$arr_cpl[$v['cpl_kategori']] = [
				'cpl_kategori' => $v['cpl_kategori'],
				'cpl_ambil' => $v['cpl_ambil'],
			];
		}

		$arr_cpl_tot = [];
		foreach ($cpl_tot as $ct) {
			$arr_cpl_tot[str_replace(" ", "-", $arr_cpl[$ct['cpl_kategori']]['cpl_kategori'])]['cpl_kategori'] = $arr_cpl[$ct['cpl_kategori']]['cpl_kategori'];
			$arr_cpl_tot[str_replace(" ", "-", $arr_cpl[$ct['cpl_kategori']]['cpl_kategori'])]['cpl_id'] = str_replace(" ", "-", $arr_cpl[$ct['cpl_kategori']]['cpl_kategori']);
			$arr_cpl_tot[str_replace(" ", "-", $arr_cpl[$ct['cpl_kategori']]['cpl_kategori'])]['cpl_ambil'] = $arr_cpl[$ct['cpl_kategori']]['cpl_ambil'];
			$arr_cpl_tot[str_replace(" ", "-", $arr_cpl[$ct['cpl_kategori']]['cpl_kategori'])]['cpl_belom'] = $ct['cpl_tot'] - $arr_cpl[$ct['cpl_kategori']]['cpl_ambil'];
		}

		$cpl = $this->Model_mahasiswa->getChartCpl($_SESSION['data_login']['username']);
		$sks = $this->Model_mahasiswa->getChartSks($_SESSION['data_login']['username'])[0];

		$data['cpl'] = $arr_cpl_tot;
		$data['sks'] = $sks;
		$data['page'] = "admin/dashboard/mahasiswa";

		$this->load->view('admin/template', $data);
	}
}
