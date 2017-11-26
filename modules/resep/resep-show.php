<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=resep?">Home</a></li>
  <li class="disabled">Detail Resep</li>
</ul>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('resep', 
'resep.id, 
resep.nomor, 
pemeriksaan.nomor as pemeriksaan, 
pemeriksaan.tindakan as tindakan, 
resep.status',
'pemeriksaan ON resep.pemeriksaan_id = pemeriksaan.id',
'',
'',
'',
'',
'',
"resep.id=$id"
);

$res= $db->getResult();
if(count($res) == 0){ ?>
  <table>
    <tbody>
      <tr>
        <td>Data yang anda cari tidak ada atau terhapus</td>
      </tr>
    </tbody>
  </table>
<?php }else{
  foreach ($res as &$r){ 
?>
<table id="print-area">
  <tbody>
    <tr>
      <td width="200px">Id :</td>
      <td><?php echo $r['id']; ?></td>
    </tr>
    <tr>
      <td>Nomor Resep :</td>
      <td><?php echo $r['nomor']; ?></td>
    </tr>
    <tr>
      <td>Pemeriksaan :</td>
      <td><?php echo $r['pemeriksaan']; ?></td>
    </tr>
    <tr>
      <td>Status :</td>
      <td><?php echo $r['status']; ?></td>
    </tr>
    <tr>
      <td>Tindakan :</td>
      <td><?php echo $r['tindakan']; ?></td>
    </tr>
  </tbody>
</table>
<a class="button" href="javascript:printDiv('print-area');" >Print</a>
<a href="?module=resep-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
<?php }}?>

<style>
@media print {
   * { color: black; background: white; }
   table { font-size: 80%; }
}
</style>

<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>

<script type="text/javascript">
     
     function printDiv(elementId) {
    var a = document.getElementById('print-area').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
</script>