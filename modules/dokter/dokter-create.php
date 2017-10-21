<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=dokter-create?">Home</a></li>
  <li class="disabled">Create Data Dokter</li>
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

<!-- field kode -->
<div class="grid-x grid-padding-x">
<div class="small-3 cell">
  <label for="kode" class="text-right middle">kode</label>
</div>
<div class="small-6 cell">
  <input type="text" name="kode" placeholder="nip" required>
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
 
 <!-- field poli_id -->
<div class="grid-x grid-padding-x">
<div class="small-3 cell">
  <label for="telp" class="text-right middle">poli_id</label>
</div>
<div class="small-6 cell">
  <input type="text" name="poli_id" placeholder="poli_id" required>
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
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$jk = $_POST['jk'];
$poli_id = $_POST['poli_id'];
// validation empty
if(empty($id) || empty($kode) || empty($nama) || empty($alamat) || empty($telp) || empty($jk) || empty($poli_id)){
  if(empty($id)){
    echo "id harus diisi";
  }
  if(empty($kode)){
    echo "kode harus diisi";
  }
  if(empty($nama)){
    echo "nama harus diisi";
  }
  if(empty($alamat)){
    echo "alamat harus diisi";
  }
  if(empty($telp)){
    echo "telp harus diisi";
  }
  
  if(empty($jk)){
    echo "jk harus diisi";
  }
  if(empty($pol_id)){
    echo "poli_id harus diisi";
  }
} else {
  $db=new Database();
  $db->insert('dokter',array('id'=>$id, 'kode'=>$kode, 'nama'=>$nama, 'alamat'=>$alamat, 'telp'=>$telp,  'jk'=>$jk, 'poli_id'=>$poli_id,));
  $res=$db->getResult();
  // redirect to list
  header('Location: /poliklinik/index.php?module=dokter');
}
}
?>