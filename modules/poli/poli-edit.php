<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('poli','*','','','','','','', "id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=poli-edit?">Home</a></li>
  <li class="disabled">Edit Data poli</li>
</ul>
</nav>
<form action="" method="post">
 <!-- field kode -->
 <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kode" class="text-right middle">Kode Poli</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="kode" placeholder="kode" value="<?php echo $r['kode']; ?>" readonly>
    </div>
  </div>

 <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama Poli</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="nama" placeholder="nama poli" value="<?php echo $r['nama']; ?>" required>
    </div>
  </div>

  <!-- Aksi -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle"></label>
    </div>
    <div class="small-6 cell">
		<div class="small button-group">
  <button class="button" type="submit" name="submit">Simpan</button>
  <a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
    </div>
  </div>
</form>
<?php
              }
          }
          ?>
<?php 
// check action submit
if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $kode =$_POST['kode'];
  $nama = $_POST['nama'];
  $db = new Database();
  $db->update('poli',array(
    'kode'=>$kode,
    'nama'=>$nama,
  ),
    "id=$id"
  );
  $res = $db->getResult();
  
  header('Location: /poliklinik/index.php?module=poli');
}

?>