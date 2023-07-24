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

	public function getData($id_nilai_mk)
	{
		$this->db->select('cplmk.*,
		nilai_mk.id_mk,
		nilai_mk.id_mhs,
		matakuliah.mk_nama,
		matakuliah.mk_kd,
		cpl.cpl_kd,
		cpl.cpl_kategori,
		cpl.cpl_deskripsi');
		$this->db->from('cplmk');

		$this->db->join('nilai_mk', 'nilai_mk.id = cplmk.id_nilai_mk');
		$this->db->join('mahasiswa', 'mahasiswa.id = nilai_mk.id_mhs');
		$this->db->join('matakuliah', 'matakuliah.id = nilai_mk.id_mk');
		$this->db->join('cpl', 'cpl.id = cplmk.id_cpl');
		$this->db->where('cplmk.id_nilai_mk', $id_nilai_mk);
		$query = $this->db->get();
		return $query->result_array();
	}


	// public function getDataNilaiCpl($id_mhs)
	// {
	// 	$this->db->select('nilai_mk.*,cplmk.*, mahasiswa.*, cpl.cpl_kd, cpl.cpl_deskripsi, matakuliah.mk_kd, matakuliah.mk_nama');
	// 	$this->db->from('nilai_mk');

	// 	$this->db->join('cplmk', 'nilai_mk.id = cplmk.id_nilai_mk');
	// 	$this->db->join('mahasiswa', 'mahasiswa.id = nilai_mk.id_mhs');
	// 	$this->db->join('matakuliah', 'matakuliah.id = nilai_mk.id_mk');
	// 	$this->db->join('cpl', 'cpl.id = cplmk.id_cpl');
	// 	$this->db->where('nilai_mk.id_mhs', $id_mhs);
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	public function checkKdCpl($id_nilai_mk, $id_cpl)
	{
		$this->db->select('*');
		$this->db->from('cplmk');

		$this->db->where('cplmk.id_nilai_mk', $id_nilai_mk);
		$this->db->where('cplmk.id_cpl', $id_cpl);
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
