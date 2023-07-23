<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_mahasiswa');
	}

	public function index()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];

		$mhs_nim = @$_GET['mhs_nim'];
		$mhs_nama = @$_GET['mhs_nama'];
		$mhs_fakultas = @$_GET['mhs_fakultas'];
		$mhs_jurusan = @$_GET['mhs_jurusan'];
		$mhs_status = @$_GET['mhs_status'];

		if ($mhs_nim != "" || $mhs_nama != "" || $mhs_fakultas != "" || $mhs_jurusan != "" || $mhs_status != "") {
			$data['mahasiswa'] = $this->Model_mahasiswa->getSearch($mhs_nim, $mhs_nama, $mhs_fakultas, $mhs_jurusan, $mhs_status);
		} else {
			$data['mahasiswa'] = $this->Model_mahasiswa->getData();
		}


		$data['page'] = "admin/mahasiswa/index";
		$data['title'] = "Data Mahasiswa";
		$this->load->view('admin/template', $data);
	}

	public function add()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['page'] = "admin/mahasiswa/add";
		$data['title'] = "Tambah Data mahasiswa";
		$this->load->view('admin/template', $data);
	}

	public function insert()
	{
		$mhs_nim = $this->input->post("mhs_nim");
		$mhs_nama = $this->input->post("mhs_nama");
		$mhs_fakultas = $this->input->post("mhs_fakultas");
		$mhs_jurusan = $this->input->post("mhs_jurusan");
		$mhs_status = $this->input->post("mhs_status");

		$cek_nim = $this->Model_mahasiswa->checkNIM($mhs_nim);

		if (!empty($cek_nim)) {
			echo "
			<script>
					alert('NIM Sudah Terdaftar!')
					history.back()
			</script>
			";
			return false;
		}

		$data_insert = [
			"mhs_nim" => $mhs_nim,
			"mhs_nama" => $mhs_nama,
			"mhs_fakultas" => $mhs_fakultas,
			"mhs_jurusan" => $mhs_jurusan,
			"mhs_status" => $mhs_status
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_mahasiswa->insert($data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Insert Data');
			redirect(base_url("/data-mahasiswa"));
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
		$data['mahasiswa'] = $this->Model_mahasiswa->getData($id)[0];
		$data['page'] = "admin/mahasiswa/edit";
		$data['title'] = "Data mahasiswa";
		$this->load->view('admin/template', $data);
	}

	public function update()
	{
		$id = $this->input->post("id");
		$mhs_nim = $this->input->post("mhs_nim");
		$mhs_nama = $this->input->post("mhs_nama");
		$mhs_fakultas = $this->input->post("mhs_fakultas");
		$mhs_jurusan = $this->input->post("mhs_jurusan");
		$mhs_status = $this->input->post("mhs_status");


		$data_insert = [
			"mhs_nim" => $mhs_nim,
			"mhs_nama" => $mhs_nama,
			"mhs_fakultas" => $mhs_fakultas,
			"mhs_jurusan" => $mhs_jurusan,
			"mhs_status" => $mhs_status
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_mahasiswa->update($id, $data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Update Data');
			redirect(base_url("/data-mahasiswa"));
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
		$this->Model_mahasiswa->delete($id);

		$this->session->set_flashdata('msg', 'Sukses Hapus Data');
		redirect(base_url("/data-mahasiswa"));
	}
}
