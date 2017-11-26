<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('pegawai','*','','','','','','', "id=$id");
$res= $db->getOne();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pegawai-edit?">Home</a></li>
  <li class="disabled">Data Edit pegawai</li>
</ul>
</nav>
<form action="" method="post">

 <!-- field nip -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nip" class="text-right middle">nip</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="nip" placeholder="nip" value="<?php echo $r['nip']; ?>" required>
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
  <!-- field tgl_lahir -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tgl_lahir" class="text-right middle">tgl_lahir</label>
    </div>
    <div class="small-6 cell">
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
  $nip = $_POST['nip'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $jk = $_POST['jk'];
  $db = new Database();
  $db->update('pegawai',array(
    'nip'=>$nip,
    'nama'=>$nama,
    'alamat'=>$alamat,
    'telp'=>$telp,
    'tgl_lahir'=>$tgl_lahir,
    'jk'=>$jk,
  ),
    "id=$id"
  );
   $res = $db->getResult();
  // print_r($res);
  header('Location: /poliklinik/index.php?module=pegawai');
}

?>