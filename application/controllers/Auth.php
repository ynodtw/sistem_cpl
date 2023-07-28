<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tentang');
		$this->load->model('Model_auth');
		if (empty($this->session->userdata("data_login"))) {
			redirect(site_url(), 'refresh');
		}
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
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function logout()
	{
		$this->session->unset_userdata("data_login");
		redirect("/login");
	}
}
