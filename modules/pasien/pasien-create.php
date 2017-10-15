<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pasien-create?">Home</a></li>
  <li class="disabled">Data Pasien</li>
</ul>
</nav>

<form>
  <!-- nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" id="nama" placeholder="nama">
    </div>
  </div>
  <!-- alamat -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="alamat" class="text-right middle">Alamat</label>
    </div>
    <div class="small-6 cell">
      <input type="text" id="alamat" placeholder="alamat">
    </div>
  </div>
  <!-- telephone -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="telp" class="text-right middle">Telephone</label>
    </div>
    <div class="small-6 cell">
      <input type="text" id="telp" placeholder="telp">
    </div>
  </div>
  <!-- tgl lahir -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tgl_lahir" class="text-right middle">Tanggal Lahir</label>
    </div>
    <div class="small-6 cell">
      <input type="date" id="tgl_lahir" placeholder="tgl_lahir">
    </div>
  </div>
  <!-- jk -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Jenis Kelamin</label>
    </div>
    <div class="small-6 cell">
      <input type="radio" name="jk" value="L" id="jk" required><label for="jkL">L</label>
      <input type="radio" name="jk" value="P" id="jk"><label for="jkP">P</label>
    </div>
  </div>
  <!-- tgl reg -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tgl_reg" class="text-right middle">Tanggal Registrasi</label>
    </div>
    <div class="small-6 cell">
      <input type="date" id="tgl_reg" placeholder="tgl_reg">
    </div>
  </div>
  <!-- aksi -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle"></label>
    </div>
    <div class="small-6 cell">
      <div class="small button-group">
        <a class="button">Simpan</a>
        <a class="button">Reset</a>
        <a class="button">Kembali</a>
      </div>
    </div>
  </div>
</form>

<!-- inputan -->
<?php 
require_once("database.php");
if(isset($_POST['tambah'])){
  $nama   = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$telp   = $_POST['telp'];
	$tgl_lahir   = $_POST['tgl_lahir'];
	$jk   = $_POST['jk'];
	$tgl_reg   = $_POST['tgl_reg'];
	$db=new Database();
	$db->insert('pasien',array('nama'=>$nama, 'alamat'=>$alamat, 'telp'=>$telp, 'tgl_lahir'=>$tgl_lahir, 'jk'=>$jk, 'tgl_reg'=>$tgl_reg));
	$res=$db->getResult();

	if($res){
		header('location: index.php');
	}else{
		echo "Gagal";
	}
}
?>