<?php
ob_start();
?>
<?php require_once("database.php"); ?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pemeriksaan-create?">Home</a></li>
  <li class="disabled">Data Pemeriksaan</li>
</ul>
</nav>
<form action="" method="post">
 <!-- field nomor -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nomor" class="text-right middle">nomor</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="nomor" placeholder="nomor" required>
    </div>
  </div>
  <!-- field keluhan -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="keluhan" class="text-right middle">keluhan</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="keluhan" placeholder="keluhan" required>
    </div>
  </div>
  <!-- field diagnosa -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="diagnosa" class="text-right middle">diagnosa</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="diagnosa" placeholder="diagnosa" required>
    </div>
  </div>
  <!-- field perawatan -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="perawatan" class="text-right middle">perawatan</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="perawatan" placeholder="perawatan" required>
    </div>
  </div>
  <!-- field tindakan -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tindakan" class="text-right middle">tindakan</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="tindakan" placeholder="tindakan" required>
    </div>
  </div>
  <!-- field berat_badan -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="berat_badan" class="text-right middle">berat_badan</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="berat_badan" placeholder="berat_badan" required>
    </div>
  </div>
  <!-- field tensi_diastolik -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tensi_diastolik" class="text-right middle">tensi_diastolik</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="tensi_diastolik" placeholder="tensi_diastolik" required>
    </div>
  </div>
  <!-- field tensi_sistolik -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tensi_sistolik" class="text-right middle">tensi_sistolik</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="tensi_sistolik" placeholder="tensi_sistolik" required>
    </div>
  </div>

   <!-- field pendaftaran -->
   <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="pendaftaran_id" class="text-right middle">Nomor - Nama Pasien</label>
    </div>
    <div class="small-6 cell">
    <select name="pendaftaran_id">
    <option value = ""> Pilih Nomor - Nama Pasien </option>
      <?php
        $db = new Database();
        $db->select('pendaftaran','id,nomor, pasien_nama as nama');
        $res = $db->getResult();
        foreach ($res as &$r){
          echo "<option value=$r[id]>$r[nomor] - $r[nama]</option>";
        }    
      ?>
      </select>
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
  $keluhan = $_POST['keluhan'];
  $diagnosa = $_POST['diagnosa'];
  $perawatan = $_POST['perawatan'];
  $tindakan = $_POST['tindakan'];
  $berat_badan = $_POST['berat_badan'];
  $tensi_diastolik = $_POST['tensi_diastolik'];
  $tensi_sistolik = $_POST['tensi_sistolik'];
  $pendaftaran_id = $_POST['pendaftaran_id'];
  
  $db=new Database();
  $db->insert('pemeriksaan',
  array(
    'nomor'=>$nomor,
    'keluhan'=>$keluhan,
    'diagnosa'=>$diagnosa,
    'perawatan'=>$perawatan,
    'tindakan'=>$tindakan,
    'berat_badan'=>$berat_badan,
    'tensi_diastolik'=>$tensi_diastolik,
    'tensi_sistolik'=>$tensi_sistolik,
    'pendaftaran_id'=>$pendaftaran_id,
  ));
  $res=$db->getResult();
  // redirect to list
  header('Location: /poliklinik/index.php?module=pemeriksaan');
}

?>