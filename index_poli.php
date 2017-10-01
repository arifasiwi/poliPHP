<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
</head>
<body align="center">
    <h1 p align="center"> LIST POLI  </h1>
	<a href="add.php" class="menu">TAMBAH DATA</a>
	<br>
	<br>
	<form action="" method="POST">
	<table border="1" cellspacing="0" cellpadding="4" align="center">
	<tr align="center">
		<th>Kode Poli</th>
		<th>Nama Poli</th>
		<th>Aksi</th>
	</tr>
	<?php
		require_once("database.php");
		$db=new Database();
		$db->select('poli', 'id, kode, nama');
		$res=$db->getResult();
		if(count($res) == 0){
			echo "<b>Tidak ada data yang tersedia</b>";
		}else{
			foreach ($res as &$r) {

			echo "<tr style='text-align:center'>";?>
				<td><?php echo $r['kode'] ?></td>
				<td><?php echo $r['nama'] ?></td>
				<td>
					<a href="edit.php?id=<?php echo $r['id']; ?>">Edit</a> ||
					<a href="delete.php?id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")'>Hapus</a>
				</td>
			</tr>
			<?php
		}
	}
	?>
</table>
</form>
</body>
</html>