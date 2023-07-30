<?php

class Model_prodi extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		if ($data) {
			$insert = $this->db->insert('prodi', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function getData()
	{
		$this->db->select('prodi.*,
		prodi.prd_kd,
		prodi.prd_jurusan,
		fakultas.fk_nama,
		dosen.dsn_nid,
		dosen.dsn_nama');
		$this->db->from('prodi')->order_by('prd_kd', 'asc');
		// $this->db->from('fakultas');

		$this->db->join('fakultas', 'fakultas.id = prodi.fk_id');
		$this->db->join('dosen', 'dosen.id = prodi.dsn_id');
		// $this->db->where('prodi.id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDataFakultas()
	{
		$this->db->select('fakultas.*');
		$this->db->from('fakultas');
		// $this->db->from('fakultas');

		// $this->db->join('fakultas', 'fakultas.id = prodi.fk_id');
		// $this->db->where('prodi.id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDataById($id)
	{
		$this->db->select('prodi.*,
		prodi.prd_kd,
		prodi.prd_jurusan,
		fakultas.fk_nama,
		dosen.dsn_nid,
		dosen.dsn_nama');
		$this->db->from('prodi');
		// $this->db->from('fakultas');

		$this->db->join('fakultas', 'fakultas.id = prodi.fk_id');
		$this->db->join('dosen', 'dosen.id = prodi.dsn_id');
		$this->db->where('prodi.id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function checkKdprodi($prd_kd)
	{
		$sql = "
		SELECT prd_kd
		FROM prodi
		WHERE prd_kd = '" . $prd_kd . "';
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function update($id, $data)
	{
		if ($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('prodi', $data);
			return ($update == true) ? true : false;
		}
	}

	public function delete($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('prodi');
			return ($delete == true) ? true : false;
		}
	}
}
