<?php
ob_start();
?>
<?php require_once("database.php"); ?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <!-- <a href="?module=pendaftaran-create?">Home</a></li> -->
  <li class="disabled">Data Pendaftaran</li>
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
  <!-- field tgl -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tgl" class="text-right middle">tgl</label>
    </div>
    <div class="small-6 cell">
      <input type="date" name="tgl" placeholder="tgl" value="<?php echo date('Y-m-d');?>" readonly>
    </div>
  </div>
  <!-- field antrian -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="antrian" class="text-right middle">antrian</label>
    </div>
    <div class="small-6 cell">
    <?php
        $db = new Database();
        $date= date('Y-m-d');
        $db->selectMaxAntrian('antrian','id,nomor',"tgl='$date'");
        $res = $db->getResult();
        $antrian=$res[0]['maxAntrian'] +1;
        echo "<input type='text' value='$antrian' name='antrian' readonly>";
      ?>
    </div>
  </div>
  <!-- field pasien -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="pasien_nama" class="text-right middle">pasien</label>
    </div>
    <div class="small-6 cell">
    <select name="pasien_nama">
    <option value = ""> Pilih pasien </option>
      <?php
        $db = new Database();
        $db->select('pasien','id,nama');
        $res = $db->getResult();
        foreach ($res as &$r){
          echo "<option value=$r[id]>$r[nama]</option>";
        }    
      ?>
      </select>
    </div>
  </div>
    <!-- field pegawai -->
    <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="pegawai_nama" class="text-right middle">pegawai</label>
    </div>
    <div class="small-6 cell">
      <select name="pegawai_nama">
      <option value = ""> Pilih pegawai </option>
      <?php
        $db = new Database();
        $db->select('pegawai','id,nama');
        $res = $db->getResult();
        foreach ($res as &$r){
          echo "<option value=$r[id]>$r[nama]</option>";
        }    
      ?>
      </select>
    </div>
  </div>
   <!-- field biaya -->
   <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="biaya_tarif" class="text-right middle">biaya</label>
    </div>
    <div class="small-6 cell">
    <select name="biaya_tarif">
    <option value = ""> Pilih biaya </option>
      <?php
        $db = new Database();
        $db->select('biaya','id,tarif');
        $res = $db->getResult();
        foreach ($res as &$r){
          echo "<option value=$r[id]>$r[tarif]</option>";
        }    
      ?>
      </select>
    </div>
  </div>
   <!-- field poli -->
   <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="poli_id" class="text-right middle">poli</label>
    </div>
    <div class="small-6 cell">
    <select name="poli_id">
    <option value = ""> Pilih poli </option>
      <?php
        $db = new Database();
        $db->select('poli','id,nama');
        $res = $db->getResult();
        foreach ($res as &$r){
          echo "<option value=$r[id]>$r[nama]</option>";
        }    
      ?>
      </select>
    </div>
  </div> <!-- field dokter -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="dokter_id" class="text-right middle">dokter</label>
    </div>
    <div class="small-6 cell">
    <select name="dokter_id">
    <option value = ""> Pilih dokter </option>
      <?php
        $db = new Database();
        $db->select('dokter','id,nama');
        $res = $db->getResult();
        foreach ($res as &$r){
          echo "<option value=$r[id]>$r[nama]</option>";
        }    
      ?>
      </select>
    </div>
  </div>
  <!-- field jadwal -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jadwal_id" class="text-right middle">jadwal</label>
    </div>
    <div class="small-6 cell">
    <select name="jadwal_id">
    <option value = ""> Pilih jadwal </option>
      <?php
        $db = new Database();
        $db->select('jadwal','id,hari');
        $res = $db->getResult();
        foreach ($res as &$r){
          echo "<option value=$r[id]>$r[hari]</option>";
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
  $tgl = $_POST['tgl'];
  $antrian = $_POST['antrian'];
  $pasien_nama = $_POST['pasien_nama'];
  $pegawai_nama = $_POST['pegawai_nama'];
  $biaya_tarif = $_POST['biaya_tarif'];
  $poli_id = $_POST['poli_id'];
  $dokter_id = $_POST['dokter_id'];
  $jadwal_id = $_POST['jadwal_id'];
  
  $db=new Database();
  $db->insert('pendaftaran',
  array(
    'nomor'=>$nomor,
    'tgl'=>$tgl,
    'antrian'=>$antrian,
    'pasien_nama'=>$pasien_nama,
    'pegawai_nama'=>$pegawai_nama,
    'biaya_tarif'=>$biaya_tarif,
    'poli_id'=>$poli_id,
    'dokter_id'=>$dokter_id,
    'jadwal_id'=>$jadwal_id,
  ));
  $res=$db->getResult();
  $db->insert('antrian',
  array(
    'nomor'=>$antrian,
    'tgl'=>date('Y-m-d'),
  ));
  // print_r($res);
  // redirect to list
  header('Location: /poliklinik/index.php?module=pendaftaran');
}
?>