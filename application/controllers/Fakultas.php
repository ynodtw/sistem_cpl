<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_fakultas');
		if (!$this->session->has_userdata('data_login')) {
			redirect("/login");
		}
	}

	public function index()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['fakultas'] = $this->Model_fakultas->getData();

		// echo '<pre>';
		// print_r($data);
		// die;

		$data['page'] = "admin/fakultas/index";
		$data['title'] = "Data Prodi";
		$this->load->view('admin/template', $data);
	}

	public function add()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['fakultas'] = $this->Model_fakultas->getData();
		$data['page'] = "admin/fakultas/add";
		$data['title'] = "Tambah Data fakultas";

		// echo '<pre>';
		// print_r($data);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function insert()
	{
		$fk_nama = $this->input->post("fk_nama");

		$cek_fk_nama = $this->Model_fakultas->checkFakultas($fk_nama);

		if (!empty($cek_fk_nama)) {
			echo "
			<script>
					alert('Fakultas Sudah Terdaftar!')
					history.back()
			</script>
			";
			return false;
		}

		$data_insert = [
			"fk_nama" => $fk_nama
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_fakultas->insert($data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Insert Data');
			redirect(base_url("/data-fakultas"));
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
		$data['fakultas'] = $this->Model_fakultas->getData($id)[0];
		$data['page'] = "admin/fakultas/edit";
		$data['title'] = "Data fakultas";
		// echo '<pre>';
		// print_r($data);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function update()
	{
		$id = $this->input->post("id");
		$fk_nama = $this->input->post("fk_nama");

		$data_update = [
			"id" => $id,
			"fk_nama" => $fk_nama
		];

		// echo '<pre>';
		// print_r($data_update);
		// die;

		$update = $this->Model_fakultas->update($id, $data_update);

		if ($update) {
			$this->session->set_flashdata('msg', 'Sukses Update Data');
			redirect(base_url("/data-fakultas"));
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
		$this->Model_fakultas->delete($id);

		$this->session->set_flashdata('msg', 'Sukses Hapus Data');
		redirect(base_url("/data-fakultas"));
	}
}
