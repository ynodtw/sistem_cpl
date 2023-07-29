<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodata extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_biodata');
		$this->load->model('Model_users');
		if (!$this->session->has_userdata('data_login')) {
			redirect("/login");
		}
	}

	public function index($users_id)
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['biodata'] = $this->Model_biodata->getData($users_id)[0];
		$data['page'] = "admin/biodata/index";
		$data['title'] = "Biodata";
		// echo '<pre>';
		// print_r($data);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function add()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['page'] = "admin/biodata/add";
		$data['title'] = "Tambah Data biodata";
		$this->load->view('admin/template', $data);
	}

	public function insert()
	{
		$biodata_kd = $this->input->post("biodata_kd");
		$biodata_kategori = $this->input->post("biodata_kategori");
		$biodata_deskripsi = $this->input->post("biodata_deskripsi");

		$cek_biodata = $this->Model_biodata->checkbiodataKd($biodata_kd);

		if (!empty($cek_biodata)) {
			echo "
			<script>
					alert('biodata Sudah Terdaftar!')
					history.back()
			</script>
			";
			return false;
		}

		$data_insert = [
			"biodata_kd" => $biodata_kd,
			"biodata_kategori" => $biodata_kategori,
			"biodata_deskripsi" => $biodata_deskripsi,
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_biodata->insert($data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Insert Data');
			redirect(base_url("/data-biodata"));
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
		$data['biodata'] = $this->Model_biodata->getData($id)[0];
		$data['page'] = "admin/biodata/edit";
		$data['title'] = "Data biodata";
		$this->load->view('admin/template', $data);
	}

	public function update()
	{
		$id = $this->input->post("id");
		$biodata_kd = $this->input->post("biodata_kd");
		$biodata_kategori = $this->input->post("biodata_kategori");
		$biodata_deskripsi = $this->input->post("biodata_deskripsi");


		$data_insert = [
			"biodata_kd" => $biodata_kd,
			"biodata_kategori" => $biodata_kategori,
			"biodata_deskripsi" => $biodata_deskripsi,
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;
		$insert = $this->Model_biodata->update($id, $data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Update Data');
			redirect(base_url("/data-biodata"));
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
		$this->Model_biodata->delete($id);

		$this->session->set_flashdata('msg', 'Sukses Hapus Data');
		redirect(base_url("/data-biodata"));
	}
}
