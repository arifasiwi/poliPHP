<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('pendaftaran','*','','','','','','', "id=$id");
$res= $db->getResult();
// print_r($res);
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pendaftaran-edit?">Home</a></li>
  <li class="disabled">Data Edit pendaftaran</li>
</ul>
</nav>
<form action="" method="post">
 <!-- field nomor -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nomor" class="text-right middle">nomor</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="nomor" placeholder="nomor" value="<?php echo $r['nomor']; ?>" readonly>
    </div>
  </div>
  <!-- field tgl -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tgl" class="text-right middle">Tanggal</label>
    </div>
    <div class="small-6 cell">
      <input type="date" name="tgl" placeholder="Nama" value="<?php echo $r['tgl']; ?>" readonly>
    </div>
  </div>
  <!-- field antrian -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="antrian" class="text-right middle">Antrian</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="antrian" placeholder="Antrian" value="<?php echo $r['antrian']; ?>" readonly>
    </div>
  </div>
  <!-- field pasien_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="pasien_nama" class="text-right middle">Pasien</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="pasien_nama" placeholder="Pasien" value="<?php echo $r['pasien_nama']; ?>" required>
    </div>
  </div>
  <!-- field pegawai_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="pegawai_nama" class="text-right middle">pegawai_nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="pegawai_nama" placeholder="pegawai_nama" value="<?php echo $r['pegawai_nama']; ?>" required>
    </div>
  </div>
 <!-- field biaya_id -->
 <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="biaya_tarif" class="text-right middle">Biaya</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="biaya_tarif" placeholder="Biaya" value="<?php echo $r['biaya_tarif']; ?>" required>
    </div>
  </div><!-- field poli_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="poli_id" class="text-right middle">poli</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="poli_id" placeholder="poli" value="<?php echo $r['poli_id']; ?>" required>
    </div>
  </div><!-- field dokter_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="dokter_id" class="text-right middle">dokter</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="dokter_id" placeholder="dokter" value="<?php echo $r['dokter_id']; ?>" required>
    </div>
  </div><!-- field jadwal_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jadwal_id" class="text-right middle">jadwal</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="jadwal_id" placeholder="jadwal" value="<?php echo $r['jadwal_id']; ?>" required>
    </div>
  </div>
  <!-- Aksi -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tgl" class="text-right middle"></label>
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
  $nomor = $_POST['nomor'];
  $tgl = $_POST['tgl'];
  $antrian = $_POST['antrian'];
  $pasien_nama = $_POST['pasien_nama'];
  $pegawai_nama = $_POST['pegawai_nama'];
  $biaya_tarif = $_POST['biaya_tarif'];
  $poli_id = $_POST['poli_id'];
  $dokter_id = $_POST['dokter_id'];
  $jadwal_id = $_POST['jadwal_id'];
  $db = new Database();
  $db->update('pendaftaran',array(
    'nomor'=>$nomor,
    'tgl'=>$tgl,
    'antrian'=>$antrian,
    'pasien_nama'=>$pasien_nama,
    'pegawai_nama'=>$pegawai_nama,
    'biaya_tarif'=>$biaya_tarif,
    'poli_id'=>$poli_id,
    'dokter_id'=>$dokter_id,
    'jadal_id'=>$jadwal_id,
  ),
    "id=$id"
  );
   $res = $db->getResult();
  // print_r($res);
  header('Location: /poliklinik/index.php?module=pendaftaran');
}

?>