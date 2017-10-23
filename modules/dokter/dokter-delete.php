<?php

require_once('database.php');

$db=new Database();

$id = $_GET['id'];

$db->delete('dokter',"id=$id");

$res = $db->getResult();

if($res){

header('Location: /poliklinik/index.php?module=dokter');

}else{

echo "Upss Something wrong..";

}

?>