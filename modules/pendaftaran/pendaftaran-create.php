
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pendaftaran-create?">Home</a></li>
  <li class="disabled">Create Data pendaftaran</li>
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

<!-- field tgl -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tgl" class="text-right middle">tgl</label>
  </div>
  <div class="small-6 cell">
    <input type="date" name="tgl" placeholder="tgl" required>
  </div>
</div>
<!-- field antrian -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="antrian" class="text-right middle">antrian</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="antrian" placeholder="antrian" required>
  </div>
</div>
<!-- field pegawai_id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="pegawai_id" class="text-right middle">pegawai_id</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="pegawai_id" placeholder="pegawai_id" required>
  </div>
</div>
<!-- field pasien_id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="pasien_id" class="text-right middle">pasien_id</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="pasien_id" placeholder="pasien_id" required>
  </div>
</div>
<!-- field jadwal_id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="jadwal_id" class="text-right middle">jadwal_id</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="jadwal_id" placeholder="jadwal_id" required>
  </div>
</div>
<!-- field biaya_id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="biaya_id" class="text-right middle">biaya_id</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="biaya_id" placeholder="biaya_id" required>
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
$tgl = $_POST['tgl'];
$antrian = $_POST['antrian'];
$pegawai_id = $_POST['pegawai_id'];
$pasien_id = $_POST['pasien_id'];
$jadwal_id = $_POST['jadwal_id'];
$biaya_id = $_POST['biaya_id'];
// validation empty
  $db=new Database();
  $db->insert('pendaftaran',array('nomor'=>$nomor, 'tgl'=>$tgl, 'antrian'=>$antrian, 'pegawai_id'=>$pegawai_id, 'pasien_id'=>$pasien_id, 'jadwal_id'=>$jadwal_id, 'biaya_id'=>$biaya_id));
  $res=$db->getResult();
  // redirect to list
  header('Location: /poliklinik/index.php?module=pendaftaran');
}

?>