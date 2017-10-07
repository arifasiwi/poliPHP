<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Pasien</li>
  </ul>
</nav>
<a href="?module=pasien-create.php" class="small button">Create</a>
  <table>
      <thead>
          <tr>
		      <th>No Pasien</th>
		      <th>Nama Pasien</th>
		      <th>Alamat Pasien</th>
		      <th>Telp Pasien</th>
		      <th>Tanggal Lahir</th>
		      <th>Jenis Kelamin</th>
              <th>Tanggal Registrasi </th>
		      <th>Aksi</th>
	      </tr>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('pasien', 'id, nama, alamat, telp, tgl_lahir, jk, tgl_reg ');
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['nama'] ?></td>
              <td><?php echo $r['alamat'] ?></td>
              <td><?php echo $r['telp'] ?></td>
              <td><?php echo $r['tgl_lahir'] ?></td>
              <td><?php echo $r['jk'] ?></td>
              <td><?php echo $r['tgl_reg'] ?></td>

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