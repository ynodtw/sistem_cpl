<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_nilai');
	}

	public function index()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];

		$mk_smt = @$_GET['mk_smt'];
		$mk_kd = @$_GET['mk_kd'];
		$mk_nama = @$_GET['mk_nama'];
		$mhs_nim = @$_GET['mhs_nim'];
		$mhs_nama = @$_GET['mhs_nama'];
		$n_tugas = @$_GET['n_tugas'];
		$n_uts = @$_GET['n_uts'];
		$n_uas = @$_GET['n_uas'];
		$n_akumulasi = @$_GET['n_akumulasi'];


		if ($mk_smt != "" || $mk_kd != "" || $mk_nama != "" || $mhs_nim != "" || $mhs_nama != "" || $n_tugas != "" || $n_uts != "" || $n_uas != "" || $n_akumulasi != "") {
			$data['nilai'] = $this->Model_nilai->getSearch($mk_smt, $mk_kd, $mk_nama, $mhs_nim, $mhs_nama, $n_tugas, $n_uts, $n_uas, $n_akumulasi);
		} else {
			$data['nilai'] = $this->Model_nilai->getData();
		}

		$data['page'] = "admin/nilai/index";
		$data['title'] = "Data nilai";
		$this->load->view('admin/template', $data);
	}
}
