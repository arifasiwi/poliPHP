<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=jadwal-create?">Home</a></li>
  <li class="disabled">Create Data Jadwal</li>
</ul>
</nav>
<form action="" method="post">

<!-- field kode -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="kode" class="text-right middle">kode</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="kode" placeholder="kode" required>
  </div>
</div>

<!-- field hari -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="hari" class="text-right middle">hari</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="hari" placeholder="hari" required>
  </div>
</div>

<!-- field jam mulai -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="jam_mulai" class="text-right middle">jam_mulai</label>
  </div>
  <div class="small-6 cell">
    <input type="time" name="jam_mulai" placeholder="jam_mulai" required>
  </div>
</div>

<!-- field jam selesai -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="jam_selesai" class="text-right middle">jam_selesai</label>
  </div>
  <div class="small-6 cell">
    <input type="time" name="jam_selesai" placeholder="jam_selesai" required>
  </div>
</div>

<!-- field jk -->
<div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Jenis Kelamin</label>
    </div>
    <div class="small-6 cell">
      <input type="radio" name="jk" value="L" id="jk" required><label for="jkL">L</label>
      <input type="radio" name="jk" value="P" id="jk"><label for="jkP">P</label>
    </div>
</div>

<!-- field dokter id -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="dokter_id" class="text-right middle">dokter_id</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="dokter_id" placeholder="dokter_id" required>
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
$kode = $_POST['kode'];
$hari = $_POST['hari'];
$jam_mulai = $_POST['jam_mulai'];
$jam_selesai = $_POST['jam_selesai'];
$jk = $_POST['jk'];
$dokter_id = $_POST['dokter_id'];
// validation empty
  $db=new Database();
  $db->insert('jadwal',array('kode'=>$kode, 'hari'=>$hari, 'jam_mulai'=>$jam_mulai, 'jam_selesai'=>$jam_selesai, 'jk'=>$jk, 'dokter_id'=>$dokter_id));
  $res=$db->getResult();
  // redirect to list
  header('Location: /poliklinik/index.php?module=jadwal');
}
?>