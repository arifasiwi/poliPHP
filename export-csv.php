<?php
include 'dbconfig.php';
$table = $_GET['table'];
// print_r($table);
$query = $db->query("SELECT * FROM ".$table." ORDER BY id DESC");
if($query->num_rows > 0){
    $delimiter = ",";
    $filename = $table."_" . date('Y-m-d h-i-s') . ".csv";
    //create a file pointer
    $f = fopen('php://memory', 'w');
    switch($table) {
        case 'poli';
            //set column headers
            $fields = array('ID', 'kode', 'nama');
            fputcsv($f, $fields, $delimiter);
            
            //output each row of the data, format line as csv and write to file pointer
            while($row = $query->fetch_assoc()){
                $lineData = array($row['id'], $row['kode'],$row['nama']);
                fputcsv($f, $lineData, $delimiter);
            }
        break;
        case 'pasien';
            //set column headers
            $fields = array('ID', 'kode', 'nama', 'alamat', 'telp', 'tgl_lahir','jk','tgl_reg');
            fputcsv($f, $fields, $delimiter);
            
            //output each row of the data, format line as csv and write to file pointer
            while($row = $query->fetch_assoc()){
                $lineData = array($row['id'], $row['kode'], $row['nama'], $row['alamat'], $row['telp'], $row['tgl_lahir'], $row['jk'],$row['tgl_reg']);
                fputcsv($f, $lineData, $delimiter);
            }
        // code
        break;
        case 'pegawai';
        //set column headers
        $fields = array('ID', 'nip', 'nama', 'alamat', 'telp', 'tgl_lahir','jk');
        fputcsv($f, $fields, $delimiter);
        
        //output each row of the data, format line as csv and write to file pointer
        while($row = $query->fetch_assoc()){
            $lineData = array($row['id'], $row['nip'], $row['nama'], $row['alamat'], $row['telp'], $row['tgl_lahir'], $row['jk']);
            fputcsv($f, $lineData, $delimiter);
        }
        // code
        break;
        case 'dokter';
        //set column headers
        $fields = array('ID', 'kode', 'nama', 'alamat', 'telp', 'jk','poli_id');
        fputcsv($f, $fields, $delimiter);
        
        //output each row of the data, format line as csv and write to file pointer
        while($row = $query->fetch_assoc()){
            $lineData = array($row['id'], $row['kode'], $row['nama'], $row['alamat'], $row['telp'], $row['jk'],$row['poli_id']);
            fputcsv($f, $lineData, $delimiter);
        }
        // code
        break;
        case 'jadwal';
        //set column headers
        $fields = array('ID', 'kode', 'hari', 'jam_mulai', 'jam_selesai', 'jk','dokter_id');
        fputcsv($f, $fields, $delimiter);
        
        //output each row of the data, format line as csv and write to file pointer
        while($row = $query->fetch_assoc()){
            $lineData = array($row['id'], $row['kode'], $row['hari'], $row['jam_mulai'], $row['jam_selesai'], $row['jk'],$row['dokter_id']);
            fputcsv($f, $lineData, $delimiter);
        }
        // code
        break;
        case 'biaya';
        //set column headers
        $fields = array('ID', 'nama', 'tarif', 'pendaftaran_id');
        fputcsv($f, $fields, $delimiter);
        
        //output each row of the data, format line as csv and write to file pointer
        while($row = $query->fetch_assoc()){
            $lineData = array($row['id'],$row['nama'], $row['tarif'], $row['pendaftaran_id']);
            fputcsv($f, $lineData, $delimiter);
        }
        // code
        break;
        case 'obat';
        //set column headers
        $fields = array('ID', 'kode', 'nama', 'merk', 'satuan', 'harga');
        fputcsv($f, $fields, $delimiter);
        
        //output each row of the data, format line as csv and write to file pointer
        while($row = $query->fetch_assoc()){
            $lineData = array($row['id'], $row['kode'], $row['nama'], $row['merk'], $row['satuan'], $row['harga']);
            fputcsv($f, $lineData, $delimiter);
        }
        // code
        break;
        case 'resep';
        //set column headers
        $fields = array('ID', 'nomor', 'pemeriksaan_id', 'status');
        fputcsv($f, $fields, $delimiter);
        
        //output each row of the data, format line as csv and write to file pointer
        while($row = $query->fetch_assoc()){
            $lineData = array($row['id'], $row['nomor'], $row['pemeriksaan_id'], $row['status']);
            fputcsv($f, $lineData, $delimiter);
        }
        // code
        break;
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;
?>