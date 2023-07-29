<?php

class Model_biodata extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		if ($data) {
			$insert = $this->db->insert('biodata', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function getData($users_id)
	{

		$this->db->select('biodata.*,
		users.*');
		$this->db->from('biodata');
		// $this->db->order_by('biodata.mk_smt', 'ASC');
		// $this->db->from('fakultas');

		$this->db->join('users', 'users.id = biodata.users_id');
		$this->db->where('biodata.users_id', $users_id);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function update($id, $data)
	{
		if ($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('biodata', $data);
			return ($update == true) ? true : false;
		}
	}

	public function delete($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('biodata');
			return ($delete == true) ? true : false;
		}
	}
}
