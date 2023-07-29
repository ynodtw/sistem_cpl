<?php

class Model_mahasiswa extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		if ($data) {
			$insert = $this->db->insert('mahasiswa', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function getData($id = "")
	{
		$this->db->select('mahasiswa.*,
		mahasiswa.mhs_nim,
		mahasiswa.mhs_nama,
		fakultas.fk_nama,
		prodi.prd_jurusan,
		dosen.dsn_nama');
		$this->db->from('mahasiswa')->order_by('mhs_nim', 'ASC');
		// $this->db->from('fakultas');

		$this->db->join('fakultas', 'fakultas.id = mahasiswa.fk_id');
		$this->db->join('prodi', 'prodi.id = mahasiswa.prd_id');
		$this->db->join('dosen', 'dosen.id = mahasiswa.dsn_id');
		if ($id != "") {
			$this->db->where('mahasiswa.id', $id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDataById($id)
	{
		$this->db->select('mahasiswa.*,
		mahasiswa.mhs_nim,
		mahasiswa.mhs_nama,
		fakultas.fk_nama,
		prodi.prd_jurusan,
		dosen.dsn_nama');
		$this->db->from('mahasiswa');

		$this->db->join('fakultas', 'fakultas.id = mahasiswa.fk_id');
		$this->db->join('prodi', 'prodi.id = mahasiswa.prd_id');
		$this->db->join('dosen', 'dosen.id = mahasiswa.dsn_id');
		$this->db->where('mahasiswa.id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function checkNIM($mhs_nim)
	{
		$sql = "
		SELECT mhs_nim, id
		FROM mahasiswa
		WHERE mhs_nim = '" . $mhs_nim . "';
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}



	// public function getSearch($nik = "", $nama = "", $telp = "", $tgl_datang = "", $tgl_pulang = "")
	// {
	// 	$sql = "
	//           SELECT *
	//           FROM mahasiswa
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
			$update = $this->db->update('mahasiswa', $data);
			return ($update == true) ? true : false;
		}
	}

	public function delete($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('mahasiswa');
			return ($delete == true) ? true : false;
		}
	}

	public function getChartCpl($mhs_nim)
	{
		$this->db->select('mahasiswa.id,
		mahasiswa.mhs_nim,
		mahasiswa.mhs_nama,
		cpl.cpl_kd,
		cpl.cpl_kategori');
		$this->db->from('mahasiswa');

		$this->db->join('nilai_mk', 'nilai_mk.id_mhs = mahasiswa.id');
		$this->db->join('cplmk', 'cplmk.id_nilai_mk = nilai_mk.id');
		$this->db->join('cpl', 'cplmk.id_cpl = cpl.id');
		$this->db->where('mahasiswa.mhs_nim', $mhs_nim);
		$this->db->group_by('cpl.cpl_kategori, cpl.cpl_kd');
		$query = $this->db->get();
		return $query->result_array();
	}
}
