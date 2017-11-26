<?php ob_start(); 
require_once("database.php");
?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pasien-create?">Home</a></li>
  <li class="disabled">Create Data Pasien</li>
</ul>
</nav>
<form action="" method="post">

 <!-- field kode -->
 <div class="grid-x grid-padding-x">
<div class="small-3 cell">
  <label for="kode" class="text-right middle">Kode</label>
</div>
<div class="small-6 cell">
<?php
  $db = new Database();
  $db->selectMax('pasien','id');
  $res = $db->getResult();
  $kode = $res[0]['max'] < 1 ? $res[0]['max']+1  : $res[0]['max']+1;
  $value = 'PAS'.$kode;
  echo "<input type='text' name='kode' value='$value' placeholder='Kode Pasien' readonly>";
?>
</div>
</div>

<!-- field nama -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nama" class="text-right middle">Nama</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="nama" placeholder="Nama" required>
  </div>
</div>
<!-- field alamat -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="alamat" class="text-right middle">alamat</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="alamat" placeholder="alamat" required>
  </div>
</div>
<!-- field telp -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="telp" class="text-right middle">telp</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="telp" placeholder="telp" required>
  </div>
</div>
<!-- field tgllahir -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tgl_lahir" class="text-right middle">tgl_lahir</label>
  </div>
  <div class="small-6 cell">
    <input type="date" name="tgl_lahir" placeholder="tgl_lahir" required>
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

<!-- field tglreg -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tgl_reg" class="text-right middle">tgl_reg</label>
  </div>
  <div class="small-6 cell">
    <input type="date" name="tgl_reg" placeholder="tgl_reg" required>
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
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$tgl_reg = $_POST['tgl_reg'];

  $db=new Database();
  $db->insert('pasien',array(
    'kode'=>$kode,
    'nama'=>$nama, 
    'alamat'=>$alamat, 
    'telp'=>$telp, 
    'tgl_lahir'=>$tgl_lahir, 
    'jk'=>$jk, 
    'tgl_reg'=>$tgl_reg));
  $res=$db->getResult();
   // redirect to list
  //  print_r($res);
   exit(header('Location: /poliklinik/index.php?module=pasien'));
}
?>