<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// CONTROLLER AUTH
$route['login'] = 'auth';
$route['sign-in'] = 'auth/login';
$route['sign-out'] = 'auth/logout';

//CONTROLLER CPL
$route['data-cpl'] = 'cpl';
$route['data-cpl/add'] = 'cpl/add';
$route['data-cpl/edit/(:num)'] = 'cpl/edit/$1';

//CONTROLLER MAHASISWA
$route['data-mahasiswa'] = 'mahasiswa';
$route['data-mahasiswa/daftar'] = 'mahasiswa/daftar';
$route['data-mahasiswa/add'] = 'mahasiswa/add';
$route['data-mahasiswa/edit/(:num)'] = 'mahasiswa/edit/$1';

//CONTROLLER DOSEN
$route['data-dosen'] = 'dosen';
$route['data-dosen/add'] = 'dosen/add';
$route['data-dosen/edit/(:num)'] = 'dosen/edit/$1';

//CONTROLLER PRODI
$route['data-prodi'] = 'prodi';
$route['data-prodi/add'] = 'prodi/add';
$route['data-prodi/edit/(:num)'] = 'prodi/edit/$1';

//CONTROLLER MATAKULIAH
$route['data-matakuliah'] = 'matakuliah';
$route['data-matakuliah/add'] = 'matakuliah/add';
$route['data-matakuliah/edit/(:num)'] = 'matakuliah/edit/$1';

//CONTROLLER NILAI MATAKULIAH
$route['data-nilai-matakuliah/(:num)'] = 'nilai_mk/index/$1';
$route['data-nilai-matakuliah/daftar/(:num)'] = 'nilai_mk/daftar/$1';
$route['data-nilai-matakuliah/add/(:num)'] = 'nilai_mk/add/$1';
$route['data-nilai-matakuliah/edit/(:num)'] = 'nilai_mk/edit/$1';

//CONTROLLER CPLMK
$route['data-cplmk/(:num)'] = 'cplmk/index/$1';
$route['data-cplmk/daftar/(:num)'] = 'cplmk/daftar/$1';
$route['data-cplmk/add/(:num)'] = 'cplmk/add/$1';
$route['data-cplmk/edit/(:num)'] = 'cplmk/edit/$1';

//CONTROLLER NILAI CPL
$route['data-nilai-cpl/(:num)'] = 'nilai_cpl/index/$1';
$route['data-nilai-cpl/add/(:num)'] = 'nilai_cpl/add/$1';
$route['data-nilai-cpl/edit/(:num)'] = 'nilai_cpl/edit/$1';

//CONTROLLER KELAS
$route['data-kelas'] = 'kelas';
$route['data-kelas/add'] = 'kelas/add';
$route['data-kelas/edit/(:num)'] = 'kelas/edit/$1';

//CONTROLLER NILAI
$route['data-nilai-chart/(:num)'] = 'nilai/chart/$1';




// CONTROLLER TAMU
$route['data-tamu-lapor'] = 'tamu/add';
$route['laporan-data-tamu'] = 'tamu';
$route['laporan-data-tamu/edit/(:num)'] = 'tamu/edit/$1';
