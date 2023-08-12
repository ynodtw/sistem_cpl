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
		dosen.dsn_nama,
		users.username');
		$this->db->from('users');

		$this->db->join('mahasiswa', 'mahasiswa.mhs_nim = users.username');
		$this->db->join('fakultas', 'fakultas.id = mahasiswa.fk_id');
		$this->db->join('prodi', 'prodi.id = mahasiswa.prd_id');
		$this->db->join('dosen', 'dosen.id = mahasiswa.dsn_id');
		if ($id != "") {
			$this->db->where('mahasiswa.id', $id);
		}
		$this->db->group_by('mahasiswa.mhs_nim');
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
		$this->db->from('mahasiswa')->order_by('mhs_nim', 'ASC');

		$this->db->join('fakultas', 'fakultas.id = mahasiswa.fk_id');
		$this->db->join('prodi', 'prodi.id = mahasiswa.prd_id');
		$this->db->join('dosen', 'dosen.id = mahasiswa.dsn_id');
		$this->db->where('mahasiswa.id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDataByProdi($id)
	{
		$this->db->select('mahasiswa.*,
		mahasiswa.mhs_nim,
		mahasiswa.mhs_nama,
		fakultas.fk_nama,
		prodi.prd_jurusan,
		dosen.dsn_nama');
		$this->db->from('mahasiswa')->order_by('mhs_nim', 'ASC');

		$this->db->join('fakultas', 'fakultas.id = mahasiswa.fk_id');
		$this->db->join('prodi', 'prodi.id = mahasiswa.prd_id');
		$this->db->join('dosen', 'dosen.id = mahasiswa.dsn_id');
		$this->db->where('mahasiswa.prd_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDataByJurusan($id)
	{
		$this->db->select('mahasiswa.*,
		mahasiswa.mhs_nim,
		mahasiswa.mhs_nama,
		dosen.dsn_nama,
		prodi.prd_kd,
		fakultas.fk_nama,
		prodi.prd_jurusan');
		$this->db->from('mahasiswa')->order_by('mhs_nim', 'ASC');
		$this->db->join('fakultas', 'fakultas.id = mahasiswa.fk_id');
		$this->db->join('prodi', 'prodi.id = mahasiswa.prd_id');
		$this->db->join('dosen', 'dosen.id = mahasiswa.dsn_id');
		$this->db->where('mahasiswa.fk_id', $id);
		$this->db->group_by('mahasiswa.mhs_nim');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function checkNIM($mhs_nim)
	{
		$sql = "
		SELECT *
		FROM mahasiswa
		WHERE mhs_nim = '" . $mhs_nim . "';
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

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
		$sql = "
		SELECT cpl_kategori, COUNT(cpl_kategori) AS cpl_ambil
		FROM (
			SELECT 
			  `mahasiswa`.`id`, 
			  `mahasiswa`.`mhs_nim`, 
			  `mahasiswa`.`mhs_nama`, 
			  `cpl`.`cpl_kd`, 
			  `cpl`.`cpl_kategori` 
			FROM 
			  `mahasiswa` 
			  JOIN `nilai_mk` ON `nilai_mk`.`id_mhs` = `mahasiswa`.`id` 
			  JOIN `cplmk` ON `cplmk`.`id_nilai_mk` = `nilai_mk`.`id` 
			  JOIN `cpl` ON `cplmk`.`id_cpl` = `cpl`.`id` 
			WHERE 
			  `mahasiswa`.`mhs_nim` = '" . $mhs_nim . "' 
			GROUP BY 
			  `cpl`.`cpl_kategori`, 
			  `cpl`.`cpl_kd`
		) AS DATA
		GROUP BY cpl_kategori		
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getChartSks($mhs_nim)
	{
		$sql = "
		SELECT 
		  SUM(matakuliah.mk_sks) AS sks
		FROM 
		  `mahasiswa` 
		JOIN `nilai_mk` ON `nilai_mk`.`id_mhs` = `mahasiswa`.`id` 
		JOIN `matakuliah` ON `nilai_mk`.`id_mk` = `matakuliah`.`id` 
		WHERE 
		  `mahasiswa`.`mhs_nim` = '" . $mhs_nim . "' 
		GROUP BY `mahasiswa`.`mhs_nim`;	
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
