<?php

class Model_nilai_cpl extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		if ($data) {
			$insert = $this->db->insert('nilai_cpl', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function getData($id_mhs)
	{
		$this->db->select('nilai_cpl.*,
		cpl_kd,
		cpl_kategori,
		cpl_deskripsi, 
		mahasiswa.mhs_nim, 
		mahasiswa.mhs_nama');
		$this->db->from('nilai_cpl');

		$this->db->join('mahasiswa', 'mahasiswa.id = nilai_cpl.id_mhs');
		$this->db->join('cpl', 'cpl.id = nilai_cpl.id_cpl');
		$this->db->where('nilai_cpl.id_mhs', $id_mhs);
		$query = $this->db->get();
		return $query->result_array();
	}

	// public function getSearch($nik = "", $nama = "", $telp = "", $tgl_datang = "", $tgl_pulang = "")
	// {
	// 	$sql = "
	//           SELECT *
	//           FROM nilai_cpl
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
	// 		$update = $this->db->update('nilai_cpl', $data);
	// 		return ($update == true) ? true : false;
	// 	}
	// }

	// public function delete($id)
	// {
	// 	if ($id) {
	// 		$this->db->where('id', $id);
	// 		$delete = $this->db->delete('nilai_cpl');
	// 		return ($delete == true) ? true : false;
	// 	}
	// }
}
