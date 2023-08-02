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

	public function getData()
	{
		$this->db->select('kelas.*,
		dosen.dsn_nid,
		dosen.dsn_nama,
		fakultas.fk_nama,
		prodi.prd_jurusan,
		matakuliah.mk_nama,
		matakuliah.mk_kd');
		$this->db->from('kelas');

		$this->db->join('fakultas', 'fakultas.id = kelas.prd_id');
		$this->db->join('prodi', 'prodi.id = kelas.prd_id');
		$this->db->join('dosen', 'dosen.id = kelas.dsn_id');
		$this->db->join('matakuliah', 'matakuliah.id = kelas.mk_id');
		// if ($id != "") {
		// 	$this->db->where('kelas.id', $id);
		// }
		$query = $this->db->get();
		return $query->result_array();
	}

	// public function getDataById($id)
	// {
	// 	$this->db->select('kelas.*,
	// 	kelas.mhs_nim,
	// 	kelas.mhs_nama,
	// 	fakultas.fk_nama,
	// 	prodi.prd_jurusan,
	// 	dosen.dsn_nama');
	// 	$this->db->from('kelas')->order_by('mhs_nim', 'ASC');

	// 	$this->db->join('fakultas', 'fakultas.id = kelas.fk_id');
	// 	$this->db->join('prodi', 'prodi.id = kelas.prd_id');
	// 	$this->db->join('dosen', 'dosen.id = kelas.dsn_id');
	// 	$this->db->where('kelas.id', $id);
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	// public function getDataByProdi($id)
	// {
	// 	$this->db->select('kelas.*,
	// 	kelas.mhs_nim,
	// 	kelas.mhs_nama,
	// 	fakultas.fk_nama,
	// 	prodi.prd_jurusan,
	// 	dosen.dsn_nama');
	// 	$this->db->from('kelas')->order_by('mhs_nim', 'ASC');

	// 	$this->db->join('fakultas', 'fakultas.id = kelas.fk_id');
	// 	$this->db->join('prodi', 'prodi.id = kelas.prd_id');
	// 	$this->db->join('dosen', 'dosen.id = kelas.dsn_id');
	// 	$this->db->where('kelas.prd_id', $id);
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	// public function getDataByJurusan($id)
	// {
	// 	$this->db->select('kelas.*,
	// 	kelas.mhs_nim,
	// 	kelas.mhs_nama,
	// 	dosen.dsn_nama,
	// 	prodi.prd_kd,
	// 	fakultas.fk_nama,
	// 	prodi.prd_jurusan');
	// 	$this->db->from('kelas')->order_by('mhs_nim', 'ASC');
	// 	$this->db->join('fakultas', 'fakultas.id = kelas.fk_id');
	// 	$this->db->join('prodi', 'prodi.id = kelas.prd_id');
	// 	$this->db->join('dosen', 'dosen.id = kelas.dsn_id');
	// 	$this->db->where('kelas.fk_id', $id);
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	// public function checkNIM($mhs_nim)
	// {
	// 	$sql = "
	// 	SELECT *
	// 	FROM kelas
	// 	WHERE mhs_nim = '" . $mhs_nim . "';
	// 	";
	// 	$query = $this->db->query($sql);
	// 	return $query->result_array();
	// }

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

	// public function getChartCpl($mhs_nim)
	// {
	// 	$sql = "
	// 	SELECT cpl_kategori, COUNT(cpl_kategori) AS cpl_ambil
	// 	FROM (
	// 		SELECT 
	// 		  `kelas`.`id`, 
	// 		  `kelas`.`mhs_nim`, 
	// 		  `kelas`.`mhs_nama`, 
	// 		  `cpl`.`cpl_kd`, 
	// 		  `cpl`.`cpl_kategori` 
	// 		FROM 
	// 		  `kelas` 
	// 		  JOIN `nilai_mk` ON `nilai_mk`.`id_mhs` = `kelas`.`id` 
	// 		  JOIN `cplmk` ON `cplmk`.`id_nilai_mk` = `nilai_mk`.`id` 
	// 		  JOIN `cpl` ON `cplmk`.`id_cpl` = `cpl`.`id` 
	// 		WHERE 
	// 		  `kelas`.`mhs_nim` = '" . $mhs_nim . "' 
	// 		GROUP BY 
	// 		  `cpl`.`cpl_kategori`, 
	// 		  `cpl`.`cpl_kd`
	// 	) AS DATA
	// 	GROUP BY cpl_kategori		
	// 	";
	// 	$query = $this->db->query($sql);
	// 	return $query->result_array();
	// }

	// public function getChartSks($mhs_nim)
	// {
	// 	$sql = "
	// 	SELECT 
	// 	  SUM(matakuliah.mk_sks) AS sks
	// 	FROM 
	// 	  `kelas` 
	// 	JOIN `nilai_mk` ON `nilai_mk`.`id_mhs` = `kelas`.`id` 
	// 	JOIN `matakuliah` ON `nilai_mk`.`id_mk` = `matakuliah`.`id` 
	// 	WHERE 
	// 	  `kelas`.`mhs_nim` = '" . $mhs_nim . "' 
	// 	GROUP BY `kelas`.`mhs_nim`;	
	// 	";
	// 	$query = $this->db->query($sql);
	// 	return $query->result_array();
	// }
}
