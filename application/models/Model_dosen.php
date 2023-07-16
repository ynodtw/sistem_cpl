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

	public function getData($id = "")
	{

		if ($id != "") {
			$sql = "
            SELECT *
            FROM dosen
            WHERE id = '" . $id . "'
            ORDER BY id ASC;
            ";
		} else {
			$sql = "
            SELECT *
            FROM dosen
            ORDER BY id ASC;";
		}

		$query = $this->db->query($sql);
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
