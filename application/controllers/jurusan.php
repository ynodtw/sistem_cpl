<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_jurusan');
	}

	public function index()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];

		$jrs_kd = @$_GET['jrs_kd'];
		$jrs_nama = @$_GET['jrs_nama'];
		$jrs_fakultas = @$_GET['jrs_fakultas'];

		if ($jrs_kd != "" || $jrs_nama != "" || $jrs_fakultas != "") {
			$data['jurusan'] = $this->Model_jurusan->getSearch($jrs_kd, $jrs_nama, $jrs_fakultas);
		} else {
			$data['jurusan'] = $this->Model_jurusan->getData();
		}


		$data['page'] = "admin/jurusan/index";
		$data['title'] = "Data Fakultas";
		$this->load->view('admin/template', $data);
	}

	public function add()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['page'] = "admin/jurusan/add";
		$data['title'] = "Tambah Data jurusan";
		$this->load->view('admin/template', $data);
	}

	public function insert()
	{
		$jrs_kd = $this->input->post("jrs_kd");
		$jrs_nama = $this->input->post("jrs_nama");
		$jrs_fakultas = $this->input->post("jrs_fakultas");

		$cek_jrs_kd = $this->Model_jurusan->checkKdJurusan($jrs_kd);

		if (!empty($cek_jrs_kd)) {
			echo "
			<script>
					alert('Kode Jurusan Sudah Terdaftar!')
					history.back()
			</script>
			";
			return false;
		}

		$data_insert = [
			"jrs_kd" => $jrs_kd,
			"jrs_nama" => $jrs_nama,
			"jrs_fakultas" => $jrs_fakultas,
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_jurusan->insert($data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Insert Data');
			redirect(base_url("/data-jurusan"));
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
		$data['jurusan'] = $this->Model_jurusan->getData($id)[0];
		$data['page'] = "admin/jurusan/edit";
		$data['title'] = "Data jurusan";
		$this->load->view('admin/template', $data);
	}

	public function update()
	{
		$id = $this->input->post("id");
		$jrs_kd = $this->input->post("jrs_kd");
		$jrs_nama = $this->input->post("jrs_nama");
		$jrs_fakultas = $this->input->post("jrs_fakultas");

		$data_insert = [
			"jrs_kd" => $jrs_kd,
			"jrs_nama" => $jrs_nama,
			"jrs_fakultas" => $jrs_fakultas
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_jurusan->update($id, $data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Update Data');
			redirect(base_url("/data-jurusan"));
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
		$this->Model_jurusan->delete($id);

		$this->session->set_flashdata('msg', 'Sukses Hapus Data');
		redirect(base_url("/data-jurusan"));
	}
}
