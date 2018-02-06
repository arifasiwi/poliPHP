<?php
require_once("database.php");

ob_start();
?> 
?>
<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li>
      <a href="?module=resep-obat?">Home</a></li>
    <li class="disabled">Create Data Resep</li>
  </ul>
</nav>
<form action="" method="post">
 <!-- field resepID -->
<div class="grid-x grid-padding-x">
<div class="small-3 cell">
  <label for="resep_id" class="text-right middle">Resep</label>
</div>
<div class="small-6 cell">
<input type="text" value="<?php echo $_GET['resep_id']; ?>" name="resep_id" placeholder="resep" readonly>
</div>
</div>

 <!-- field obatID -->
 <div class="grid-x grid-padding-x">
<div class="small-3 cell">
  <label for="obat_id" class="text-right middle">Obat</label>
</div>
<div class="small-6 cell">
<select name="obat_id">
<option value = ""> Pilih Id Obat </option>
  <?php
    $db = new Database();
    $db->select('obat','id,nama');
    $res = $db->getResult();
    foreach ($res as &$r){
      echo "<option value=$r[id]>$r[nama]</option>";
    }    
  ?>
   </select>
</div>
</div>

  <!-- field jumlah -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jumlah" class="text-right middle">Jumlah Obat</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="jumlah" placeholder="Jumlah Obat" required>
    </div>
  </div>

  <!-- field harga -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="harga" class="text-right middle">harga</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="harga" placeholder="harga" required>
    </div>
  </div>

  <!-- field total -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="total" class="text-right middle">total</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="total" placeholder="total" required>
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
  $resep_id = $_POST['resep_id'];
  $obat_id = $_POST['obat_id'];
  $jumlah = $_POST['jumlah'];
  $harga = $_POST['harga'];
  $total = $_POST['total'];

  // validation empty
    $db=new Database();
    $db->insert('trx_resep',array('resep_id'=>$resep_id, 'obat_id'=>$obat_id, 'jumlah'=>$jumlah, 'harga'=>$harga, 'total'=>$total));
    $res=$db->getResult();
    
    $db->select('obat','*','','','','','','', "id=$obat_id");
    $res1 = $db->getResult();
    $stok = $res1[0]['stok'];
    $newStok = $stok - $jumlah;
    
    // update stock obat 
    $db->update('obat',array(
      'stok'=> $newStok,
    ),
      "id=$obat_id"
    );

    // redirect to list
    header('Location: /poliklinik/index.php?module=resep-obat&id='. $_GET['resep_id']);
}
?>
