<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=biaya-create?">Home</a></li>
  <li class="disabled">Create Data Biaya</li>
</ul>
</nav>
<form action="" method="post">


<!-- field nama -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nama" class="text-right middle">Nama</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="nama" placeholder="Nama" required>
  </div>
</div>
<!-- field tarif -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tarif" class="text-right middle">tarif</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="tarif" placeholder="tarif" required>
  </div>
</div>
<!-- field pendaftaran_id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="pendaftaran_id" class="text-right middle">pendaftaran_id</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="pendaftaran_id" placeholder="pendaftaran_id" required>
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
    <button class="button" type="reset">Reset</button>
    <a class="button" href='javascript:self.history.back();'>Kembali</a>
  </div>
  </div>
</div>
</form>

<?php 
require_once("database.php");

// check action submit
if(isset($_POST['submit'])){
$nama = $_POST['nama'];
$tarif = $_POST['tarif'];
$pendaftaran_id = $_POST['pendaftaran_id'];

// validation empty
  $db=new Database();
  $db->insert('biaya',array('nama'=>$nama, 'tarif'=>$tarif, 'pendaftaran_id'=>$pendaftaran_id));
  $res=$db->getResult();
  // redirect to list
  header('Location: /poliklinik/index.php?module=biaya');
}
?>