<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_kelas');
		$this->load->model('Model_prodi');
		$this->load->model('Model_dosen');
		$this->load->model('Model_matakuliah');
		if (!$this->session->has_userdata('data_login')) {
			redirect("/login");
		}
	}

	public function index()
	{
		$data['kelas'] = $this->Model_kelas->getData();

		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['page'] = "admin/kelas/index";
		$data['title'] = "Data kelas";

		// echo '<pre>';
		// print_r($data);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function daftar()
	{
		$data['kelas'] = $this->Model_kelas->getData();

		if ($_SESSION['data_login']['role'] == "kelas") {
			$cek_nim_mhs = $this->Model_kelas->checkNIM($_SESSION['data_login']['username']);
			@$data['kelas'] = $this->Model_kelas->getData($cek_nim_mhs[0]['id']);
		}

		if ($_SESSION['data_login']['role'] == "prodi" || $_SESSION['data_login']['role'] == "dosen") {
			$data_dosen = $this->Model_dosen->checkNID($_SESSION['data_login']['username'])[0];
			$dosen_fk_id = $data_dosen['fk_id'];
			$dosen_prd_id = $data_dosen['prd_id'];
			$data['dosen_fk_id'] = $dosen_fk_id;
			$data['dosen_prd_id'] = $dosen_prd_id;
			// $data['kelas'] = $this->Model_kelas->getDataByProdi($dosen_prd_id);
		}

		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['page'] = "admin/kelas/daftar";
		$data['title'] = "Data kelas";

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
		$data['page'] = "admin/kelas/add";
		$data['title'] = "Tambah Data kelas";
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

		$cek_nim = $this->Model_kelas->checkNIM($mhs_nim);

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

		$insert = $this->Model_kelas->insert($data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Insert Data');
			redirect(base_url("/data-kelas"));
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
		$data['kelas'] = $this->Model_kelas->getDataById($id)[0];
		$data['fakultas'] = $this->Model_prodi->getDataFakultas();
		$data['prodi'] = $this->Model_prodi->getData();
		$data['dosen'] = $this->Model_dosen->getData();
		$data['page'] = "admin/kelas/edit";
		$data['title'] = "Data kelas";

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

		$insert = $this->Model_kelas->update($id, $data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Update Data');
			redirect(base_url("/data-kelas"));
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
		$this->Model_kelas->delete($id);

		$this->session->set_flashdata('msg', 'Sukses Hapus Data');
		redirect(base_url("/data-kelas"));
	}
}
