<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Dokter</li>
  </ul>
</nav>
<a href="?module=dokter-create" class="small button">Create</a>
<a href="/poliklinik/export-csv.php?table=dokter" class="small button">Export to CSV</a>
	
  <table>
      <thead>
          <tr>
              <th>Kode Dokter</th>
		      <th>Nama </th>
		      <th>Telephone</th>
              <th>Jenis Kelamin</th>
              <th>Poli</th>
		      <th>Aksi</th>
	      </tr>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('dokter', 
    'dokter.id, 
    dokter.kode, 
    dokter.nama, 
    dokter.telp, 
    dokter.jk, 
    poli.nama as nama_poli',
    'poli ON poli.id=dokter.poli_id');
    $res=$db->getResult();
    if(count($res) == 0){ ?>
            <tr>
                <td colspan="8">Data tidak tersedia.</td>
            </tr>
            <?php }else{
            foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['kode'] ?></td>
              <td><?php echo $r['nama'] ?></td>
              <td><?php echo $r['telp'] ?></td>
              <td><?php echo $r['jk'] ?></td>
              <td><?php echo $r['nama_poli'] ?></td>

              <td>
                  <div class="small button-group">
                      <a href="?module=dokter-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=dokter-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=dokter-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>