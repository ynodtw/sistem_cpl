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
		mahasiswa.mhs_nim, 
		mahasiswa.mhs_nama');
		$this->db->from('nilai_mk');

		$this->db->join('matakuliah', 'matakuliah.id = nilai_mk.id_mk');
		$this->db->join('mahasiswa', 'mahasiswa.id = nilai_mk.id_mhs');
		$this->db->where('nilai_mk.id_mhs', $id_mhs);
		$query = $this->db->get();
		return $query->result_array();
	}

	// public function checkMdMk($mk_kd)
	// {
	// 	$sql = "
	// 	SELECT mk_kd
	// 	FROM matakuliah
	// 	WHERE mk_kd = '" . $mk_kd . "';
	// 	";
	// 	$query = $this->db->query($sql);
	// 	return $query->result_array();
	// }

	// public function getSearch($nik = "", $nama = "", $telp = "", $tgl_datang = "", $tgl_pulang = "")
	// {
	// 	$sql = "
	//           SELECT *
	//           FROM nilai
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

	// public function update($id, $data)
	// {
	// 	if ($data && $id) {
	// 		$this->db->where('id', $id);
	// 		$update = $this->db->update('nilai', $data);
	// 		return ($update == true) ? true : false;
	// 	}
	// }

	public function delete($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('nilai_mk');
			return ($delete == true) ? true : false;
		}
	}
}