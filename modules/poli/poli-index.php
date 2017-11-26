<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Poli</li>
  </ul>
</nav>
    <a href="?module=poli-create" class="small button">Create</a>
	
<table>
    <thead>
        <tr>
            <th>Kode Poli</th>
            <th>Nama Poli</th>
            <th>Aksi</th>
        </tr>
    </thead>
<?php
    require_once("database.php");
    $db=new Database();
    $db->select('poli', 'id, kode, nama');
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['kode'] ?></td>
              <td><?php echo $r['nama'] ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=poli-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=poli-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=poli-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>