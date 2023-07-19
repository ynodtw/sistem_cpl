<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_nilai');
		$this->load->model('Model_matakuliah');
	}

	public function index($id_mhs)
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];

		$mk_smt = @$_GET['mk_smt'];
		$mk_kd = @$_GET['mk_kd'];
		$mk_nama = @$_GET['mk_nama'];
		$mhs_nim = @$_GET['mhs_nim'];
		$mhs_nama = @$_GET['mhs_nama'];
		$n_tugas = @$_GET['n_tugas'];
		$n_uts = @$_GET['n_uts'];
		$n_uas = @$_GET['n_uas'];
		$n_akumulasi = @$_GET['n_akumulasi'];


		// if ($mk_smt != "" || $mk_kd != "" || $mk_nama != "" || $mhs_nim != "" || $mhs_nama != "" || $n_tugas != "" || $n_uts != "" || $n_uas != "" || $n_akumulasi != "") {
		// 	$data['nilai'] = $this->Model_nilai->getSearch($mk_smt, $mk_kd, $mk_nama, $mhs_nim, $mhs_nama, $n_tugas, $n_uts, $n_uas, $n_akumulasi);
		// } else {
		// 	$data['nilai'] = $this->Model_nilai->getData();
		// }

		$data['nilai'] = $this->Model_nilai->getData($id_mhs);
		$data['id_mhs'] = $id_mhs;
		$data['nim'] = $data['nilai'][0]['mhs_nim'];
		$data['nama'] = $data['nilai'][0]['mhs_nama'];
		// echo '<pre>';
		// print_r($data['nilai']);
		// die;

		$data['page'] = "admin/nilai/index";
		$data['title'] = "Data nilai";
		$this->load->view('admin/template', $data);
	}

	public function add($id_mhs)
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['id_mhs'] = $id_mhs;
		$data['page'] = "admin/nilai/add";
		$data['title'] = "Tambah Data Nilai";
		$data['matakuliah'] = $this->Model_matakuliah->getData();
		// echo '<pre>';
		// print_r($data['matakuliah']);
		// die;

		$this->load->view('admin/template', $data);
	}

	public function insert()
	{
		$id_mk = $this->input->post("id_mk");
		$id_mhs = $this->input->post("id_mhs");
		$n_tugas = $this->input->post("n_tugas");
		$n_uts = $this->input->post("n_uts");
		$n_uas = $this->input->post("n_uas");
		$n_akumulasi = $this->input->post("n_akumulasi");

		$cek_id_mhs = $this->Model_matakuliah->checkKdMk($id_mhs);

		// if (!empty($cek_id_mhs)) {
		// 	echo "
		// 	<script>
		// 			alert('Kode Matakuliah Sudah Terdaftar!')
		// 			history.back()
		// 	</script>
		// 	";
		// 	return false;
		// }

		$data_insert = [
			"id_mk" => $id_mk,
			"id_mhs" => $id_mhs,
			"n_tugas" => $n_tugas,
			"n_uts" => $n_uts,
			"n_uas" => $n_uas,
			"n_akumulasi" => $n_akumulasi
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_nilai->insert($data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Insert Data');
			redirect(base_url("/data-nilai/" . $id_mhs));
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
}
