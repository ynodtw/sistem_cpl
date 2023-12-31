<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_tentang');
        $this->load->model('Model_users');
        if (!$this->session->has_userdata('data_login')) {
            redirect("/login");
        }
    }

    public function index()
    {
        $data['tentang'] = $this->Model_tentang->getData()[0];
        $data['users'] = $this->Model_users->getData();
        $data['page'] = "admin/users/index";
        $data['title'] = "Data User/Hak Akses";
        // echo '<pre>';
        // print_r($data);
        // die;
        $this->load->view('admin/template', $data);
    }

    public function biodata($id)
    {
        $data['tentang'] = $this->Model_tentang->getData()[0];
        $data['users'] = $this->Model_users->getData($id)[0];
        $data['page'] = "admin/users/biodata";
        $data['title'] = "Biodata";
        // echo '<pre>';
        // print_r($data);
        // die;
        $this->load->view('admin/template', $data);
    }

    public function updateBiodata()
    {
        $id = $this->input->post("id");
        $fullname = $this->input->post("fullname");
        $nik = $this->input->post("nik");
        $tempat_lahir = $this->input->post("tempat_lahir");
        $tgl_lahir = $this->input->post("tgl_lahir");
        $agama = $this->input->post("agama");
        $kewarganegaraan = $this->input->post("kewarganegaraan");
        $gender = $this->input->post("gender");
        $no_telp = $this->input->post("no_telp");
        $photo = $_FILES;

        if ($photo["photo"]['name'] != "") {
            $path = './assets/img/';
            $file_name = $_SESSION['data_login']['id'] . "-" . $_SESSION['data_login']['role'];
            $uploaded_data = uploadFile($path, $file_name);
            $data_update['photo'] = $uploaded_data['file_name'];
        }

        $data_update["fullname"] = $fullname;
        $data_update["nik"] = $nik;
        $data_update["tempat_lahir"] = $tempat_lahir;
        $data_update["tgl_lahir"] = $tgl_lahir;
        $data_update["agama"] = $agama;
        $data_update["kewarganegaraan"] = $kewarganegaraan;
        $data_update["gender"] = $gender;
        $data_update["no_telp"] = $no_telp;
        $data_update["updated_by"] = $_SESSION['data_login']['id'];
        $data_update["updated_at"] = date("Y-m-d H:i:s");

        // echo '<pre>';
        // print_r($data_update);
        // die;

        $update = $this->Model_users->update($id, $data_update);

        if ($update) {
            $this->session->set_flashdata('msg', 'Sukses Ubah Data');
            redirect(base_url("/users/biodata/" . $id));
        } else {
            echo "
            <script>
                alert('Gagal update data!')
                history.back()
            </script>
            ";
            return false;
        }
    }

    public function add()
    {
        $data['tentang'] = $this->Model_tentang->getData()[0];
        $data['page'] = "admin/users/add";
        $data['title'] = "Data User/Hak Akses";
        $this->load->view('admin/template', $data);
    }

    public function insert()
    {
        $username = $this->input->post("username");
        $fullname = $this->input->post("fullname");
        $status = $this->input->post("status");
        $role = $this->input->post("role");
        $password = $this->input->post("password");
        $password2 = $this->input->post("password2");

        $cek_username = $this->Model_users->checkUsername($username);

        if (!empty($cek_username)) {
            echo "
            <script>
                alert('username sudah digunakan!')
                history.back()
            </script>
            ";
            return false;
        }

        if ($password != $password2) {
            echo "
            <script>
                alert('Password tidak sesuai!')
                history.back()
            </script>
            ";
            return false;
        }

        $path = './assets/img/';
        $file_name = $_SESSION['data_login']['id'] . "-" . $_SESSION['data_login']['role'];

        $uploaded_data = uploadFile($path, $file_name);

        $data_insert = [
            "username" => $username,
            "fullname" => $fullname,
            "status" => $status,
            "role" => $role,
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "photo" => $uploaded_data['file_name'],
            "created_by" => $_SESSION['data_login']['id']
        ];

        // echo '<pre>';
        // print_r($data_insert);
        // die;

        $insert = $this->Model_users->insert($data_insert);

        if ($insert) {
            $this->session->set_flashdata('msg', 'Sukses Insert Data');
            redirect(base_url("/users"));
        } else {
            echo "
            <script>
                alert('Gagal insert data!')
                history.back()
            </script>
            ";
            return false;
        }
    }

    public function edit($id)
    {
        $data['tentang'] = $this->Model_tentang->getData()[0];
        $data['users'] = $this->Model_users->getData($id)[0];
        $data['page'] = "admin/users/edit";
        $data['title'] = "Data User/Hak Akses";
        // echo '<pre>';
        // print_r($data);
        // die;
        $this->load->view('admin/template', $data);
    }

    public function update()
    {
        $username = $this->input->post("username");
        $fullname = $this->input->post("fullname");
        $status = $this->input->post("status");
        $role = $this->input->post("role");
        $id = $this->input->post("id");
        $photo = $_FILES;

        if ($photo["photo"]['name'] != "") {
            $path = './assets/img/';
            $file_name = $_SESSION['data_login']['id'] . "-" . $_SESSION['data_login']['role'];
            $uploaded_data = uploadFile($path, $file_name);
            $data_update['photo'] = $uploaded_data['file_name'];
        }

        $data_update["username"] = $username;
        $data_update["fullname"] = $fullname;
        $data_update["status"] = $status;
        $data_update["role"] = $role;
        $data_update["updated_by"] = $_SESSION['data_login']['id'];
        $data_update["updated_at"] = date("Y-m-d H:i:s");

        // echo '<pre>';
        // print_r($data_update);
        // die;

        $update = $this->Model_users->update($id, $data_update);

        if ($update) {
            $this->session->set_flashdata('msg', 'Sukses Ubah Data');
            redirect(base_url("/users"));
        } else {
            echo "
            <script>
                alert('Gagal update data!')
                history.back()
            </script>
            ";
            return false;
        }
    }

    public function updatePassword()
    {
        $id = $this->input->post("id");
        $password = $this->input->post("password");
        $password2 = $this->input->post("password2");

        if ($password != $password2) {
            echo "
            <script>
                alert('Password tidak sesuai!')
                history.back()
            </script>
            ";
            return false;
        }

        $data_insert['password'] = password_hash($password, PASSWORD_DEFAULT);

        $update = $this->Model_users->update($id, $data_insert);

        if ($update) {
            $this->session->set_flashdata('msg', 'Sukses Ubah Data');
            redirect(base_url("/users"));
        } else {
            echo "
            <script>
                alert('Gagal update data!')
                history.back()
            </script>
            ";
            return false;
        }
    }

    public function delete($id)
    {
        // $user = $this->Model_users->getData($id)[0];
        // unlink("assets/img/" . $user["photo"]);
        $this->Model_users->delete($id);

        $this->session->set_flashdata('msg', 'Sukses Hapus Data');
        redirect(base_url("/users"));
    }
}
