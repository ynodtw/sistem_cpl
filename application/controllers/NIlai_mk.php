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
		$this->load->model('Model_dosen');
		if (!$this->session->has_userdata('data_login')) {
			redirect("/login");
		}
	}

	public function index($id_mhs)
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['nilai_mk'] = $this->Model_nilai_mk->getData($id_mhs);
		$data['id_mhs'] = $id_mhs;
		$data['nim'] = @$data['nilai_mk'][0]['mhs_nim'];
		$data['nama'] = @$data['nilai_mk'][0]['mhs_nama'];

		if ($_SESSION['data_login']['role'] == "prodi" || $_SESSION['data_login']['role'] == "dosen") {
			$data_dosen = $this->Model_dosen->checkNID($_SESSION['data_login']['username'])[0];
			$dosen_fk_id = $data_dosen['fk_id'];
			$dosen_prd_id = $data_dosen['prd_id'];
			$data['dosen_fk_id'] = $dosen_fk_id;
			$data['dosen_prd_id'] = $dosen_prd_id;
		}

		$data['page'] = "admin/nilai_mk/index";
		$data['title'] = "Data nilai";
		$this->load->view('admin/template', $data);
	}

	public function daftar($id_mhs)
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['nilai_mk'] = $this->Model_nilai_mk->getData($id_mhs);
		$data['id_mhs'] = $id_mhs;
		$data['nim'] = @$data['nilai_mk'][0]['mhs_nim'];
		$data['nama'] = @$data['nilai_mk'][0]['mhs_nama'];

		if ($_SESSION['data_login']['role'] == "prodi" || $_SESSION['data_login']['role'] == "dosen") {
			$data_dosen = $this->Model_dosen->checkNID($_SESSION['data_login']['username'])[0];
			$dosen_fk_id = $data_dosen['fk_id'];
			$dosen_prd_id = $data_dosen['prd_id'];
			$data['dosen_fk_id'] = $dosen_fk_id;
			$data['dosen_prd_id'] = $dosen_prd_id;
		}

		$data['page'] = "admin/nilai_mk/daftar";
		$data['title'] = "Data nilai";
		$this->load->view('admin/template', $data);
	}

	public function add($id_mk)
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['id_mk'] = $id_mk;
		$data['page'] = "admin/nilai_mk/add";
		$data['title'] = "Data Kelas";
		$data['matakuliah'] = $this->Model_matakuliah->getData();
		$data['mahasiswa'] = $this->Model_mahasiswa->getData();
		// echo '<pre>';
		// print_r($data['mahasiswa']);
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
			redirect(base_url("data-kelas/detail/" . $id_mk));
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

		$data_update = [
			"id_mk" => $id_mk,
			"n_absen" => $n_absen,
			"n_tugas" => $n_tugas,
			"n_uts" => $n_uts,
			"n_uas" => $n_uas,
			"n_akumulasi" => ($n_absen * $bobot_absen) / 100 + ($n_tugas * $bobot_tugas) / 100 + ($n_uts * $bobot_uts) / 100 + ($n_uas * $bobot_uas) / 100
		];

		// echo '<pre>';
		// print_r($data_update);
		// die;

		$update = $this->Model_nilai_mk->update($id, $data_update);

		// if ($update) {
		// 	$this->session->set_flashdata('msg', 'Sukses Update Data');
		// 	redirect(base_url("/data-nilai-matakuliah/" . $id_mhs));
		// } else {
		// 	echo "
		//         <script>
		//             alert('Gagal update data!')
		//             history.back()
		//         </script>
		//         ";
		// 	return false;
		// }

		if ($update) {
			$this->session->set_flashdata('msg', 'Sukses Update Data');
			redirect(base_url("/data-kelas/detail/" . $id_mk));
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
