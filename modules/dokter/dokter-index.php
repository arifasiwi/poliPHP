<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Biaya</li>
  </ul>
</nav>
<a href="?module=pasien-create.php" class="small button">Create</a>
  <table>
      <thead>
          <tr>
		      <th>No</th>
              <th>Kode Dokter</th>
		      <th>Nama </th>
		      <th>Alamat</th>
		      <th>Telephone</th>
              <th>Jenis Kelamin</th>
              <th>Id Poli</th>
		      <th>Aksi</th>
	      </tr>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('dokter', 'id, kode, nama, alamat, telp, jk,  poli_id');
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['id'] ?></td>
              <td><?php echo $r['kode'] ?></td>
              <td><?php echo $r['nama'] ?></td>
              <td><?php echo $r['alamat'] ?></td>
              <td><?php echo $r['telp'] ?></td>
              <td><?php echo $r['jk'] ?></td>
              <td><?php echo $r['poli_id'] ?></td>

              <td>
                  <div class="small button-group">
                      <a href="?module=pasien-show?id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=pasien-edit?id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=pasien-delete?id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>