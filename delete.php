<?php
session_start();
require __DIR__ . '/config.php';

if(!empty($_GET)){
	$id = $_GET['id'];
	$query = "DELETE FROM `rating` WHERE `id` = '$id'";
	mysqli_query($db, $query);
	$_SESSION['info'] = "O'chirildi";
	header('Location: ../index.php');
}else{
	echo "error";
}