<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('resep','*','','','','','','', "id=$id");
$res= $db->getOne();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=resep-edit?">Home</a></li>
  <li class="disabled">Data Edit resep</li>
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
      <input type="text" name="nomor" placeholder="nomor" value="<?php echo $r['nomor']; ?>" required>
    </div>
  </div>
  <!-- field dosis -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="dosis" class="text-right middle">Nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="dosis" placeholder="Nama" value="<?php echo $r['dosis']; ?>" required>
    </div>
  </div>
  <!-- field jumlah -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jumlah" class="text-right middle">Alamat</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="jumlah" placeholder="Alamat" value="<?php echo $r['jumlah']; ?>" required>
    </div>
  </div>
  <!-- field obat_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="obat_id" class="text-right middle">Telphone</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="obat_id" placeholder="Telphone" value="<?php echo $r['telp']; ?>" required>
    </div>
  </div>
  
  </div><!-- field pemeriksaan_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="pemeriksaan_id" class="text-right middle">poli</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="pemeriksaan_id" placeholder="poli" value="<?php echo $r['pemeriksaan_id']; ?>" required>
    </div>
  </div>
  </div><!-- field total -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="total" class="text-right middle">total</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="total" placeholder="total" value="<?php echo $r['total']; ?>" required>
    </div>
  </div>
  </div><!-- field status -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="status" class="text-right middle">status</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="status" placeholder="poli" value="<?php echo $r['pemeriksaastatusn_id']; ?>" required>
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
  $nomor = $_POST['nomor'];
  $dosis = $_POST['dosis'];
  $jumlah = $_POST['jumlah'];
  $obat_id = $_POST['obat_id'];
  $pemeriksaan_id = $_POST['pemeriksaan_id'];
  $total = $_POST['total'];
  $status = $_POST['status'];

  $db = new Database();
  $db->update('resep',array(
    'nomor'=>$nomor,
    'dosis'=>$dosis,
    'jumlah'=>$jumlah,
    'obat_id'=>$obat_id,
    'pemeriksaan_id'=>$pemeriksaan_id,
    'total'=>$total,
    'status'=>$status,

  ),
    "id=$id"
  );
   $res = $db->getResult();
  // print_r($res);
  header('Location: /poliklinik/index.php?module=resep');
}

?>