<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpl extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_cpl');
	}

	public function index()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];

		$cpl_kd = @$_GET['cpl_kd'];
		$cpl_kategori = @$_GET['cpl_kategori'];
		$cpl_deskripsi = @$_GET['cpl_deskripsi'];

		if ($cpl_kd != "" || $cpl_kategori != "" || $cpl_deskripsi != "") {
			$data['cpl'] = $this->Model_cpl->getSearch($cpl_kd, $cpl_kategori, $cpl_deskripsi);
		} else {
			$data['cpl'] = $this->Model_cpl->getData();
		}

		// $data['cpl_kd'] = $data['cpl'];
		// echo "<pre>";
		// print_r($data['cpl_kd']);
		// die;

		$data['page'] = "admin/cpl/index";
		$data['title'] = "Data CPL";
		$this->load->view('admin/template', $data);
	}

	public function add()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['page'] = "admin/cpl/add";
		$data['title'] = "Tambah Data CPL";
		$this->load->view('admin/template', $data);
	}

	public function insert()
	{
		$cpl_kd = $this->input->post("cpl_kd");
		$cpl_kategori = $this->input->post("cpl_kategori");
		$cpl_deskripsi = $this->input->post("cpl_deskripsi");

		$cek_cpl = $this->Model_cpl->checkCplKd($cpl_kd);

		if (!empty($cek_cpl)) {
			echo "
			<script>
					alert('CPL Sudah Terdaftar!')
					history.back()
			</script>
			";
			return false;
		}

		$data_insert = [
			"cpl_kd" => $cpl_kd,
			"cpl_kategori" => $cpl_kategori,
			"cpl_deskripsi" => $cpl_deskripsi,
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_cpl->insert($data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Insert Data');
			redirect(base_url("/data-cpl"));
		} else {
			echo "
	          <script>
	              alert('Gagal insert data!')
	              history.back()
	          </script>
	          ";
			return false;
		}
	}

	public function edit($id)
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['cpl'] = $this->Model_cpl->getData($id)[0];
		$data['page'] = "admin/cpl/edit";
		$data['title'] = "Data CPL";
		$this->load->view('admin/template', $data);
	}

	public function update()
	{
		$id = $this->input->post("id");
		$cpl_kd = $this->input->post("cpl_kd");
		$cpl_kategori = $this->input->post("cpl_kategori");
		$cpl_deskripsi = $this->input->post("cpl_deskripsi");


		$data_insert = [
			"cpl_kd" => $cpl_kd,
			"cpl_kategori" => $cpl_kategori,
			"cpl_deskripsi" => $cpl_deskripsi,
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;
		$insert = $this->Model_cpl->update($id, $data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Update Data');
			redirect(base_url("/data-cpl"));
		} else {
			echo "
	          <script>
	              alert('Gagal update data!')
	              history.back()
	          </script>
	          ";
			return false;
		}
	}

	public function delete($id)
	{
		$this->Model_cpl->delete($id);

		$this->session->set_flashdata('msg', 'Sukses Hapus Data');
		redirect(base_url("/data-cpl"));
	}
}
