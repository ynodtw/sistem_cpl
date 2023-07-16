<?php


if (!function_exists('uploadFile')) {
    function uploadFile($path, $file_name)
    {
        $ci = &get_instance();
        // $config['upload_path']          = './assets/img/';path
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 1000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        // $config['file_name']            = $_SESSION['data_login']['id'] . "-" . $_SESSION['data_login']['role'];path
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;

        $ci->load->library('upload', $config);

        if (!$ci->upload->do_upload('photo')) {
            $error = array('error' => $ci->upload->display_errors());

            echo "
            <script>
                alert('" . $error['error'] . "')
                history.back()
            </script>
            ";
            return false;
        }
        $uploaded_data = $ci->upload->data();
        return $uploaded_data;
    }
}
