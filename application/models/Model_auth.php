<?php

class Model_Auth extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_mahasiswa');
    }

    public function login($username, $password)
    {
        $sql_getusername = "
		SELECT *
		FROM users
        WHERE username = '" . $username . "' AND status = 'active';
		";
        $user = $this->db->query($sql_getusername)->result_array();

        if (empty($user)) {
            return FALSE;
        }

        // cek apakah passwordnya benar?
        if (!password_verify($password, $user[0]['password'])) {
            return FALSE;
        }

        $data_session = [
            "id" => $user[0]['id'],
            "fullname" => $user[0]['fullname'],
            "username" => $user[0]['username'],
            "photo" => $user[0]['photo'],
            "role" => $user[0]['role']
        ];
        $this->session->set_userdata("data_login", $data_session);

        return TRUE;
    }


    // public function getUserData($username)
    // {
    //     $this->db->select('nilai_mhs.*');
    //     $this->db->from('nilai_');

    //     $this->db->join('mahasiswa', 'mahasiswa.nim = users.username');
    //     $this->db->where('users.username', $username);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
}
