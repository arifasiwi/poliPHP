<?php
$module=$_GET['module'];

switch($module) {
    case 'home':
        include 'home.php';
    break;
    case 'poli':
        include 'modules/poli/poli-index.php';
    break;
    case 'poli-edit':
        include 'modules/poli/poli-edit.php';
    break;
    case 'pasien':
        include 'modules/pasien/pasien-index.php';
    break;  
    case 'pegawai':
        include 'modules/pegawai/pegawai-index.php';
    break;  
    case 'dokter':
        include 'modules/dokter/dokter-index.php';
    break;  
    case 'jadwal':
        include 'modules/jadwal/jadwal-index.php';
    break;  
    case 'biaya':
        include 'modules/biaya/biaya-index.php';
    break;  
    case 'pendaftaran':
        include 'modules/pendaftaran/pendaftaran-index.php';
    break;  
    case 'pemeriksaan':
        include 'modules/pemeriksaan/pemeriksaan-index.php';
    break;  
    case 'obat':
        include 'modules/obat/obat-index.php';
    break;  
    case 'resep':
        include 'modules/resep/resep-index.php';
    break;  
    default: include'home.php';  
}
?>