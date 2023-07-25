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
$route['data-mahasiswa/add'] = 'mahasiswa/add';
$route['data-mahasiswa/edit/(:num)'] = 'mahasiswa/edit/$1';

//CONTROLLER DOSEN
$route['data-dosen'] = 'dosen';
$route['data-dosen/add'] = 'dosen/add';
$route['data-dosen/edit/(:num)'] = 'dosen/edit/$1';

//CONTROLLER JURUSAN
$route['data-jurusan'] = 'jurusan';
$route['data-jurusan/add'] = 'jurusan/add';
$route['data-jurusan/edit/(:num)'] = 'jurusan/edit/$1';

//CONTROLLER MATAKULIAH
$route['data-matakuliah'] = 'matakuliah';
$route['data-matakuliah/add'] = 'matakuliah/add';
$route['data-matakuliah/edit/(:num)'] = 'matakuliah/edit/$1';

//CONTROLLER NILAI MATAKULIAH
$route['data-nilai-matakuliah/(:num)'] = 'nilai_mk/index/$1';
$route['data-nilai-matakuliah/add/(:num)'] = 'nilai_mk/add/$1';
$route['data-nilai-matakuliah/edit/(:num)'] = 'nilai_mk/edit/$1';

//CONTROLLER CPLMK
$route['data-cplmk/(:num)'] = 'cplmk/index/$1';
$route['data-cplmk/add/(:num)'] = 'cplmk/add/$1';
$route['data-cplmk/edit/(:num)'] = 'cplmk/edit/$1';

//CONTROLLER NILAI CPL
$route['data-nilai-cpl/(:num)'] = 'nilai_cpl/index/$1';
$route['data-nilai-cpl/add/(:num)'] = 'nilai_cpl/add/$1';
$route['data-nilai-cpl/edit/(:num)'] = 'nilai_cpl/edit/$1';

//CONTROLLER NILAI
$route['daftar-nilai/(:num)'] = 'nilai/index/';
$route['daftar-nilai/add/(:num)'] = 'nilai/add/$1';
$route['daftar-nilai/edit/(:num)'] = 'nilai/edit/$1';





// CONTROLLER TAMU
$route['data-tamu-lapor'] = 'tamu/add';
$route['laporan-data-tamu'] = 'tamu';
$route['laporan-data-tamu/edit/(:num)'] = 'tamu/edit/$1';
