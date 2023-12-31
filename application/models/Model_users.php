<?php

class Model_Users extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function checkUsername($username)
  {
    $sql = "
		SELECT username
		FROM users
		WHERE username = '" . $username . "';
		";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function insert($data)
  {
    if ($data) {
      $insert = $this->db->insert('users', $data);
      return ($insert == true) ? true : false;
    }
  }

  public function getData($id = "")
  {

    if ($id != "") {
      $sql = "
            SELECT *
            FROM users
            WHERE id = '" . $id . "'
            ORDER BY username ASC;
            ";
    } else {
      $sql = "
            SELECT *
            FROM users
            ORDER BY username ASC;
            ";
    }

    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function update($id, $data)
  {
    if ($data && $id) {
      $this->db->where('id', $id);
      $update = $this->db->update('users', $data);
      return ($update == true) ? true : false;
    }
  }

  public function delete($id)
  {
    if ($id) {
      $this->db->where('id', $id);
      $delete = $this->db->delete('users');
      return ($delete == true) ? true : false;
    }
  }
}
