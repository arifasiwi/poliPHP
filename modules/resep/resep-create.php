<?php 
ob_start();
require_once("database.php");
?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=resep-create?">Home</a></li>
  <li class="disabled">Create Data resep</li>
</ul>
</nav>
<form action="" method="post">

<!-- field nomor -->
<div class="grid-x grid-padding-x">
<div class="small-3 cell">
  <label for="nomor" class="text-right middle">nomor</label>
</div>
<div class="small-6 cell">
<?php
  $db = new Database();
  $db->selectMax('poli','id');
  $res = $db->getResult();
  $nomor = $res[0]['max'] < 1 ? $res[0]['max']+1  : $res[0]['max']+1;
  $value = 'RESEP'.$nomor;
  echo "<input type='text' name='nomor' value='$value' placeholder='Kode Poli' readonly>";
?>
</div>
</div>

<!-- field pemeriksaan_id -->
<div class="grid-x grid-padding-x">
<div class="small-3 cell">
  <label for="pemeriksaan_id" class="text-right middle">Nomor Pemeriksaan</label>
</div>
<div class="small-6 cell">
<select name="pemeriksaan_id">
<option value = ""> Pilih pemeriksaan </option>
  <?php
    $db = new Database();
    $db->select('pemeriksaan','id,nomor');
    $res = $db->getResult();
    foreach ($res as &$r){
      echo "<option value=$r[id]>$r[nomor]</option>";
    }    
  ?>
  </select>
</div>
</div>

<!-- field status -->
 <!-- <div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="status" class="text-right middle">status</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="status" placeholder="status" required>
  </div>
</div>  -->

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
$nomor = $_POST['nomor'];
$dosis = $_POST['dosis'];
$jumlah = $_POST['jumlah'];
$obat_id = $_POST['obat_id'];
$pemeriksaan_id = $_POST['pemeriksaan_id'];
$total = $_POST['total'];
$status = $_POST['status'];

// validation empty
  $db=new Database();
  $db->insert('resep',array('nomor'=>$nomor, 'dosis'=>$dosis, 'jumlah'=>$jumlah, 'obat_id'=>$obat_id, 'pemeriksaan_id'=>$pemeriksaan_id, 'total'=>$total, 'status'=>$status));
  $res=$db->getResult();
  // redirect to list
  header('Location: /poliklinik/index.php?module=resep');
}

?>