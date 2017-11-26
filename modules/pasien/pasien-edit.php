<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('pasien','*','','','','','','', "id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pasien-edit?">Home</a></li>
  <li class="disabled">Edit Data pasien</li>
</ul>
</nav>
<form action="" method="post">

 <!-- field id -->
 <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="id" class="text-right middle">Kode Pasien</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="id" placeholder="id" value="<?php echo $r['id']; ?>" readonly>
    </div>
  </div>

 <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama Pasien</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="nama" placeholder="nama poli" value="<?php echo $r['nama']; ?>" required>
    </div>
  </div>

  <!-- field alamat -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="alamat" class="text-right middle">Alamat</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="alamat" placeholder="alamat" value="<?php echo $r['alamat']; ?>" required>
    </div>
  </div>

  <!-- field telp -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="telp" class="text-right middle">Telephone Pasien</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="telp" placeholder="telp" value="<?php echo $r['telp']; ?>" required>
    </div>
  </div>
  <!-- field tgl_lahir -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tgl_lahir" class="text-right middle">Tanggal Lahir Pasien</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="date" name="tgl_lahir" placeholder="tgl_lahir" value="<?php echo $r['tgl_lahir']; ?>" required>
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
  <!-- field tgl_reg -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tgl_reg" class="text-right middle">Tanggal Registrasi</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="date" name="tgl_reg" placeholder="tgl_reg" value="<?php echo $r['tgl_reg']; ?>" required>
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
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['telpa'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $jkr = $_POST['jkr'];
  $tgl_reg = $_POST['tgl_reg'];
  
  $db = new Database();
  $db->update('pasien',array(
    'nama'=>$nama,
    'alamat'=>$alamat,
    'telp'=>$telp,
    'tgl_lahir'=>$tgl_lahir,
    'jk'=>$jk,
    'tgl_reg'=>$tgl_reg,
  ),
    "id=$id"
  );
  $res = $db->getResult();
  
  header('Location: /poliklinik/index.php?module=pasien');
}

?>