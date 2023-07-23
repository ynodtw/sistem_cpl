<?php

class Model_cplmk extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		if ($data) {
			$insert = $this->db->insert('cplmk', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function getData()
	{
		$this->db->select('cplmk.*, 
		matakuliah.mk_smt, 
		matakuliah.mk_kd, 
		matakuliah.mk_nama, 
		cpl.cpl_kd,
		cpl.cpl_kategori,
		cpl.cpl_deskripsi');
		$this->db->from('cplmk');

		$this->db->join('matakuliah', 'matakuliah.id = cplmk.id_mk');
		$this->db->join('cpl', 'cpl.id = cplmk.id_cpl');
		$query = $this->db->get();
		return $query->result_array();
	}

	// public function getSearch($nik = "", $nama = "", $telp = "", $tgl_datang = "", $tgl_pulang = "")
	// {
	// 	$sql = "
	//           SELECT *
	//           FROM cplmk
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
	// 		$update = $this->db->update('cplmk', $data);
	// 		return ($update == true) ? true : false;
	// 	}
	// }

	// public function delete($id)
	// {
	// 	if ($id) {
	// 		$this->db->where('id', $id);
	// 		$delete = $this->db->delete('cplmk');
	// 		return ($delete == true) ? true : false;
	// 	}
	// }
}
