<?php

class Model_cpl extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		if ($data) {
			$insert = $this->db->insert('cpl', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function getData($id = "")
	{

		$this->db->select('cpl.*');
		$this->db->from('cpl')->order_by('cpl_kd', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function checkCplKd($cpl_kd)
	{
		$sql = "
		SELECT cpl_kd
		FROM cpl
		WHERE cpl_kd = '" . $cpl_kd . "';
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getDataCplNilai($str_cpl, $mk_id)
	{
		$sql = "
		SELECT cpl_a.cpl_kd, cpl_a.cpl_kategori, cpl_a.cpl_deskripsi, cplmk.id, cplmk.n_cplmk, mahasiswa.mhs_nim, mahasiswa.mhs_nama
		FROM (SELECT * FROM cpl WHERE id IN (" . $str_cpl . ")) AS cpl_a
		LEFT JOIN cplmk ON cplmk.id_cpl = cpl_a.id
		LEFT JOIN nilai_mk ON cplmk.id_nilai_mk = nilai_mk.id
		LEFT JOIN mahasiswa ON nilai_mk.id_mhs = mahasiswa.id
		WHERE nilai_mk.id = " . $mk_id . ";
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getDataCpl($arr_id = "")
	{
		$this->db->select('cpl.*');
		$this->db->from('cpl');
		// $this->db->join('cplmk', 'cpl.id=cplmk.id_cpl');
		// $this->db->where('cplmk.id_nilai_mk', $id_nilai_mk);
		$this->db->where_in('cpl.id', $arr_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getCplTot()
	{
		$sql = "
		SELECT cpl_kategori, COUNT(cpl_kategori) AS cpl_tot
		FROM cpl
		GROUP BY cpl_kategori;
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function update($id, $data)
	{
		if ($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('cpl', $data);
			return ($update == true) ? true : false;
		}
	}

	public function delete($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('cpl');
			return ($delete == true) ? true : false;
		}
	}
}
