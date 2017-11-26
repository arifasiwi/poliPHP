<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('jadwal','*','','','','','','', "id=$id");
$res= $db->getOne();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=jadwal-edit?">Home</a></li>
  <li class="disabled">Data Edit jadwal</li>
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
  <!-- field hari -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="hari" class="text-right middle">Nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="hari" placeholder="Nama" value="<?php echo $r['hari']; ?>" required>
    </div>
  </div>
  <!-- field jam_mulai -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jam_mulai" class="text-right middle">Alamat</label>
    </div>
    <div class="small-6 cell">
      <input type="time" name="jam_mulai" placeholder="Alamat" value="<?php echo $r['jam_mulai']; ?>" required>
    </div>
  </div>
  <!-- field jam_selesai -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jam_selesai" class="text-right middle">Telphone</label>
    </div>
    <div class="small-6 cell">
      <input type="time" name="jam_selesai" placeholder="Telphone" value="<?php echo $r['jam_selesai']; ?>" required>
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
  <!-- field dokter_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="dokter_id" class="text-right middle">dokter_id</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="dokter_id" placeholder="dokter_id" value="<?php echo $r['dokter_id']; ?>" required>
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
  $hari = $_POST['hari'];
  $jam_mulai = $_POST['jam_mulai'];
  $jam_selesai = $_POST['jam_selesai'];
  $jk = $_POST['jk'];
  $dokter_id = $_POST['dokter_id'];
  $db = new Database();
  $db->update('jadwal',array(
    'kode'=>$kode,
    'hari'=>$hari,
    'jam_mulai'=>$jam_mulai,
    'jam_selesai'=>$jam_selesai,
    'jk'=>$jk,
    'dokter_id'=>$dokter_id,
  ),
    "id=$id"
  );
   $res = $db->getResult();
  // print_r($res);
  header('Location: /poliklinik/index.php?module=jadwal');
}

?>