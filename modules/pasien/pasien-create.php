<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pasien-create?">Home</a></li>
  <li class="disabled">Create Data Pasien</li>
</ul>
</nav>
<form action="" method="post">

<!-- field no -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="id" class="text-right middle">No</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="id" placeholder="id" required>
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
<!-- field alamat -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="alamat" class="text-right middle">alamat</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="alamat" placeholder="alamat" required>
  </div>
</div>
<!-- field telp -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="telp" class="text-right middle">telp</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="telp" placeholder="telp" required>
  </div>
</div>
<!-- field tgllahir -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tgl_lahir" class="text-right middle">tgl_lahir</label>
  </div>
  <div class="small-6 cell">
    <input type="date" name="tgl_lahir" placeholder="tgl_lahir" required>
  </div>
</div>
<!-- field jk -->
<div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Jenis Kelamin</label>
    </div>
    <div class="small-6 cell">
      <input type="radio" name="jk" value="L" id="jk" required><label for="jkL">L</label>
      <input type="radio" name="jk" value="P" id="jk"><label for="jkP">P</label>
    </div>
</div>

<!-- field tglreg -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tgl_reg" class="text-right middle">tgl_reg</label>
  </div>
  <div class="small-6 cell">
    <input type="date" name="tgl_reg" placeholder="tgl_reg" required>
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
require_once("database.php");

// check action submit
if(isset($_POST['submit'])){
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$tgl_reg = $_POST['tgl_reg'];
// validation empty
if(empty($id) || empty($nama) || empty($alamat) || empty($telp) || empty($tgl_lahir) || empty($jk) || empty($tgl_reg)){
  if(empty($id)){
    echo "id harus diisi";
  }
  if(empty($nama)){
    echo "Nama harus diisi";
  }
  if(empty($alamat)){
    echo "alamat harus diisi";
  }
  if(empty($telp)){
    echo "telp harus diisi";
  }
  if(empty($tgl_lahir)){
    echo "tgl_lahir harus diisi";
  }
  if(empty($jk)){
    echo "jk harus diisi";
  }
  if(empty($tgl_reg)){
    echo "tglreg harus diisi";
  }
} else {
  $db=new Database();
  $db->insert('pasien',array('id'=>$id, 'nama'=>$nama, 'alamat'=>$alamat, 'telp'=>$telp, 'tgl_lahir'=>$tgl_lahir, 'jk'=>$jk));
  $res=$db->getResult();
  // redirect to list
  header('Location: /poliklinik/index.php?module=pasien');
}
}
?>