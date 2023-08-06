<?php

class Model_kelas extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		if ($data) {
			$insert = $this->db->insert('kelas', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function getData($id = "")
	{
		$this->db->select('kelas.*,
		dosen.dsn_nid,
		dosen.dsn_nama,
		prodi.prd_jurusan,
		matakuliah.mk_nama,
		matakuliah.mk_kd');
		$this->db->from('kelas');

		$this->db->join('prodi', 'prodi.id = kelas.prd_id');
		$this->db->join('dosen', 'dosen.id = kelas.dsn_id');
		$this->db->join('matakuliah', 'matakuliah.id = kelas.mk_id');
		if ($id != "") {
			$this->db->where('kelas.id', $id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDataAll()
	{
		$this->db->select('kelas.*,
		dosen.dsn_nid,
		dosen.dsn_nama,
		prodi.prd_jurusan,
		matakuliah.mk_nama,
		matakuliah.mk_kd');
		$this->db->from('kelas');

		$this->db->join('prodi', 'prodi.id = kelas.prd_id');
		$this->db->join('dosen', 'dosen.id = kelas.dsn_id');
		$this->db->join('matakuliah', 'matakuliah.id = kelas.mk_id');

		if ($_SESSION['data_login']["role"] == "dosen") {
			$this->db->where('dosen.dsn_nid', $_SESSION['data_login']["username"]);
		}

		$query = $this->db->get();
		return $query->result_array();
	}

	public function checkMkId($mk_id)
	{
		$sql = "
		SELECT mk_id
		FROM kelas
		WHERE mk_id = '" . $mk_id . "';
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function update($id, $data)
	{
		if ($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('kelas', $data);
			return ($update == true) ? true : false;
		}
	}

	public function delete($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('kelas');
			return ($delete == true) ? true : false;
		}
	}

	public function getDataByIdMk($id)
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
		$this->db->where('nilai_mk.id_mk', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
}
