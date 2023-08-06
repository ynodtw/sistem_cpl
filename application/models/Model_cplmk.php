<?php

class Model_cplmk extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_cpl');
		$this->load->model('Model_nilai_mk');
	}

	public function insert($data)
	{
		if ($data) {
			$insert = $this->db->insert('cplmk', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function getData($id_nilai_mk)
	{
		$this->db->select('cplmk.*,
		nilai_mk.id_mk,
		nilai_mk.id_mhs,
		matakuliah.mk_nama,
		matakuliah.mk_kd,
		cpl.cpl_kd,
		cpl.cpl_kategori,
		cpl.cpl_deskripsi');
		$this->db->from('cplmk');

		$this->db->join('nilai_mk', 'nilai_mk.id = cplmk.id_nilai_mk');
		$this->db->join('mahasiswa', 'mahasiswa.id = nilai_mk.id_mhs');
		$this->db->join('matakuliah', 'matakuliah.id = nilai_mk.id_mk');
		$this->db->join('cpl', 'cpl.id = cplmk.id_cpl');
		$this->db->where('cplmk.id_nilai_mk', $id_nilai_mk);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAvg($id_mk)
	{
		$sql = "
		SELECT cpl_kd, AVG(n_cplmk) AS avg_cplmk
		FROM `cplmk` 
		JOIN `nilai_mk` ON `nilai_mk`.`id` = `cplmk`.`id_nilai_mk` 
		JOIN `matakuliah` ON `matakuliah`.`id` = `nilai_mk`.`id_mk` 
		JOIN `cpl` ON `cpl`.`id` = `cplmk`.`id_cpl` 
		WHERE `matakuliah`.`id` = '" . $id_mk . "'
		GROUP BY cpl.cpl_kd;
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getByIdNilaiMk($id_mk)
	{
		$this->db->select('cplmk.n_cplmk, nilai_mk.id_mk, matakuliah.mk_nama');
		$this->db->from('cplmk');

		$this->db->join('nilai_mk', 'nilai_mk.id = cplmk.id_nilai_mk');
		$this->db->join('matakuliah', 'matakuliah.id = nilai_mk.id_mk');
		$this->db->where('matakuliah.id', $id_mk);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDataById($id)
	{
		$this->db->select('cplmk.*,
		nilai_mk.id_mk,
		nilai_mk.id_mhs,
		matakuliah.mk_nama,
		matakuliah.mk_kd,
		cpl.cpl_kd,
		cpl.cpl_kategori,
		cpl.cpl_deskripsi');
		$this->db->from('cplmk');

		$this->db->join('nilai_mk', 'nilai_mk.id = cplmk.id_nilai_mk');
		$this->db->join('mahasiswa', 'mahasiswa.id = nilai_mk.id_mhs');
		$this->db->join('matakuliah', 'matakuliah.id = nilai_mk.id_mk');
		$this->db->join('cpl', 'cpl.id = cplmk.id_cpl');
		$this->db->where('cplmk.id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function checkKdCpl($id_nilai_mk, $id_cpl)
	{
		$this->db->select('*');
		$this->db->from('cplmk');

		$this->db->where('cplmk.id_nilai_mk', $id_nilai_mk);
		$this->db->where('cplmk.id_cpl', $id_cpl);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update($id, $data)
	{
		if ($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('cplmk', $data);
			return ($update == true) ? true : false;
		}
	}

	public function delete($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('cplmk');
			return ($delete == true) ? true : false;
		}
	}
}
