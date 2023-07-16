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

//CONTROLLER jurusan
$route['data-jurusan'] = 'jurusan';
$route['data-jurusan/add'] = 'jurusan/add';
$route['data-jurusan/edit/(:num)'] = 'jurusan/edit/$1';








// CONTROLLER TAMU
$route['data-tamu-lapor'] = 'tamu/add';
$route['laporan-data-tamu'] = 'tamu';
$route['laporan-data-tamu/edit/(:num)'] = 'tamu/edit/$1';
