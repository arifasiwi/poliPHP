<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Biaya</li>
  </ul>
</nav>
<a href="?module=biaya-create" class="small button">Create</a>
  <table>
      <thead>
          <tr>
		      <th>No</th>
		      <th>Nama </th>
		      <th>Tarif</th>
		      <th>Id Pendaftaran</th>
		      <th>Aksi</th>
	      </tr>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('biaya', 'id, nama, tarif, pendaftaran_id');
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['id'] ?></td>
              <td><?php echo $r['nama'] ?></td>
              <td><?php echo $r['tarif'] ?></td>
              <td><?php echo $r['pendaftaran_id'] ?></td>

              <td>
                  <div class="small button-group">
                      <a href="?module=biaya-show?id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=biaya-edit?id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=biaya-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>