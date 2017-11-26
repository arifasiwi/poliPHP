<?php

// cek apakah module sudah ada apa belum diparameter
$module = empty($_GET['module']) ? 'home' : $_GET['module'];

switch($module) {
    // Module Home
    case 'home':
    include 'home.php';
    break;
    
    // Module Login
    case 'login':
    include 'login.php';
    break;

    // Module LogOut
    case 'logout':
    include 'logout.php';
    break;

    // Module Poli
    case 'poli':
        include 'modules/poli/poli-index.php';
    break;
    case 'poli-create':
        include 'modules/poli/poli-create.php';
    break;
    case 'poli-edit':
        include 'modules/poli/poli-edit.php';
    break;
    case 'poli-delete':
        include 'modules/poli/poli-delete.php';
    break;
    case 'poli-show':
        include 'modules/poli/poli-edit.php';
    break;

    // Module Pasien
    case 'pasien':
    include 'modules/pasien/pasien-index.php';
    break;
    case 'pasien-create':
        include 'modules/pasien/pasien-create.php';
    break;
    case 'pasien-edit':
        include 'modules/pasien/pasien-edit.php';
    break;
    case 'pasien-delete':
        include 'modules/pasien/pasien-delete.php';
    break;
    case 'pasien-show':
        include 'modules/pasien/pasien-edit.php';
    break;  

    // Module Pegawai
    case 'pegawai':
    include 'modules/pegawai/pegawai-index.php';
    break;
    case 'pegawai-create':
        include 'modules/pegawai/pegawai-create.php';
    break;
    case 'pegawai-edit':
        include 'modules/pegawai/pegawai-edit.php';
    break;
    case 'pegawai-delete':
        include 'modules/pegawai/pegawai-delete.php';
    break;
    case 'pegawai-show':
        include 'modules/pegawai/pegawai-edit.php';
    break;  

    // Module Dokter
    case 'dokter':
    include 'modules/dokter/dokter-index.php';
    break;
    case 'dokter-create':
        include 'modules/dokter/dokter-create.php';
    break;
    case 'dokter-edit':
        include 'modules/dokter/dokter-edit.php';
    break;
    case 'dokter-delete':
        include 'modules/dokter/dokter-delete.php';
    break;
    case 'dokter-show':
        include 'modules/dokter/dokter-edit.php';
    break;

    // Module Jadwal
    case 'jadwal':
    include 'modules/jadwal/jadwal-index.php';
    break;
    case 'jadwal-create':
        include 'modules/jadwal/jadwal-create.php';
    break;
    case 'jadwal-edit':
        include 'modules/jadwal/jadwal-edit.php';
    break;
    case 'jadwal-delete':
        include 'modules/jadwal/jadwal-delete.php';
    break;
    case 'jadwal-show':
        include 'modules/jadwal/jadwal-edit.php';
    break;
    
    // Module Biaya
    case 'biaya':
    include 'modules/biaya/biaya-index.php';
    break;
    case 'biaya-create':
        include 'modules/biaya/biaya-create.php';
    break;
    case 'biaya-edit':
        include 'modules/biaya/biaya-edit.php';
    break;
    case 'biaya-delete':
        include 'modules/biaya/biaya-delete.php';
    break;
    case 'biaya-show':
        include 'modules/biaya/biaya-edit.php';
    break;  

    // Module Pendaftaran
    case 'pendaftaran':
    include 'modules/pendaftaran/pendaftaran-index.php';
    break;
    case 'pendaftaran-create':
        include 'modules/pendaftaran/pendaftaran-create.php';
    break;
    case 'pendaftaran-edit':
        include 'modules/pendaftaran/pendaftaran-edit.php';
    break;
    case 'pendaftaran-delete':
        include 'modules/pendaftaran/pendaftaran-delete.php';
    break;
    case 'pendaftaran-show':
        include 'modules/pendaftaran/pendaftaran-edit.php';
    break;  

    // Module Pemeriksaan
    case 'pemeriksaan':
    include 'modules/pemeriksaan/pemeriksaan-index.php';
    break;
    case 'pemeriksaan-create':
        include 'modules/pemeriksaan/pemeriksaan-create.php';
    break;
    case 'pemeriksaan-edit':
        include 'modules/pemeriksaan/pemeriksaan-edit.php';
    break;
    case 'pemeriksaan-delete':
        include 'modules/pemeriksaan/pemeriksaan-delete.php';
    break;
    case 'pemeriksaan-show':
        include 'modules/pemeriksaan/pemeriksaan-edit.php';
    break;  

    
    // Module Obat
    case 'obat':
    include 'modules/obat/obat-index.php';
    break;
    case 'obat-create':
        include 'modules/obat/obat-create.php';
    break;
    case 'obat-edit':
        include 'modules/obat/obat-edit.php';
    break;
    case 'obat-delete':
        include 'modules/obat/obat-delete.php';
    break;
    case 'obat-show':
        include 'modules/obat/obat-edit.php';
    break;  
  

    // Module Resep
    case 'resep':
    include 'modules/resep/resep-index.php';
    break;
    case 'resep-create':
        include 'modules/resep/resep-create.php';
    break;
    case 'resep-edit':
        include 'modules/resep/resep-edit.php';
    break;
    case 'resep-delete':
        include 'modules/resep/resep-delete.php';
    break;
    case 'resep-show':
        include 'modules/resep/resep-show.php';
    break;
    case 'resep-obat':
    include 'modules/resep/resep-obat.php';
    break;  
  

    // Jika module tidak ditemukan maka di redirect ke home 
    default: include'home.php';  
}
?>