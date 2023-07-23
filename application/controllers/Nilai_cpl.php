<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_cpl extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_nilai_cpl');
		$this->load->model('Model_cpl');
	}

	public function index($id_mhs)
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];

		$mhs_nim = @$_GET['mhs_nim'];
		$mhs_nama = @$_GET['mhs_nama'];
		$cpl_kd = @$_GET['cpl_kd'];
		$cpl_kategori = @$_GET['cpl_kategori'];
		$cpl_deskripsi = @$_GET['cpl_deskripsi'];
		$n_cpl = @$_GET['n_cpl'];


		// if ($mk_smt != "" || $mk_kd != "" || $mk_nama != "" || $mhs_nim != "" || $mhs_nama != "" || $cpl_kd != "" || $cpl_kategori != "" || $cpl_deskripsi != "" || $n_cpl != "") {
		// 	$data['nilai_cpl'] = $this->Model_nilai_cpl->getSearch($mk_smt, $mk_kd, $mk_nama, $mhs_nim, $mhs_nama, $cpl_kd, $cpl_kategori, $cpl_deskripsi, $n_cpl);
		// } else {
		// 	$data['nilai_cpl'] = $this->Model_nilai_cpl->getData();
		// }

		$data['nilai_cpl'] = $this->Model_nilai_cpl->getData($id_mhs);
		$data['id_mhs'] = $id_mhs;
		$data['nim'] = @$data['nilai_cpl'][0]['mhs_nim'];
		$data['nama'] = @$data['nilai_cpl'][0]['mhs_nama'];
		// echo '<pre>';
		// print_r($data);
		// die;

		$data['page'] = "admin/nilai_cpl/index";
		$data['title'] = "Data nilai";
		$this->load->view('admin/template', $data);
	}

	public function add($id_mhs)
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['id_mhs'] = $id_mhs;
		$data['page'] = "admin/nilai_cpl/add";
		$data['title'] = "Tambah Data Nilai_cpl";
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
		$cpl_kd = $this->input->post("cpl_kd");
		$cpl_kategori = $this->input->post("cpl_kategori");
		$cpl_deskripsi = $this->input->post("cpl_deskripsi");
		$n_cpl = $this->input->post("n_cpl");

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
			"cpl_kd" => $cpl_kd,
			"cpl_kategori" => $cpl_kategori,
			"cpl_deskripsi" => $cpl_deskripsi,
			"n_cpl" => $n_cpl
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_nilai_cpl->insert($data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Insert Data');
			redirect(base_url("/data-nilai_cpl/" . $id_mhs));
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
