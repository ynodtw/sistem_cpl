<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_auth');
		$this->load->model('Model_mahasiswa');
		$this->load->model('Model_dosen');
		// if (empty($this->session->has_userdata("data_login"))) {
		// 	redirect("/");
		// }
	}

	public function index()
	{
		if ($this->session->has_userdata('data_login')) {
			redirect("/");
		}

		$data['tentang'] = $this->Model_tentang->getData()[0];

		$this->load->view('admin/auth/login', $data);
	}

	public function login()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$login = $this->Model_auth->login($username, $password);

		if ($login == FALSE) {
			echo "
            <script>
                alert('Login gagal! Periksa kembali username dan password anda.')
                history.back()
            </script>
            ";
			return false;
		}

		if ($_SESSION['data_login']['role'] == "mahasiswa") {
			$cek_nim_mhs = $this->Model_mahasiswa->checkNIM($_SESSION['data_login']['username']);
			if (empty($cek_nim_mhs)) {
				echo "
				<script>
					alert('Akses Ditolak!')
					window.location.href = '" . base_url("sign-out") . "';
				</script>
				";
				return false;
			}
		}

		if ($_SESSION['data_login']['role'] == "dosen") {
			$data_dosen = $this->Model_dosen->checkNID($_SESSION['data_login']['username']);
			if (empty($data_dosen)) {
				echo "
				<script>
					alert('Akses Ditolak!')
					window.location.href = '" . base_url("sign-out") . "';
				</script>
				";
				return false;
			}
		}



		redirect($_SERVER['HTTP_REFERER']);
	}

	public function logout()
	{
		$this->session->unset_userdata("data_login");
		redirect("/login");
	}
}
