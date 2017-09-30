<!DOCTYPE html>
<html>
<head>
	<title>EDIT Data</title>
</head>
<body>
<a href="index.php" class="menu">BERANDA</a> ||
<a href="add.php" class="menu">TAMBAH DATA</a>
<h1>EDIT DATA</h1>

<?php
require_once('database.php');
$db=new Database();
$id=$_GET["id"];
$db->select('poli','id,nama,kode','',"id={$id}");
$res=$db->getResult();
?>

<form action="" method="POST">
<table>
	<tr>
		<td><label>ID Poli</label></td>
   		<td><input type="text" name="id" class="txtField" value="<?php echo $res[0]["id"]?>"></td>
	</tr>
	<tr>
		<td><label>Kode </label></td>
   		<td><input type="text" name="kode" class="txtField" value="<?php echo $res[0]["kode"]?>"></td>
	</tr>
	<tr>
		<td><label>Nama </label></td>
   		<td><input type="text" name="nama" class="txtField" value="<?php echo $res[0]["nama"]?>"></td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" name="edit" value="Edit">
	</td>
	</tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$kode = $_POST['kode'];
	$nama = $_POST['nama'];
	$db->update('poli',array('id'=>$id, 'kode'=>$kode, 'nama'=>$nama),"id={$id}");

	if($res){
		header("location: index.php");
	}else{
		echo "Salah";
	}
}
?>