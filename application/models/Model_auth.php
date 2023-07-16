<?php

class Model_Auth extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password)
    {
        $sql_getemail = "
		SELECT *
		FROM users
        WHERE email = '" . $email . "' AND status = 'active';
		";
        $user = $this->db->query($sql_getemail)->result_array();

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
            "email" => $user[0]['email'],
            "photo" => $user[0]['photo'],
            "role" => $user[0]['role']
        ];
        $this->session->set_userdata("data_login", $data_session);

        return TRUE;
    }
}
