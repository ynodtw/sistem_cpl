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
