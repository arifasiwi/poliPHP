<?php 
ob_start();
require_once("database.php");
?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=dokter-create?">Home</a></li>
  <li class="disabled">Create Data Pasien</li>
</ul>
</nav>
<form action="" method="post">

<!-- field kode -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="kode" class="text-right middle">Kode Dokter</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="kode" placeholder="kode" required>
  </div>
</div>

<!-- field nama -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nama" class="text-right middle">Nama Dokter</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="nama" placeholder="Nama" required>
  </div>
</div>
<!-- field alamat -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="alamat" class="text-right middle">Alamat</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="alamat" placeholder="alamat" required>
  </div>
</div>
<!-- field telp -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="telp" class="text-right middle">Telephone</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="telp" placeholder="telp" required>
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

<!-- field poli -->
<div class="grid-x grid-padding-x">
<div class="small-3 cell">
  <label for="poli_id" class="text-right middle">poli</label>
</div>
<div class="small-6 cell">
<select name="poli_id">
<option value = ""> Pilih poli </option>
  <?php
    $db = new Database();
    $db->select('poli','id,nama');
    $res = $db->getResult();
    foreach ($res as &$r){
      echo "<option value=$r[id]>$r[nama]</option>";
    }    
  ?>
  </select>
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

// check action submit
if(isset($_POST['submit'])){
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$jk = $_POST['jk'];
$poli_id = $_POST['poli_id'];

  $db=new Database();
  $db->insert('dokter',array('kode'=>$kode, 'nama'=>$nama, 'alamat'=>$alamat, 'telp'=>$telp, 'jk'=>$jk, 'poli_id'=>$poli_id));
  $res=$db->getResult();
   // redirect to list
  
  header('Location: /poliklinik/index.php?module=dokter');
}
?>