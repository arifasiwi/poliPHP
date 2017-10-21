
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=resep-create?">Home</a></li>
  <li class="disabled">Create Data resep</li>
</ul>
</nav>
<form action="" method="post">

<!-- field nomor -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nomor" class="text-right middle">nomor</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="nomor" placeholder="nomor" required>
  </div>
</div>

<!-- field dosis -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="dosis" class="text-right middle">dosis</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="dosis" placeholder="dosis" required>
  </div>
</div>
<!-- field jumlah -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="jumlah" class="text-right middle">jumlah</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="jumlah" placeholder="jumlah" required>
  </div>
</div>
<!-- field obat_id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="obat_id" class="text-right middle">obat_id</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="obat_id" placeholder="obat_id" required>
  </div>
</div>
<!-- field pemeriksaan_id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="pemeriksaan_id" class="text-right middle">pemeriksaan_id</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="pemeriksaan_id" placeholder="pemeriksaan_id" required>
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
$nomor = $_POST['nomor'];
$dosis = $_POST['dosis'];
$jumlah = $_POST['jumlah'];
$obat_id = $_POST['obat_id'];
$pemeriksaan_id = $_POST['pemeriksaan_id'];

// validation empty
  $db=new Database();
  $db->insert('resep',array('nomor'=>$nomor, 'dosis'=>$dosis, 'jumlah'=>$jumlah, 'obat_id'=>$obat_id, 'pemeriksaan_id'=>$pemeriksaan_id));
  $res=$db->getResult();
  // redirect to list
  header('Location: /poliklinik/index.php?module=resep');
}

?>