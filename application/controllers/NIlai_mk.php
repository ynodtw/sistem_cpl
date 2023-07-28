<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_mk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_nilai_mk');
		$this->load->model('Model_matakuliah');
		$this->load->model('Model_mahasiswa');
	}

	public function index($id_mhs)
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];

		// $mk_smt = @$_GET['mk_smt'];
		// $mk_kd = @$_GET['mk_kd'];
		// $mk_nama = @$_GET['mk_nama'];
		// $mhs_nim = @$_GET['mhs_nim'];
		// $mhs_nama = @$_GET['mhs_nama'];
		// $n_absen = @$_GET['n_absen'];
		// $n_tugas = @$_GET['n_tugas'];
		// $n_uts = @$_GET['n_uts'];
		// $n_uas = @$_GET['n_uas'];
		// $n_akumulasi = @$_GET['n_akumulasi'];


		// if ($mk_smt != "" || $mk_kd != "" || $mk_nama != "" || $mhs_nim != "" || $mhs_nama != "" || $n_tugas != "" || $n_uts != "" || $n_uas != "" || $n_akumulasi != "") {
		// 	$data['nilai_mk'] = $this->Model_nilai_mk->getSearch($mk_smt, $mk_kd, $mk_nama, $mhs_nim, $mhs_nama, $n_tugas, $n_uts, $n_uas, $n_akumulasi);
		// } else {
		// 	$data['nilai_mk'] = $this->Model_nilai_mk->getData();
		// }

		$data['nilai_mk'] = $this->Model_nilai_mk->getData($id_mhs);

		// echo '<pre>';
		// print_r($data);
		// die;

		$data['id_mhs'] = $id_mhs;
		$data['nim'] = @$data['nilai_mk'][0]['mhs_nim'];
		$data['nama'] = @$data['nilai_mk'][0]['mhs_nama'];


		$data['page'] = "admin/nilai_mk/index";
		$data['title'] = "Data nilai";
		$this->load->view('admin/template', $data);
	}

	public function add($id_mhs)
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['id_mhs'] = $id_mhs;
		$data['page'] = "admin/nilai_mk/add";
		$data['title'] = "Tambah Data Nilai";
		$data['matakuliah'] = $this->Model_matakuliah->getData();
		// echo '<pre>';
		// print_r($data);
		// die;

		$this->load->view('admin/template', $data);
	}

	public function insert()
	{

		$id_mk = $this->input->post("id_mk");
		$id_mhs = $this->input->post("id_mhs");
		$n_absen = $this->input->post("n_absen");
		$n_tugas = $this->input->post("n_tugas");
		$n_uts = $this->input->post("n_uts");
		$n_uas = $this->input->post("n_uas");

		$cek_id_mk = $this->Model_nilai_mk->checkMdMk($id_mk, $id_mhs);

		if (!empty($cek_id_mk)) {
			echo "
			<script>
					alert('Matakuliah Sudah Terdaftar!')
					history.back()
			</script>
			";
			return false;
		}

		$matakuliah = $this->Model_matakuliah->getData($id_mk)[0];
		// echo '<pre>';
		// print_r($matakuliah);
		// die;
		$bobot_absen = $matakuliah['bobot_absen'];
		$bobot_tugas = $matakuliah['bobot_tugas'];
		$bobot_uts = $matakuliah['bobot_uts'];
		$bobot_uas = $matakuliah['bobot_uas'];

		$data_insert = [
			"id_mk" => $id_mk,
			"id_mhs" => $id_mhs,
			"n_absen" => $n_absen,
			"n_tugas" => $n_tugas,
			"n_uts" => $n_uts,
			"n_uas" => $n_uas,
			"n_akumulasi" => ($n_absen * $bobot_absen) / 100 + ($n_tugas * $bobot_tugas) / 100 + ($n_uts * $bobot_uts) / 100 + ($n_uas * $bobot_uas) / 100
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_nilai_mk->insert($data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Insert Data');
			redirect(base_url("/data-nilai-matakuliah/" . $id_mhs));
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
		$data['nilai_mk'] = $this->Model_nilai_mk->getDataById($id)[0];
		$data['page'] = "admin/nilai_mk/edit";
		$data['title'] = "Data Nilai Matakuliah";
		$data['matakuliah'] = $this->Model_matakuliah->getData();

		// echo "<pre>";
		// print_r($data['nilai_mk']);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function update()
	{
		$id = $this->input->post("id");
		$id_mk = $this->input->post("id_mk");
		$id_mhs = $this->input->post("id_mhs");
		$n_absen = $this->input->post("n_absen");
		$n_tugas = $this->input->post("n_tugas");
		$n_uts = $this->input->post("n_uts");
		$n_uas = $this->input->post("n_uas");

		$matakuliah = $this->Model_matakuliah->getData($id_mk)[0];
		// echo '<pre>';
		// print_r($matakuliah);
		// die;
		$bobot_absen = $matakuliah['bobot_absen'];
		$bobot_tugas = $matakuliah['bobot_tugas'];
		$bobot_uts = $matakuliah['bobot_uts'];
		$bobot_uas = $matakuliah['bobot_uas'];

		$data_insert = [
			"id_mk" => $id_mk,
			"n_absen" => $n_absen,
			"n_tugas" => $n_tugas,
			"n_uts" => $n_uts,
			"n_uas" => $n_uas,
			"n_akumulasi" => ($n_absen * $bobot_absen) / 100 + ($n_tugas * $bobot_tugas) / 100 + ($n_uts * $bobot_uts) / 100 + ($n_uas * $bobot_uas) / 100
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_nilai_mk->update($id, $data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Update Data');
			redirect(base_url("/data-nilai-matakuliah/" . $id_mhs));
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
		$this->Model_nilai_mk->delete($id);

		$this->session->set_flashdata('msg', 'Sukses Hapus Data');
		redirect($this->agent->referrer());
	}
}
