<?php

require_once('database.php');

$db=new Database();

$id = $_GET['id'];

$db->delete('pasien',"id=$id");

$res = $db->getResult();

if($res){

header('Location: /poliklinik/index.php?module=pasien');

}else{

echo "Upss Something wrong..";

}

?>