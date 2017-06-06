<?php
require_once('connect.php');
$id = $_GET['id'];
$DelSql = "DELETE FROM `crud` WHERE id=$id";
$res = mysqli_query($connection, $DelSql);
if($res){
	header('location: view.php');
}else{
	echo "Failed to delete";
}
?>
