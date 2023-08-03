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
		$data['mahasiswa'] = $this->Model_mahasiswa->getData();

		if ($_SESSION['data_login']['role'] == "mahasiswa") {
			$cek_nim_mhs = $this->Model_mahasiswa->checkNIM($_SESSION['data_login']['username']);
			@$data['mahasiswa'] = $this->Model_mahasiswa->getData($cek_nim_mhs[0]['id']);
		}

		if ($_SESSION['data_login']['role'] == "prodi" || $_SESSION['data_login']['role'] == "dosen") {
			$data_dosen = $this->Model_dosen->checkNID($_SESSION['data_login']['username'])[0];
			$dosen_fk_id = $data_dosen['fk_id'];
			$dosen_prd_id = $data_dosen['prd_id'];
			$data['dosen_fk_id'] = $dosen_fk_id;
			$data['dosen_prd_id'] = $dosen_prd_id;
			$data['mahasiswa'] = $this->Model_mahasiswa->getDataByJurusan($dosen_fk_id);
		}

		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['page'] = "admin/mahasiswa/index";
		$data['title'] = "Data Mahasiswa Jurusan";

		// echo '<pre>';
		// print_r($data);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function daftar()
	{
		$data['mahasiswa'] = $this->Model_mahasiswa->getData();

		if ($_SESSION['data_login']['role'] == "mahasiswa") {
			$cek_nim_mhs = $this->Model_mahasiswa->checkNIM($_SESSION['data_login']['username']);
			@$data['mahasiswa'] = $this->Model_mahasiswa->getData($cek_nim_mhs[0]['id']);
		}

		if ($_SESSION['data_login']['role'] == "prodi" || $_SESSION['data_login']['role'] == "dosen") {
			$data_dosen = $this->Model_dosen->checkNID($_SESSION['data_login']['username'])[0];
			$dosen_fk_id = $data_dosen['fk_id'];
			$dosen_prd_id = $data_dosen['prd_id'];
			$data['dosen_fk_id'] = $dosen_fk_id;
			$data['dosen_prd_id'] = $dosen_prd_id;
			// $data['mahasiswa'] = $this->Model_mahasiswa->getDataByProdi($dosen_prd_id);
		}

		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['page'] = "admin/mahasiswa/daftar";
		$data['title'] = "Data Mahasiswa";

		// echo '<pre>';
		// print_r($data);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function add()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['fakultas'] = $this->Model_prodi->getDataFakultas();
		$data['prodi'] = $this->Model_prodi->getData();

		if ($_SESSION['data_login']['role'] == "prodi" || $_SESSION['data_login']['role'] == "dosen") {
			$data_dosen = $this->Model_dosen->checkNID($_SESSION['data_login']['username'])[0];
			$dosen_fk_id = $data_dosen['fk_id'];
			$dosen_prd_id = $data_dosen['prd_id'];
			$data['dosen_fk_id'] = $dosen_fk_id;
			$data['dosen_prd_id'] = $dosen_prd_id;
		}

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
		$data['title'] = "Data Mahasiswa";

		if ($_SESSION['data_login']['role'] == "prodi" || $_SESSION['data_login']['role'] == "dosen") {
			$data_dosen = $this->Model_dosen->checkNID($_SESSION['data_login']['username'])[0];
			$dosen_fk_id = $data_dosen['fk_id'];
			$dosen_prd_id = $data_dosen['prd_id'];
			$data['dosen_fk_id'] = $dosen_fk_id;
			$data['dosen_prd_id'] = $dosen_prd_id;
		}

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
