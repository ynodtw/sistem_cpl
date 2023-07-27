<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_mahasiswa');
		$this->load->model('Model_prodi');
		$this->load->model('Model_dosen');
		if (!$this->session->has_userdata('data_login')) {
			redirect("/login");
		}
	}

	public function index()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];

		$mhs_nim = @$_GET['mhs_nim'];
		$mhs_nama = @$_GET['mhs_nama'];
		$fk_id = @$_GET['fk_id'];
		$prd_id = @$_GET['prd_id'];
		$mhs_status = @$_GET['mhs_status'];



		if ($mhs_nim != "" || $mhs_nama != "" || $fk_id != "" || $prd_id != "" || $mhs_status != "") {
			$data['mahasiswa'] = $this->Model_mahasiswa->getSearch($mhs_nim, $mhs_nama, $fk_id, $prd_id, $mhs_status);
		} else {
			$data['mahasiswa'] = $this->Model_mahasiswa->getData();

			if ($_SESSION['data_login']['role'] == "mahasiswa") {
				$cek_nim_mhs = $this->Model_mahasiswa->checkNIM($_SESSION['data_login']['username']);
				$data['mahasiswa'] = $this->Model_mahasiswa->getData($cek_nim_mhs[0]['id']);
			}
		}


		$data['page'] = "admin/mahasiswa/index";
		$data['title'] = "Data Mahasiswa";
		$this->load->view('admin/template', $data);
	}

	public function add()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['fakultas'] = $this->Model_prodi->getDataFakultas();
		$data['prodi'] = $this->Model_prodi->getData();
		$data['dosen'] = $this->Model_dosen->getData();
		$data['page'] = "admin/mahasiswa/add";
		$data['title'] = "Tambah Data mahasiswa";
		$this->load->view('admin/template', $data);
	}

	public function insert()
	{
		$mhs_nim = $this->input->post("mhs_nim");
		$mhs_nama = $this->input->post("mhs_nama");
		$fk_id = $this->input->post("fk_id");
		$prd_id = $this->input->post("prd_id");
		$dsn_id = $this->input->post("dsn_id");
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
			"fk_id" => $fk_id,
			"prd_id" => $prd_id,
			"dsn_id" => $dsn_id,
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
		$data['mahasiswa'] = $this->Model_mahasiswa->getDataById($id)[0];
		$data['fakultas'] = $this->Model_prodi->getDataFakultas();
		$data['prodi'] = $this->Model_prodi->getData();
		$data['dosen'] = $this->Model_dosen->getData();
		$data['page'] = "admin/mahasiswa/edit";
		$data['title'] = "Data mahasiswa";
		// echo '<pre>';
		// print_r($data);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function update()
	{
		$id = $this->input->post("id");
		$mhs_nim = $this->input->post("mhs_nim");
		$mhs_nama = $this->input->post("mhs_nama");
		$fk_id = $this->input->post("fk_id");
		$prd_id = $this->input->post("prd_id");
		$dsn_id = $this->input->post("dsn_id");
		$mhs_status = $this->input->post("mhs_status");


		$data_insert = [
			"mhs_nim" => $mhs_nim,
			"mhs_nama" => $mhs_nama,
			"fk_id" => $fk_id,
			"prd_id" => $prd_id,
			"dsn_id" => $dsn_id,
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
