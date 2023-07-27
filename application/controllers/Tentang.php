<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_tentang');
        if (!$this->session->has_userdata('data_login')) {
            redirect("/login");
        }
    }

    public function index()
    {
        $data['tentang'] = $this->Model_tentang->getData()[0];

        $data['page'] = "admin/tentang/index";
        $data['title'] = "Tentang";
        $this->load->view('admin/template', $data);
    }

    public function update()
    {
        $nama_aplikasi = $this->input->post("nama_aplikasi");
        $tentang_aplikasi = $this->input->post("tentang_aplikasi");
        $photo = $_FILES;

        if ($photo["photo"]['name'] != "") {
            $tentang = $this->Model_tentang->getData()[0];
            unlink("assets/img/" . $tentang["logo_aplikasi"]);


            $path = './assets/img/';
            $file_name = rand(11111111, 99999999);
            $uploaded_data = uploadFile($path, $file_name);
            $data_insert['logo_aplikasi'] = $uploaded_data['file_name'];
        }

        $data_insert['nama_aplikasi'] = $nama_aplikasi;
        $data_insert['tentang_aplikasi'] = $tentang_aplikasi;


        $insert = $this->Model_tentang->update($data_insert);

        if ($insert) {
            $this->session->set_flashdata('msg', 'Sukses Update Data');
            redirect(base_url("/tentang"));
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
}
