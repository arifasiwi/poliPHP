<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li><a href="?module=home">Home</a></li>
    <li class="disabled">Data Poli</li>
  </ul>
</nav>
<a href="?module=pendaftaran-create" class="small button">Create</a>
<a href="/poliklinik/export-csv.php?table=pendaftaran" class="small button">Export to CSV</a>
	
  <table>
      <thead>
          <tr>
		      <th>No Pendaftaran</th>
		      <th>Tanggal Daftar</th>
		      <th>Antrian</th>
              <th>Id Pasien</th>
		      <th>Id Pegawai</th>
		      <th>Id Biaya</th>
		      <th>Id Poli</th>
		      <th>Id Dokter</th>
		      <th>Id Jadwal</th>
		      <th>Aksi</th>
	      </tr>
          <?php
    require_once("database.php");
    $db=new Database();
    $db->select('pendaftaran', 'id, nomor, tgl, antrian, pasien_nama, pegawai_nama, biaya_tarif,poli_id, dokter_id, jadwal_id'); 
    $res=$db->getResult();
      if(count($res) == 0){
          echo "<b>Tidak ada data yang tersedia</b>";
      }else{
          foreach ($res as &$r){?>
          <tr>
              <td><?php echo $r['nomor'] ?></td>
              <td><?php echo $r['tgl'] ?></td>
              <td><?php echo $r['antrian'] ?></td>
              <td><?php echo $r['pasien_nama'] ?></td>
              <td><?php echo $r['pegawai_nama'] ?></td>
              <td><?php echo $r['biaya_tarif'] ?></td>
              <td><?php echo $r['poli_id'] ?></td>
              <td><?php echo $r['dokter_id'] ?></td>
              <td><?php echo $r['jadwal_id'] ?></td>
              <td>
                  <div class="small button-group">
                      <a href="?module=pendaftaran-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                      <a href="?module=pendaftaran-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                      <a href="?module=pendaftaran-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                  </div>
              </td>
          </tr>
<?php
                }
            }
            ?>
</table>