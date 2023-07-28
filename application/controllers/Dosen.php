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
	}

	public function index()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];

		// $dsn_nid = @$_GET['dsn_nid'];
		// $dsn_nama = @$_GET['dsn_nama'];
		// $fk_id = @$_GET['fk_id'];
		// $prd_id = @$_GET['prd_id'];
		// $dsn_status = @$_GET['dsn_status'];

		// if ($dsn_nid != "" || $dsn_nama != "" || $fk_id != "" || $prd_id != "" || $dsn_status != "") {
		// 	$data['dosen'] = $this->Model_dosen->getSearch($dsn_nid, $dsn_nama, $fk_id, $prd_id, $dsn_status);
		// } else {
		// 	$data['dosen'] = $this->Model_dosen->getData();
		// }
		$data['dosen'] = $this->Model_dosen->getData();

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
