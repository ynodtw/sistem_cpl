<?php

class Model_nilai_mk extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_matakuliah');
	}

	public function insert($data)
	{
		if ($data) {
			$insert = $this->db->insert('nilai_mk', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function getData($id_mhs)
	{
		$this->db->select('nilai_mk.*, 
		matakuliah.mk_smt, 
		matakuliah.mk_kd, 
		matakuliah.mk_nama, 
		matakuliah.bobot_absen, 
		matakuliah.bobot_tugas, 
		matakuliah.bobot_uts, 
		matakuliah.bobot_uas, 
		mahasiswa.fk_id, 
		mahasiswa.prd_id, 
		mahasiswa.mhs_nim, 
		mahasiswa.mhs_nama');
		$this->db->from('nilai_mk');

		$this->db->join('matakuliah', 'matakuliah.id = nilai_mk.id_mk');
		$this->db->join('mahasiswa', 'mahasiswa.id = nilai_mk.id_mhs');
		$this->db->where('nilai_mk.id_mhs', $id_mhs);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDataById($id)
	{
		$this->db->select('nilai_mk.*, 
		matakuliah.mk_smt, 
		matakuliah.mk_kd, 
		matakuliah.mk_nama, 
		matakuliah.cpl, 
		mahasiswa.mhs_nim, 
		mahasiswa.mhs_nama');
		$this->db->from('nilai_mk');

		$this->db->join('matakuliah', 'matakuliah.id = nilai_mk.id_mk');
		$this->db->join('mahasiswa', 'mahasiswa.id = nilai_mk.id_mhs');
		$this->db->where('nilai_mk.id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function checkMdMk($id_mk, $id_mhs)
	{
		$this->db->select('*');
		$this->db->from('nilai_mk');

		$this->db->where('nilai_mk.id_mhs', $id_mhs);
		$this->db->where('nilai_mk.id_mk', $id_mk);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update($id, $data)
	{
		if ($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('nilai_mk', $data);
			return ($update == true) ? true : false;
		}
	}

	public function delete($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('nilai_mk');
			return ($delete == true) ? true : false;
		}
	}
}
