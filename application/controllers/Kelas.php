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
		$this->load->model('Model_cplmk');
		if (!$this->session->has_userdata('data_login')) {
			redirect("/login");
		}

		if ($_SESSION['data_login']["role"] == "mahasiswa") {
			echo "
				<script>
						alert('Akses Ditolak')
						history.back()
				</script>
				";
			return false;
		}
	}

	public function index()
	{
		$data['kelas'] = $this->Model_kelas->getDataAll();
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['page'] = "admin/kelas/index";
		$data['title'] = "Data Kelas";

		// echo '<pre>';
		// print_r($data);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function detail($id)
	{
		$nilai_mk = $this->Model_kelas->getDataByIdMk($id);
		$data['nilai_mk'] = $nilai_mk;
		$count_nilai_mk = count($nilai_mk);
		$sum_nilai_mk = 0;
		foreach ($nilai_mk as $nmk) {
			$sum_nilai_mk += $nmk['n_akumulasi'];
		}
		@$data['avg_nilai_mk'] = $sum_nilai_mk / $count_nilai_mk;

		$nilai_cpl = $this->Model_cplmk->getByIdNilaiMk($id);
		$count_nilai_cpl = count($nilai_cpl);
		$sum_nilai_cpl = 0;
		foreach ($nilai_cpl as $ncpl) {
			$sum_nilai_cpl += $ncpl['n_cplmk'];
		}
		@$data['avg_nilai_cpl'] = $sum_nilai_cpl / $count_nilai_cpl;

		$avg_cplmk = $this->Model_cplmk->getAvg($id);
		$data['avg_cplmk'] = $avg_cplmk;
		$title_cplmk = "";
		$num_cplmk = "";

		foreach ($avg_cplmk as $ac) {
			$title_cplmk .= $ac['cpl_kd'] . ",";
			$num_cplmk .= $ac['avg_cplmk'] . ",";
		}
		$title_cplmk = substr($title_cplmk, 0, -1);
		$num_cplmk = substr($num_cplmk, 0, -1);

		$data['title_cplmk'] = json_encode(explode(",", $title_cplmk));
		$data['num_cplmk'] = json_encode(explode(",", $num_cplmk));

		$data['mk_nama'] = $this->Model_matakuliah->checkIdMk($id)[0]['mk_nama'];
		$data['id_mk'] = $id;
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['page'] = "admin/kelas/detail";
		$data['title'] = "Data Kelas";


		// echo '<pre>';
		// print_r($data);
		// die;

		$this->load->view('admin/template', $data);
	}

	public function add()
	{
		$data['kelas'] = $this->Model_kelas->getData();
		$data['prodi'] = $this->Model_prodi->getData();
		// $data['fakultas'] = $this->Model_prodi->getDataFakultas();
		$data['dosen'] = $this->Model_dosen->getData();
		$data['matakuliah'] = $this->Model_matakuliah->getData();

		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['page'] = "admin/kelas/add";
		$data['title'] = "Data Kelas";

		// echo '<pre>';
		// print_r($data);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function insert()
	{
		$prd_id = $this->input->post("prd_id");
		$dsn_id = $this->input->post("dsn_id");
		// $kelas_kd = $this->input->post("kelas_kd");
		$kelas_nama = $this->input->post("kelas_nama");
		$mk_id = $this->input->post("mk_id");

		$cek_mk_id = $this->Model_kelas->checkMkId($mk_id);
		// $cek_kelas_kode = $this->Model_kelas->checkKelasKode($kelas_kd);

		if (!empty($cek_mk_id)) {
			echo "
			<script>
					alert('Matakuliah Sudah Terdaftar!')
					history.back()
			</script>
			";
			return false;
		}

		$data_insert = [
			"prd_id" => $prd_id,
			"dsn_id" => $dsn_id,
			// "kelas_kd" => $kelas_kd,
			"kelas_nama" => $kelas_nama,
			"mk_id" => $mk_id
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
		$data['kelas'] = $this->Model_kelas->getData($id)[0];
		$data['prodi'] = $this->Model_prodi->getData();
		// $data['fakultas'] = $this->Model_prodi->getDataFakultas();
		$data['dosen'] = $this->Model_dosen->getData();
		$data['matakuliah'] = $this->Model_matakuliah->getData();

		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['page'] = "admin/kelas/edit";
		$data['title'] = "Data Kelas";

		// echo '<pre>';
		// print_r($data);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function update()
	{
		$id = $this->input->post("id");
		$prd_id = $this->input->post("prd_id");
		$dsn_id = $this->input->post("dsn_id");
		// $kelas_kd = $this->input->post("kelas_kd");
		$kelas_nama = $this->input->post("kelas_nama");
		$mk_id = $this->input->post("mk_id");

		// $cek_mk_id = $this->Model_kelas->checkMkId($mk_id);

		// if (!empty($cek_mk_id)) {
		// 	echo "
		// 	<script>
		// 			alert('Matakuliah Sudah Terdaftar!')
		// 			history.back()
		// 	</script>
		// 	";
		// 	return false;
		// }

		$data_update = [
			"id" => $id,
			"prd_id" => $prd_id,
			"dsn_id" => $dsn_id,
			// "kelas_kd" => $kelas_kd,
			"kelas_nama" => $kelas_nama,
			"mk_id" => $mk_id
		];

		// echo '<pre>';
		// print_r($data_update);
		// die;

		$update = $this->Model_kelas->update($id, $data_update);

		if ($update) {
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
