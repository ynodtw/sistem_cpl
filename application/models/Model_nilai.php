<?php

class Model_nilai extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		if ($data) {
			$insert = $this->db->insert('nilai', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function getData()
	{
		$this->db->from('nilai');
		$this->db->select(
			'nilai.id as nilai_id,
			matakuliah.id as mk_id,
			mahasiswa.id as mhs_id,
			nilai.n_tugas,
			nilai.n_uts,
			nilai.n_uas,
			nilai.n_akumulasi,
			matakuliah.mk_smt,
			matakuliah.mk_kd,
			matakuliah.mk_nama,
			mahasiswa.mhs_nim,
			mahasiswa.mhs_nama'
		);

		$this->db->join('matakuliah', 'nilai.id_mk = matakuliah.id');
		$this->db->join('mahasiswa', 'nilai.id_mhs = mahasiswa.id');
		$query = $this->db->get();
		return $query->result();
	}

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

	// public function delete($id)
	// {
	// 	if ($id) {
	// 		$this->db->where('id', $id);
	// 		$delete = $this->db->delete('nilai');
	// 		return ($delete == true) ? true : false;
	// 	}
	// }
}
