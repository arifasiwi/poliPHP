<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('dokter','*','','','','','','', "id=$id");
$res= $db->getOne();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=dokter-edit?">Home</a></li>
  <li class="disabled">Data Edit dokter</li>
</ul>
</nav>
<form action="" method="post">

 <!-- field kode -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kode" class="text-right middle">kode</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="kode" placeholder="kode" value="<?php echo $r['kode']; ?>" required>
    </div>
  </div>
  <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="nama" placeholder="Nama" value="<?php echo $r['nama']; ?>" required>
    </div>
  </div>
  <!-- field alamat -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="alamat" class="text-right middle">Alamat</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="alamat" placeholder="Alamat" value="<?php echo $r['alamat']; ?>" required>
    </div>
  </div>
  <!-- field telp -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="telp" class="text-right middle">Telphone</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="telp" placeholder="Telphone" value="<?php echo $r['telp']; ?>" required>
    </div>
  </div>

  <!-- field jk -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jk" class="text-right middle">jk</label>
    </div>
    <div class="small-6 cell">    
    <input type="radio" name="jk" <?php echo $r['jk'] == "L" ? "checked": "" ;?> value="L" />L
    <input type="radio" name="jk" <?php echo $r['jk'] == "P" ? "checked": "" ;?> value="P"/>P
    </div>
  </div>
  
  </div><!-- field poli_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="poli_id" class="text-right middle">poli</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="poli_id" placeholder="poli" value="<?php echo $r['poli_id']; ?>" required>
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
  $kode = $_POST['kode'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $jk = $_POST['jk'];
  $poli_id = $_POST['poli_id'];

  $db = new Database();
  $db->update('dokter',array(
    'kode'=>$kode,
    'nama'=>$nama,
    'alamat'=>$alamat,
    'telp'=>$telp,
    'jk'=>$jk,
    'poli_id'=>$poli_id,

  ),
    "id=$id"
  );
   $res = $db->getResult();
  // print_r($res);
  header('Location: /poliklinik/index.php?module=dokter');
}

?>