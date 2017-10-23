<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Pegawai</li>
  </ul>
</nav>
    <a href="?module=pegawai-create" class="small button">Create</a>
	
<table>
    <thead>
        <tr>
            <th>NIP</th>
            <th>Nama </th>
            <th>Alamat </th>
            <th>Telephone </th>
            <th>Tanggal Lahir </th>
            <th>Jenis Kelamin </th>
            <th>Aksi</th>
        </tr>
    </thead>
<?php
    require_once("database.php");
    $db=new Database();
    $db->select('pegawai', 'id, nip, nama, alamat, telp, tgl_lahir, jk');
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['nip'] ?></td>
              <td><?php echo $r['nama'] ?></td>
              <td><?php echo $r['alamat'] ?></td>
              <td><?php echo $r['telp'] ?></td>
              <td><?php echo $r['tgl_lahir'] ?></td>
              <td><?php echo $r['jk'] ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=pegawai-show?id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=pegawai-edit?id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=pegawai-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>







