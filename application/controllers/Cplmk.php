<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cplmk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_cplmk');
		$this->load->model('Model_matakuliah');
		$this->load->model('Model_cpl');
	}

	public function index()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];

		$mk_smt = @$_GET['mk_smt'];
		$mk_kd = @$_GET['mk_kd'];
		$mk_nama = @$_GET['mk_nama'];
		$cpl_kd = @$_GET['cpl_kd'];
		$cpl_kategori = @$_GET['cpl_kategori'];
		$cpl_deskripsi = @$_GET['cpl_deskripsi'];


		// if ($mk_smt != "" || $mk_kd != "" || $mk_nama != "" || $cpl_kd != "" || $cpl_kategori != "" || $cpl_deskripsi != "" || $n_uts != "" || $n_uas != "" || $n_akumulasi != "") {
		// 	$data['cplmk'] = $this->Model_cplmk->getSearch($mk_smt, $mk_kd, $mk_nama, $cpl_kd, $cpl_kategori, $cpl_deskripsi, $n_uts, $n_uas, $n_akumulasi);
		// } else {
		// 	$data['cplmk'] = $this->Model_cplmk->getData();
		// }

		$data['cplmk'] = $this->Model_cplmk->getData();
		$data['cpl'] = $this->Model_cpl->getData();
		// $data['id_mk'] = $id_mk;
		// echo '<pre>';
		// print_r($data['cpl']);
		// die;

		$data['page'] = "admin/cplmk/index";
		$data['title'] = "Data cplmk";
		$this->load->view('admin/template', $data);
	}
}
