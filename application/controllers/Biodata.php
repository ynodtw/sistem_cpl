<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodata extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_biodata');
		$this->load->model('Model_users');
		if (!$this->session->has_userdata('data_login')) {
			redirect("/login");
		}
	}

	public function index($users_id)
	{
		@$data['tentang'] = $this->Model_tentang->getData()[0];
		@$data['biodata'] = $this->Model_biodata->getData($users_id)[0];
		@$data['page'] = "admin/biodata/index";
		@$data['title'] = "Biodata";
		// echo '<pre>';
		// print_r($data);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function add()
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['page'] = "admin/biodata/add";
		$data['title'] = "Tambah Data biodata";
		$this->load->view('admin/template', $data);
	}

	public function update()
	{
		$id = $this->input->post("id");
		$nik = $this->input->post("nik");
		$tempat_lahir = $this->input->post("tempat_lahir");
		$tgl_lahir = $this->input->post("tgl_lahir");
		$agama = $this->input->post("agama");
		$kewarganegaraan = $this->input->post("kewarganegaraan");
		$gender = $this->input->post("gender");
		$no_telp = $this->input->post("no_telp");


		$data_update = [
			"nik" => $nik,
			"tempat_lahir" => $tempat_lahir,
			"tgl_lahir" => $tgl_lahir,
			"agama" => $agama,
			"kewarganegaraan" => $kewarganegaraan,
			"gender" => $gender,
			"no_telp" => $no_telp,
		];

		// echo '<pre>';
		// print_r($data_update);
		// die;
		$update = $this->Model_biodata->update($id, $data_update);

		if ($update) {
			$this->session->set_flashdata('msg', 'Sukses Update Data');
			redirect($this->agent->referrer());
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
}
