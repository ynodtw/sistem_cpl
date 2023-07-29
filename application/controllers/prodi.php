<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_prodi');
		$this->load->model('Model_dosen');
		if (!$this->session->has_userdata('data_login')) {
			redirect("/login");
		}
	}

	public function index()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];

		// $prd_kd = @$_GET['prd_kd'];
		// $prd_jurusan = @$_GET['prd_jurusan'];
		// $dsn_id = @$_GET['dsn_id'];
		// $fk_id = @$_GET['fk_id'];

		// if ($prd_kd != "" || $prd_jurusan != ""  || $dsn_id != "" || $fk_id != "") {
		// 	$data['prodi'] = $this->Model_prodi->getSearch($prd_kd, $prd_jurusan, $dsn_id, $fk_id);
		// } else {
		// 	$data['prodi'] = $this->Model_prodi->getData();
		// }


		$data['prodi'] = $this->Model_prodi->getData();

		// echo '<pre>';
		// print_r($data);
		// die;

		$data['page'] = "admin/prodi/index";
		$data['title'] = "Data Prodi";
		$this->load->view('admin/template', $data);
	}

	public function add()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['prodi'] = $this->Model_prodi->getDataFakultas();
		$data['dosen'] = $this->Model_dosen->getData();
		$data['page'] = "admin/prodi/add";
		$data['title'] = "Tambah Data prodi";

		// echo '<pre>';
		// print_r($data);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function insert()
	{
		$prd_kd = $this->input->post("prd_kd");
		$prd_jurusan = $this->input->post("prd_jurusan");
		$fk_id = $this->input->post("fk_id");
		$dsn_id = $this->input->post("dsn_id");

		$cek_prd_kd = $this->Model_prodi->checkKdprodi($prd_kd);

		if (!empty($cek_prd_kd)) {
			echo "
			<script>
					alert('Kode prodi Sudah Terdaftar!')
					history.back()
			</script>
			";
			return false;
		}

		$data_insert = [
			"prd_kd" => $prd_kd,
			"prd_jurusan" => $prd_jurusan,
			"fk_id" => $fk_id,
			"dsn_id" => $dsn_id
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_prodi->insert($data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Insert Data');
			redirect(base_url("/data-prodi"));
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
		$data['prodi'] = $this->Model_prodi->getDataById($id)[0];
		$data['fakultas'] = $this->Model_prodi->getDataFakultas();
		$data['dosen'] = $this->Model_dosen->getData();
		$data['page'] = "admin/prodi/edit";
		$data['title'] = "Data prodi";
		// echo '<pre>';
		// print_r($data);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function update()
	{
		$id = $this->input->post("id");
		$prd_kd = $this->input->post("prd_kd");
		$prd_jurusan = $this->input->post("prd_jurusan");
		$fk_id = $this->input->post("fk_id");
		$dsn_id = $this->input->post("dsn_id");

		$data_update = [
			"id" => $id,
			"prd_kd" => $prd_kd,
			"prd_jurusan" => $prd_jurusan,
			"fk_id" => $fk_id,
			"dsn_id" => $dsn_id
		];

		// echo '<pre>';
		// print_r($data_update);
		// die;

		$update = $this->Model_prodi->update($id, $data_update);

		if ($update) {
			$this->session->set_flashdata('msg', 'Sukses Update Data');
			redirect(base_url("/data-prodi"));
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
		$this->Model_prodi->delete($id);

		$this->session->set_flashdata('msg', 'Sukses Hapus Data');
		redirect(base_url("/data-prodi"));
	}
}
