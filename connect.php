<?php
$host	= "localhost";
$user	= "root";
$pass	= "";
$db		= "07_arifasiwi_poliklinik";
$koneksi	= mysqli_connect($host, $user, $pass, $db);
if(mysqli_connect_errno()){
	echo "Gagal Terhubung".mysqli_connect_error();
}
?>