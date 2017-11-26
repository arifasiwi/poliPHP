<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Poli</li>
  </ul>
</nav>
<a href="?module=resep-create" class="small button">Create</a>
  <table>
      <thead>
          <tr>
		      <th>No Resep</th>
		      <th>No. Pemeriksaan</th>
		      <th>Tindakan</th>
		      <th>Status</th>
		      <th>Aksi</th>
	      </tr>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('resep', 
    'resep.id, 
    resep.nomor, 
    pemeriksaan.nomor as pemeriksaan, 
    pemeriksaan.tindakan as tindakan, 
    resep.status',
    'pemeriksaan ON resep.pemeriksaan_id = pemeriksaan.id'
);
    $res=$db->getResult();
    if(count($res) == 0){ ?>
            <tr>
                <td colspan="8">Data tidak tersedia.</td>
            </tr>
            <?php }else{
                // print_r($res);
            foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['nomor'] ?></td>
              <td><?php echo $r['pemeriksaan'] ?></td>
              <td><?php echo $r['tindakan'] ?></td>
              <td><?php echo ($r['status'] == true  ? 'Sudah ditebus' : 'Belum ditebus')  ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=resep-obat&id=<?php echo $r['id']; ?>" class=" button">Resep Obat</a>
                      <a href="?module=resep-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=resep-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=resep-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>