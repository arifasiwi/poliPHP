<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Poli</li>
  </ul>
</nav>
<a href="?module=pemeriksaan-create.php" class="small button">Create</a>
  <table>
      <thead>
          <tr>
		      <th>No</th>
		      <th>No Pemeriksaan</th>
		      <th>Keluhan</th>
		      <th>Diagnosa</th>
		      <th>Perawatan</th>
		      <th>Tindakan</th>
		      <th>Berat Badan</th>
		      <th>Tensi Diastolik</th>
		      <th>Tensi Sistolik</th>
		      <th>Id Pendaftaran</th>
		      <th>Aksi</th>
	      </tr>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('pemeriksaan', 'id, nomor, keluhan, diagnosa, perawatan, tindakan, berat_badan, tensi_diastolik, tensi_sistolik, pendaftaran_id');
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['id'] ?></td>
              <td><?php echo $r['nomor'] ?></td>
              <td><?php echo $r['keluhan'] ?></td>
              <td><?php echo $r['diagnosa'] ?></td>
              <td><?php echo $r['perawatan'] ?></td>
              <td><?php echo $r['tindakan'] ?></td>
              <td><?php echo $r['berat_badan'] ?></td>
              <td><?php echo $r['tensi_diastolik'] ?></td>
              <td><?php echo $r['tensi_sistolik'] ?></td>
              <td><?php echo $r['pendaftaran_id'] ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=pemeriksaan-show?id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=pemeriksaan-edit?id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=pemeriksaan-delete?id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>