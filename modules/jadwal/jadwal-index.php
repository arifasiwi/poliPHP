<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Jadwal</li>
  </ul>
</nav>
<a href="?module=jadwal-create" class="small button">Create</a>
<a href="/poliklinik/export-csv.php?table=jadwal" class="small button">Export to CSV</a>
	
  <table>
      <thead>
          <tr>
              <th>Kode</th>
		      <th>Hari </th>
		      <th>Jam mulai</th>
		      <th>Jam Selesai</th>
              <th>Jenis Kelamin</th>
              <th>Id Dokter</th>
		      <th>Aksi</th>
	      </tr>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('jadwal', 
    'jadwal.id, 
    jadwal.kode, 
    jadwal.hari, 
    jadwal.jam_mulai, 
    jadwal.jam_selesai, 
    jadwal.jk, 
    dokter.nama as nama_dokter',
    'dokter ON dokter.id=jadwal.dokter_id');
    $res=$db->getResult();
    if(count($res) == 0){ ?>
            <tr>
                <td colspan="8">Data tidak tersedia.</td>
            </tr>
            <?php }else{
            foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['kode'] ?></td>
              <td><?php echo $r['hari'] ?></td>
              <td><?php echo $r['jam_mulai'] ?></td>
              <td><?php echo $r['jam_selesai'] ?></td>
              <td><?php echo $r['jk'] ?></td>
              <td><?php echo $r['nama_dokter'] ?></td>

              <td>
                  <div class="small button-group">
                      <a href="?module=jadwal-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=jadwal-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=jadwal-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>