<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_tentang');
        $this->load->model('Model_tamu');
    }

    public function index()
    {
        $data['tentang'] = $this->Model_tentang->getData()[0];

        $nik = @$_GET['nik'];
        $nama = @$_GET['nama'];
        $telp = @$_GET['telp'];
        $tgl_datang = @$_GET['tgl_datang'];
        $tgl_pulang = @$_GET['tgl_pulang'];

        if ($nik != "" || $nama != "" || $telp != "" || $tgl_datang != "" || $tgl_pulang != "") {
            $data['tamu'] = $this->Model_tamu->getSearch($nik, $nama, $telp, $tgl_datang, $tgl_pulang);
        } else {
            $data['tamu'] = $this->Model_tamu->getData();
        }


        $data['page'] = "admin/tamu/index";
        $data['title'] = "Data Tamu";
        $this->load->view('admin/template', $data);
    }

    public function edit($id)
    {
        $data['tentang'] = $this->Model_tentang->getData()[0];
        $data['tamu'] = $this->Model_tamu->getData($id)[0];
        $data['page'] = "admin/tamu/edit";
        $data['title'] = "Data Tamu";
        $this->load->view('admin/template', $data);
    }

    public function update()
    {
        $id = $this->input->post("id");
        $nik = $this->input->post("nik");
        $nama = $this->input->post("nama");
        $telp = $this->input->post("telp");
        $tujuan = $this->input->post("tujuan");
        $alamat = $this->input->post("alamat");
        $tgl_datang = $this->input->post("tgl_datang");
        $tgl_pulang = $this->input->post("tgl_pulang");
        $photo = $_FILES;

        if ($photo["photo"]['name'] != "") {
            $user = $this->Model_tamu->getData($id)[0];
            unlink("assets/img/tamu/" . $user["photo"]);


            $path = './assets/img/tamu/';
            $file_name = $tgl_datang . "-" . $nik . "-" . rand(1, 999);
            $uploaded_data = uploadFile($path, $file_name);
            $data_insert['photo'] = $uploaded_data['file_name'];
        }

        $data_insert['nik'] = $nik;
        $data_insert['nama'] = $nama;
        $data_insert['telp'] = $telp;
        $data_insert['tujuan'] = $tujuan;
        $data_insert['alamat'] = $alamat;
        $data_insert['tgl_datang'] = $tgl_datang;
        $data_insert['tgl_pulang'] = $tgl_pulang;


        $insert = $this->Model_tamu->update($id, $data_insert);

        if ($insert) {
            $this->session->set_flashdata('msg', 'Sukses Update Data');
            redirect(base_url("/laporan-data-tamu"));
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
        $user = $this->Model_tamu->getData($id)[0];
        unlink("assets/img/tamu/" . $user["photo"]);
        $this->Model_tamu->delete($id);

        $this->session->set_flashdata('msg', 'Sukses Hapus Data');
        redirect(base_url("/laporan-data-tamu"));
    }

    public function add()
    {
        $data['tentang'] = $this->Model_tentang->getData()[0];
        $data['page'] = "admin/tamu/add";
        $data['title'] = "Data Tamu Lapor";
        $this->load->view('admin/template', $data);
    }

    public function insert()
    {
        $nik = $this->input->post("nik");
        $nama = $this->input->post("nama");
        $telp = $this->input->post("telp");
        $tgl_datang = $this->input->post("tgl_datang");
        $tgl_pulang = $this->input->post("tgl_pulang");
        $tujuan = $this->input->post("tujuan");
        $alamat = $this->input->post("alamat");

        $path = './assets/img/tamu/';
        $file_name = $tgl_datang . "-" . $nik . "-" . rand(1, 999);

        $uploaded_data = uploadFile($path, $file_name);

        $data_insert = [
            "nik" => $nik,
            "nama" => $nama,
            "telp" => $telp,
            "tgl_datang" => $tgl_datang,
            "tgl_pulang" => $tgl_pulang,
            "tujuan" => $tujuan,
            "alamat" => $alamat,
            "photo" => $uploaded_data['file_name']
        ];

        $insert = $this->Model_tamu->insert($data_insert);

        if ($insert) {
            $this->session->set_flashdata('msg', 'Sukses Insert Data');
            redirect(base_url("/laporan-data-tamu"));
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
}
