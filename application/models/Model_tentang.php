<?php

class Model_Tentang extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /* get the brand data */
    public function getData()
    {
        $sql = "
		SELECT *
		FROM tentang
        WHERE id = '1';
		";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function update($data)
    {
        if ($data) {
            $this->db->where('id', "1");
            $update = $this->db->update('tentang', $data);
            return ($update == true) ? true : false;
        }
    }
}
