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

	public function getDataProdi()
	{
		$this->db->select('prodi.*');
		$this->db->from('prodi');
		// $this->db->where('id', $id);
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
		SELECT dsn_nid
		FROM dosen
		WHERE dsn_nid = '" . $dsn_nid . "';
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// public function getSearch($nik = "", $nama = "", $telp = "", $tgl_datang = "", $tgl_pulang = "")
	// {
	// 	$sql = "
	//           SELECT *
	//           FROM dosen
	//           WHERE 
	//           (tgl_datang >= '" . $tgl_datang . "' AND tgl_pulang <= '" . $tgl_pulang . "')
	//       ";

	// 	if ($nik != "") {
	// 		$sql .= " AND nik = '" . $nik . "'";
	// 	}

	// 	if ($telp != "") {
	// 		$sql .= " AND telp = '" . $telp . "'";
	// 	}

	// 	if ($nama != "") {
	// 		$sql .= " AND nama LIKE  '%" . $nama . "%' ";
	// 	}

	// 	$sql .= "ORDER BY id ASC;";

	// 	$query = $this->db->query($sql);
	// 	return $query->result_array();
	// }

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
