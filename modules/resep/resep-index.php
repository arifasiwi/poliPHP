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
		      <th>Dosis</th>
		      <th>Jumlah</th>
		      <th>Id Obat</th>
		      <th>Id Pemeriksaan</th>
		      <th>Aksi</th>
	      </tr>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('resep', 'id, nomor, dosis, jumlah, obat_id, pemeriksaan_id');
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['nomor'] ?></td>
              <td><?php echo $r['dosis'] ?></td>
              <td><?php echo $r['jumlah'] ?></td>
              <td><?php echo $r['obat_id'] ?></td>
              <td><?php echo $r['pemeriksaan_id'] ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=resep-show?id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=resep-edit?id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=resep-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>