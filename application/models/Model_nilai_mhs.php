<?php

class Model_nilai_mhs extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_mahasiswa');
		$this->load->model('Model_users');
	}

	public function getData()
	{
		$this->db->select('nilai_mhs.*');
		$this->db->from('nilai_');

		$this->db->join('matakuliah', 'matakuliah.id = nilai_mhs.id_mk');
		$this->db->join('mahasiswa', 'mahasiswa.id = nilai_mhs.id_mhs');
		$this->db->where('nilai_mhs.id_mhs', $id_mhs);
		$query = $this->db->get();
		return $query->result_array();
	}
}
