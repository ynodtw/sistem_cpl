<?php

class Model_matakuliah extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->Model('Model_cpl');
	}

	public function insert($data)
	{
		if ($data) {
			$insert = $this->db->insert('matakuliah', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function getData()
	{

		$this->db->select('matakuliah.*,
		prodi.prd_jurusan,
		fakultas.fk_nama');
		$this->db->from('matakuliah');
		// $this->db->from('fakultas');

		$this->db->join('prodi', 'prodi.id = matakuliah.prd_id');
		$this->db->join('fakultas', 'fakultas.id = prodi.fk_id');
		// $this->db->where('dosen.id', $id);
		$query = $this->db->get();
		return $query->result_array();
		$query = $this->db->query($sql);
		// $query = $this->db->get();
		return $query->result_array();
	}

	public function checkKdMk($mk_kd)
	{
		$sql = "
		SELECT mk_kd
		FROM matakuliah
		WHERE mk_kd = '" . $mk_kd . "';
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// public function getSearch($nik = "", $nama = "", $telp = "", $tgl_datang = "", $tgl_pulang = "")
	// {
	// 	$sql = "
	//           SELECT *
	//           FROM matakuliah
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
			$update = $this->db->update('matakuliah', $data);
			return ($update == true) ? true : false;
		}
	}

	public function delete($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('matakuliah');
			return ($delete == true) ? true : false;
		}
	}
}
