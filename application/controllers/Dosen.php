<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_dosen');
		$this->load->model('Model_prodi');
		if (!$this->session->has_userdata('data_login')) {
			redirect("/login");
		}
	}

	public function index()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['dosen'] = $this->Model_dosen->getData();

		if ($_SESSION['data_login']['role'] == "prodi") {
			$data_dosen = $this->Model_dosen->checkNID($_SESSION['data_login']['username'])[0];
			$dosen_fk_id = $data_dosen['fk_id'];
			$dosen_prd_id = $data_dosen['prd_id'];
			$data['dosen'] = $this->Model_dosen->getDataByJurusan($dosen_fk_id);
		}

		$data['page'] = "admin/dosen/index";
		$data['title'] = "Data Dosen";

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
		$data['page'] = "admin/dosen/add";
		$data['title'] = "Tambah Data dosen";
		// echo '<pre>';
		// print_r($data);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function insert()
	{
		$dsn_nid = $this->input->post("dsn_nid");
		$dsn_nama = $this->input->post("dsn_nama");
		$fk_id = $this->input->post("fk_id");
		$prd_id = $this->input->post("prd_id");
		$dsn_status = $this->input->post("dsn_status");

		$cek_nid = $this->Model_dosen->checkNID($dsn_nid);

		if (!empty($cek_nid)) {
			echo "
			<script>
					alert('NID Sudah Terdaftar!')
					history.back()
			</script>
			";
			return false;
		}

		$data_insert = [
			"dsn_nid" => $dsn_nid,
			"dsn_nama" => $dsn_nama,
			"fk_id" => $fk_id,
			"prd_id" => $prd_id,
			"dsn_status" => $dsn_status
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_dosen->insert($data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Insert Data');
			redirect(base_url("/data-dosen"));
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
		$data['dosen'] = $this->Model_dosen->getDataById($id)[0];
		$data['fakultas'] = $this->Model_prodi->getDataFakultas();
		$data['prodi'] = $this->Model_prodi->getData();
		$data['page'] = "admin/dosen/edit";
		$data['title'] = "Data Dosen";
		// echo '<pre>';
		// print_r($data);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function update()
	{
		$id = $this->input->post("id");
		$dsn_nid = $this->input->post("dsn_nid");
		$dsn_nama = $this->input->post("dsn_nama");
		$fk_id = $this->input->post("fk_id");
		$prd_id = $this->input->post("prd_id");
		$dsn_status = $this->input->post("dsn_status");


		$data_insert = [
			"dsn_nid" => $dsn_nid,
			"dsn_nama" => $dsn_nama,
			"fk_id" => $fk_id,
			"prd_id" => $prd_id,
			"dsn_status" => $dsn_status
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_dosen->update($id, $data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Update Data');
			redirect(base_url("/data-dosen"));
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
		$this->Model_dosen->delete($id);

		$this->session->set_flashdata('msg', 'Sukses Hapus Data');
		redirect(base_url("/data-dosen"));
	}
}
