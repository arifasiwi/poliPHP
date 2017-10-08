<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=poli-create?">Home</a></li>
  <li class="disabled">Data Poli</li>
</ul>
</nav>
<form>
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kode" class="text-right middle">Kode</label>
    </div>
    <div class="small-6 cell">
      <input type="text" id="kode" placeholder="Kode">
    </div>
  </div>
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" id="nama" placeholder="Nama">
    </div>
  </div>
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
<?php 
require_once("database.php");
if(isset($_POST['tambah'])){
	$kode   = $_POST['kode'];
	$nama   = $_POST['nama'];
	$db=new Database();
	$db->insert('poli',array('kode'=>$kode, 'nama'=>$nama));
	$res=$db->getResult();

	if($res){
		header('location: index.php');
	}else{
		echo "Gagal";
	}
}
?>
</html>
</body>