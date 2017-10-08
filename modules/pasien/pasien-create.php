<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=poli-create?">Home</a></li>
  <li class="disabled">Data Pasien</li>
</ul>
</nav>
<form>
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kode" class="text-right middle">Nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" id="kode" placeholder="Kode">
    </div>
  </div>
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Alamat</label>
    </div>
    <div class="small-6 cell">
      <input type="text" id="nama" placeholder="Nama">
    </div>
  </div>
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Telephone</label>
    </div>
    <div class="small-6 cell">
      <input type="text" id="nama" placeholder="Nama">
    </div>
  </div>
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Tanggal Lahir</label>
    </div>
    <div class="small-6 cell">
      <input type="date" id="nama" placeholder="Nama">
    </div>
  </div>
  <div class="grid-x grid-padding-x">
  <fieldset class="large-6 cell">
    <legend>Choose Your Favorite</legend>
    <input type="radio" name="pokemon" value="Red" id="pokemonRed" required><label for="pokemonRed">Red</label>
    <input type="radio" name="pokemon" value="Blue" id="pokemonBlue"><label for="pokemonBlue">Blue</label>
    <input type="radio" name="pokemon" value="Yellow" id="pokemonYellow"><label for="pokemonYellow">Yellow</label>
  </fieldset>
  <fieldset class="large-6 cell">
    <legend>Check these out</legend>
    <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
    <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
    <input id="checkbox3" type="checkbox"><label for="checkbox3">Checkbox 3</label>
  </fieldset>
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