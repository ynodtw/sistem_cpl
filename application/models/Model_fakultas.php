<?php

class Model_fakultas extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		if ($data) {
			$insert = $this->db->insert('fakultas', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function getData($id = "")
	{
		$this->db->select('fakultas.*');
		$this->db->from('fakultas');
		if ($id != "") {
			$this->db->where('fakultas.id', $id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}


	public function checkFakultas($fk_nama)
	{
		$sql = "
		SELECT fk_nama
		FROM fakultas
		WHERE fk_nama = '" . $fk_nama . "';
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function update($id, $data)
	{
		if ($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('fakultas', $data);
			return ($update == true) ? true : false;
		}
	}

	public function delete($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('fakultas');
			return ($delete == true) ? true : false;
		}
	}
}
