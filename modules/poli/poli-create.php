<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
</head>
<body>
	<a href="index.php" class="menu">BERANDA</a>
	<h2>FORM CREATE</h2>
	<form action="" method="POST">
	<table>
	    <tr>
			<td>Kode Poli</td>
			<td> : </td>
			<td><input type="text" name="kode"></td>
		</tr>
		<tr>
			<td>Nama </td>
			<td> : </td>
			<td><input type="text" name="nama"></td>
		</tr>
		<tr>
		<td></td>
		<td><input type="submit" name="tambah" value="Tambah">
		<button type="reset" value="Reset">Reset</button>
		</td>
		</tr>
	</table>
</form>
<?php 
require_once("database.php");
if(isset($_POST['tambah'])){
	$kode   = $_POST['kode'];
	$nama   = $_POST['nama'];
	$db=new Database();
	$db->insert('poli',array('kode'=>$kode, 'nama'=>$nama));
	$res=$db->getResult();

	if($res){
		header('location: index.php');
	}else{
		echo "Gagal";
	}
}
?>
</html>
</body>