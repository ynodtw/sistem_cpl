<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_matakuliah');
	}

	public function index()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];

		$mk_smt = @$_GET['mk_smt'];
		$mk_kd = @$_GET['mk_kd'];
		$mk_nama = @$_GET['mk_nama'];
		$mk_sks = @$_GET['mk_sks'];
		$mk_prasyarat = @$_GET['mk_prasyarat'];
		$mk_keterangan = @$_GET['mk_keterangan'];
		$mk_bobot_absen = @$_GET['mk_bobot_absen'];
		$mk_bobot_tugas = @$_GET['mk_bobot_tugas'];
		$mk_bobot_uts = @$_GET['mk_bobot_uts'];
		$mk_bobot_uas = @$_GET['mk_bobot_uas'];


		if ($mk_smt != "" || $mk_kd != "" || $mk_nama != "" || $mk_sks != "" || $mk_prasyarat != "" || $mk_keterangan != "" || $mk_bobot_absen != "" || $mk_bobot_tugas != "" || $mk_bobot_uts != "" || $mk_bobot_uas != "") {
			$data['matakuliah'] = $this->Model_matakuliah->getSearch($mk_smt, $mk_kd, $mk_nama, $mk_sks, $mk_prasyarat, $mk_keterangan);
		} else {
			$data['matakuliah'] = $this->Model_matakuliah->getData();
		}


		$data['page'] = "admin/matakuliah/index";
		$data['title'] = "Data Matakuliah";
		$this->load->view('admin/template', $data);
	}

	public function add()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['page'] = "admin/matakuliah/add";
		$data['title'] = "Tambah Data matakuliah";
		// $data['matakuliah'] = $this->Model_matakuliah->getData();
		// echo '<pre>';
		// print_r($data['matakuliah']);
		// die;

		$this->load->view('admin/template', $data);
	}

	public function insert()
	{
		$mk_smt = $this->input->post("mk_smt");
		$mk_kd = $this->input->post("mk_kd");
		$mk_nama = $this->input->post("mk_nama");
		$mk_sks = $this->input->post("mk_sks");
		$mk_prasyarat = $this->input->post("mk_prasyarat");
		$mk_keterangan = $this->input->post("mk_keterangan");
		$bobot_absen = $this->input->post("bobot_absen");
		$bobot_tugas = $this->input->post("bobot_tugas");
		$bobot_uts = $this->input->post("bobot_uts");
		$bobot_uas = $this->input->post("bobot_uas");

		$cek_mk_kd = $this->Model_matakuliah->checkKdMk($mk_kd);

		if (!empty($cek_mk_kd)) {
			echo "
			<script>
					alert('Kode Matakuliah Sudah Terdaftar!')
					history.back()
			</script>
			";
			return false;
		}

		$data_insert = [
			"mk_smt" => $mk_smt,
			"mk_kd" => $mk_kd,
			"mk_nama" => $mk_nama,
			"mk_sks" => $mk_sks,
			"mk_prasyarat" => $mk_prasyarat,
			"mk_keterangan" => $mk_keterangan,
			"bobot_absen" => $bobot_absen,
			"bobot_tugas" => $bobot_tugas,
			"bobot_uts" => $bobot_uts,
			"bobot_uas" => $bobot_uas
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_matakuliah->insert($data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Insert Data');
			redirect(base_url("/data-matakuliah"));
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
		$data['matakuliah'] = $this->Model_matakuliah->getData($id)[0];
		$data['page'] = "admin/matakuliah/edit";
		$data['title'] = "Data Matakuliah";
		$this->load->view('admin/template', $data);
	}

	public function update()
	{
		$id = $this->input->post("id");
		$mk_smt = $this->input->post("mk_smt");
		$mk_kd = $this->input->post("mk_kd");
		$mk_nama = $this->input->post("mk_nama");
		$mk_sks = $this->input->post("mk_sks");
		$mk_prasyarat = $this->input->post("mk_prasyarat");
		$mk_keterangan = $this->input->post("mk_keterangan");
		$mk_bobot_absen = $this->input->post("mk_bobot_absen");
		$mk_bobot_tugas = $this->input->post("mk_bobot_tugas");
		$mk_bobot_uts = $this->input->post("mk_bobot_uts");
		$mk_bobot_uas = $this->input->post("mk_bobot_uas");


		$data_insert = [
			"mk_smt" => $mk_smt,
			"mk_kd" => $mk_kd,
			"mk_nama" => $mk_nama,
			"mk_sks" => $mk_sks,
			"mk_prasyarat" => $mk_prasyarat,
			"mk_keterangan" => $mk_keterangan,
			"mk_bobot_absen" => $mk_bobot_absen,
			"mk_bobot_tugas" => $mk_bobot_tugas,
			"mk_bobot_uts" => $mk_bobot_uts,
			"mk_bobot_uas" => $mk_bobot_uas
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_matakuliah->update($id, $data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Update Data');
			redirect(base_url("/data-matakuliah"));
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
		$this->Model_matakuliah->delete($id);

		$this->session->set_flashdata('msg', 'Sukses Hapus Data');
		redirect(base_url("/data-matakuliah"));
	}
}
