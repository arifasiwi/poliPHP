<?php
require_once("database.php");
$table = $_GET['table'];
 if(isset($_POST["Import"])){
		
		$filename=$_FILES["file"]["tmp_name"];		
		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ";")) !== FALSE)
	         {
                    $db=new Database();
                    
                    // switch
                    $nip = $getData[0];
                    $no_ktp = $getData[1];
                    $nama = $getData[2];
                    $alamat = $getData[3];
                    $telp = $getData[4];
                    $db->insert($table,array('nip'=>$nip, 'no_ktp'=>$no_ktp, 'nama'=>$nama, 'alamat'=>$alamat, 'telp'=>$telp));
                    
                    // end switch
                    $result=$db->getResult();
                    print_r($result);
                	// if(!isset($result))
                	// {
                	// 	echo "<script type=\"text/javascript\">
                	// 			alert(\"Invalid File:Please Upload CSV File.\");
                	// 			window.location = \"index.php\"
                	// 		  </script>";		
                	// }
                	// else {
                	// 	  echo "<script type=\"text/javascript\">
                	// 		alert(\"CSV File has been successfully Imported.\");
                	// 		window.location = \"index.php\"
                	// 	</script>";
                	// }
	         }
			
	        //  fclose($file);	
		 }
	}	 
 ?>