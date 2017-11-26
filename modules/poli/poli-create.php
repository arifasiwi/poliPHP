<?php
require_once("database.php");
?>
<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li>
      <a href="?module=poli-create?">Home</a></li>
    <li class="disabled">Create Data Poli</li>
  </ul>
</nav>
<form action="" method="post">
 <!-- field kode -->
<div class="grid-x grid-padding-x">
<div class="small-3 cell">
  <label for="kode" class="text-right middle">Kode</label>
</div>
<div class="small-6 cell">
<?php
  $db = new Database();
  $db->selectMax('poli','id');
  $res = $db->getResult();
  $kode = $res[0]['max'] < 1 ? $res[0]['max']+1  : $res[0]['max']+1;
  $value = 'POLI00'.$kode;
  echo "<input type='text' name='kode' value='$value' placeholder='Kode Poli' readonly>";
?>
</div>
</div>

  <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="nama" placeholder="Nama" required>
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

// check action submit
if(isset($_POST['submit'])){
  $kode = $_POST['kode'];
  $nama = $_POST['nama'];
  // validation empty
    $db=new Database();
    $db->insert('poli',array('kode'=>$kode, 'nama'=>$nama));
    $res=$db->getResult();
    // redirect to list
    header('Location: /poliklinik/index.php?module=poli');
}
?>
