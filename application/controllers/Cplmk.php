<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cplmk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_cplmk');
		$this->load->model('Model_matakuliah');
		$this->load->model('Model_cpl');
		$this->load->model('Model_nilai_mk');
		if (!$this->session->has_userdata('data_login')) {
			redirect("/login");
		}
	}

	public function index($id_nilai_mk)
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];

		$mhs_nim = @$_GET['mhs_nim'];
		$mhs_nama = @$_GET['mhs_nama'];
		$mk_smt = @$_GET['mk_smt'];
		$mk_kd = @$_GET['mk_kd'];
		$mk_nama = @$_GET['mk_nama'];
		$cpl_kd = @$_GET['cpl_kd'];
		$cpl_kategori = @$_GET['cpl_kategori'];
		$cpl_deskripsi = @$_GET['cpl_deskripsi'];


		// if ($mk_smt != "" || $mk_kd != "" || $mk_nama != "" || $cpl_kd != "" || $cpl_kategori != "" || $cpl_deskripsi != "" || $n_uts != "" || $n_uas != "" || $n_akumulasi != "") {
		// 	$data['cplmk'] = $this->Model_cplmk->getSearch($mk_smt, $mk_kd, $mk_nama, $cpl_kd, $cpl_kategori, $cpl_deskripsi, $n_uts, $n_uas, $n_akumulasi);
		// } else {
		// 	$data['cplmk'] = $this->Model_cplmk->getData();
		// }

		$data['cplmk'] = $this->Model_cplmk->getData($id_nilai_mk);
		// $data['id_mhs'] = $id_mhs;
		$data['nim'] = @$data['nilai_mk'][0]['mhs_nim'];
		$data['nama'] = @$data['nilai_mk'][0]['mhs_nama'];
		$data['mk_kd'] = @$data['cplmk'][0]['mk_kd'];
		$data['mk_nama'] = @$data['cplmk'][0]['mk_nama'];
		$data['id_nilai_mk'] = @$id_nilai_mk;

		// echo '<pre>';
		// print_r($data['cplmk']);
		// die;

		$data['page'] = "admin/cplmk/index";
		$data['title'] = "Data cplmk";
		$this->load->view('admin/template', $data);
	}

	public function add($id_nilai_mk)
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['id_nilai_mk'] = $id_nilai_mk;
		$data['page'] = "admin/cplmk/add";
		$data['title'] = "Tambah Data Nilai";
		$data['cplmk'] = $this->Model_cplmk->getData($id_nilai_mk);
		$data['cpl'] = $this->Model_cpl->getData();
		// echo '<pre>';
		// print_r($data);
		// die;

		$this->load->view('admin/template', $data);
	}

	public function insert()
	{
		$id_nilai_mk = $this->input->post("id_nilai_mk");
		$id_cpl = $this->input->post("id_cpl");
		$n_cplmk = $this->input->post("n_cplmk");

		$cek_id_cpl = $this->Model_cplmk->checkKdCpl($id_nilai_mk, $id_cpl);

		if (!empty($cek_id_cpl)) {
			echo "
			<script>
					alert('CPL Sudah Terdaftar!')
					history.back()
			</script>
			";
			return false;
		}

		$data_insert = [
			"id_nilai_mk" => $id_nilai_mk,
			"id_cpl" => $id_cpl,
			"n_cplmk" => $n_cplmk,
		];

		// echo '<pre>';
		// print_r($data_insert);
		// die;

		$insert = $this->Model_cplmk->insert($data_insert);

		if ($insert) {
			$this->session->set_flashdata('msg', 'Sukses Insert Data');
			redirect(base_url("/data-cplmk/" . $id_nilai_mk));
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
		$data['cplmk'] = $this->Model_cplmk->getDataById($id)[0];
		$data['cpl'] = $this->Model_cpl->getData();
		$data['page'] = "admin/cplmk/edit";
		$data['title'] = "Data Nilai Matakuliah";
		$data['matakuliah'] = $this->Model_matakuliah->getData();

		// echo "<pre>";
		// print_r($data['cplmk']);
		// die;
		$this->load->view('admin/template', $data);
	}

	public function update()
	{
		$id = $this->input->post("id");
		$id_nilai_mk = $this->input->post("id_nilai_mk");
		$id_cpl = $this->input->post("id_cpl");
		$n_cplmk = $this->input->post("n_cplmk");

		$data_update = [
			"id_nilai_mk" => $id_nilai_mk,
			"id_cpl" => $id_cpl,
			"n_cplmk" => $n_cplmk,
		];

		// echo '<pre>';
		// print_r($data_update);
		// die;

		$update = $this->Model_cplmk->update($id, $data_update);

		if ($update) {
			$this->session->set_flashdata('msg', 'Sukses update Data');
			redirect(base_url("/data-cplmk/" . $id_nilai_mk));
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
		$this->Model_cplmk->delete($id);

		$this->session->set_flashdata('msg', 'Sukses Hapus Data');
		redirect($this->agent->referrer());
	}
}
