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
		$data['id_nilai_mk'] = @$id_nilai_mk;
		$matkul = $this->Model_nilai_mk->getDataById($id_nilai_mk);
		$data['mk_kd'] = $matkul[0]['mk_kd'];
		$data['mk_nama'] = $matkul[0]['mk_nama'];

		$str_cpl = $matkul[0]['cpl'];

		$data['cplmk'] = $this->Model_cpl->getDataCplNilai($str_cpl, $id_nilai_mk);
		$data['mhs_nama'] = (@$_GET['mhs_nama'] != "" ? @$_GET['mhs_nama'] : $data['cplmk'][0]['mhs_nama']);
		$data['mhs_nim'] = (@$_GET['mhs_nim'] != "" ? @$_GET['mhs_nim'] : $data['cplmk'][0]['mhs_nim']);

		// echo '<pre>';
		// print_r($data['cplmk']);
		// die;

		$data['page'] = "admin/cplmk/index";
		$data['title'] = "Data CPL Matakuliah";
		$this->load->view('admin/template', $data);
	}

	public function daftar($id_nilai_mk)
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];

		$data['cplmk'] = $this->Model_cplmk->getData($id_nilai_mk);
		$data['nim'] = @$data['nilai_mk'][0]['mhs_nim'];
		$data['nama'] = @$data['nilai_mk'][0]['mhs_nama'];
		$data['mk_kd'] = @$data['cplmk'][0]['mk_kd'];
		$data['mk_nama'] = @$data['cplmk'][0]['mk_nama'];
		$data['id_nilai_mk'] = @$id_nilai_mk;

		// echo '<pre>';
		// print_r($data['cplmk']);
		// die;

		$data['page'] = "admin/cplmk/daftar";
		$data['title'] = "Data CPL Matakuliah";
		$this->load->view('admin/template', $data);
	}

	public function add($id_nilai_mk)
	{
		$data['tentang'] = $this->Model_tentang->getData()[0];
		$data['id_nilai_mk'] = $id_nilai_mk;
		$data['page'] = "admin/cplmk/add";
		$data['title'] = "Tambah Data Nilai";
		$data['cplmk'] = $this->Model_cplmk->getData($id_nilai_mk);

		$matkul = $this->Model_nilai_mk->getDataById($id_nilai_mk);
		$str_cpl = $matkul[0]['cpl'];
		$arr_cpl = explode(",", $str_cpl);

		$data['cpl'] = $this->Model_cpl->getDataCpl($arr_cpl);

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
