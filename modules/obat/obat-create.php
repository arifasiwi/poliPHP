<?php ob_start(); ?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=obat-create?">Home</a></li>
  <li class="disabled">Create Data obat</li>
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

<!-- field nama -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nama" class="text-right middle">nama</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="nama" placeholder="nama" required>
  </div>
</div>
<!-- field merk -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="merk" class="text-right middle">merk</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="merk" placeholder="merk" required>
  </div>
</div>
<!-- field satuan -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="satuan" class="text-right middle">satuan</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="satuan" placeholder="satuan" required>
  </div>
</div>
<!-- field harga -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="harga" class="text-right middle">harga</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="harga" placeholder="harga" required>
  </div>
</div>

<!-- field stok -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="stok" class="text-right middle">stok</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="stok" placeholder="stok" required>
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
$nama = $_POST['nama'];
$merk = $_POST['merk'];
$satuan = $_POST['satuan'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

// validation empty
  $db=new Database();
  $db->insert('obat',array('kode'=>$kode, 'nama'=>$nama, 'merk'=>$merk, 'satuan'=>$satuan, 'harga'=>$harga, 'stok'=>$stok));
  $res=$db->getResult();
  // redirect to list
  header('Location: /poliklinik/index.php?module=obat');
}

?>