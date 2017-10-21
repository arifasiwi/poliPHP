<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Obat</li>
  </ul>
</nav>
<a href="?module=obat-create" class="small button">Create</a>
  <table>
      <thead>
          <tr>
              <th>Kode</th>
		      <th>Nama </th>
		      <th>Merk</th>
		      <th>Satuan</th>
              <th>Harga</th>
		      <th>Aksi</th>
	      </tr>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('obat', 'id, kode, nama, merk, satuan, harga');
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['kode'] ?></td>
              <td><?php echo $r['nama'] ?></td>
              <td><?php echo $r['merk'] ?></td>
              <td><?php echo $r['satuan'] ?></td>
              <td><?php echo $r['harga'] ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=obat-show?id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=obat-edit?id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=obat-delete?id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>