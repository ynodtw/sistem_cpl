<?php

class Model_dosen extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		if ($data) {
			$insert = $this->db->insert('dosen', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function getData()
	{
		$this->db->select('dosen.*,
		dosen.dsn_nid,
		dosen.dsn_nama,
		prodi.prd_kd,
		fakultas.fk_nama,
		prodi.prd_jurusan');
		$this->db->from('dosen');
		// $this->db->from('fakultas');

		$this->db->join('fakultas', 'fakultas.id = dosen.fk_id');
		$this->db->join('prodi', 'prodi.id = dosen.prd_id');
		// $this->db->where('dosen.id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDataByProdi($id)
	{
		$this->db->select('dosen.*,
		dosen.dsn_nid,
		dosen.dsn_nama,
		prodi.prd_kd,
		fakultas.fk_nama,
		prodi.prd_jurusan');
		$this->db->from('dosen');
		$this->db->join('fakultas', 'fakultas.id = dosen.fk_id');
		$this->db->join('prodi', 'prodi.id = dosen.prd_id');
		$this->db->where('dosen.prd_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDataByJurusan($id)
	{
		$this->db->select('dosen.*,
		dosen.dsn_nid,
		dosen.dsn_nama,
		prodi.prd_kd,
		fakultas.fk_nama,
		prodi.prd_jurusan');
		$this->db->from('dosen');
		$this->db->join('fakultas', 'fakultas.id = dosen.fk_id');
		$this->db->join('prodi', 'prodi.id = dosen.prd_id');
		$this->db->where('dosen.fk_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDataById($id)
	{
		$this->db->select('dosen.*,
		dosen.dsn_nid,
		dosen.dsn_nama,
		prodi.prd_kd,
		fakultas.fk_nama,
		prodi.prd_jurusan');
		$this->db->from('dosen');
		// $this->db->from('fakultas');

		$this->db->join('fakultas', 'fakultas.id = dosen.fk_id');
		$this->db->join('prodi', 'prodi.id = dosen.prd_id');
		$this->db->where('dosen.id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function checkNID($dsn_nid)
	{
		$sql = "
		SELECT *
		FROM dosen
		WHERE dsn_nid = '" . $dsn_nid . "';
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function update($id, $data)
	{
		if ($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('dosen', $data);
			return ($update == true) ? true : false;
		}
	}

	public function delete($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('dosen');
			return ($delete == true) ? true : false;
		}
	}
}
