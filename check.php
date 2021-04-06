<?php
session_start();
require __DIR__ . '/config.php';

if(!empty($_POST)){
	$ismi = htmlspecialchars($_POST['ismi'], ENT_QUOTES);
	$familiyasi = htmlspecialchars($_POST['familiyasi'], ENT_QUOTES);
	$sharfi = htmlspecialchars($_POST['sharfi'], ENT_QUOTES);

	if(empty($ismi) or empty($familiyasi) or empty($sharfi)){
		$_SESSION['info']="Barcha ma'lumotlarni to'g'ri kiriting";
		header('Location: ./index.php');
	}else{
		if(isset($_POST['id'])){
			$id = $_POST['id'];
			$query = "UPDATE `rating` SET `familiyasi` = '$familiyasi', `ismi` = '$ismi', `sharfi` = '$sharfi' WHERE `id` = '$id'";
			$_SESSION['info']="Ma'lumot tahrirlandi";
		}else{
			$query = "INSERT INTO `rating` (`id`, `ismi`, `familiyasi`, `sharfi`) VALUES (NULL, '$ismi', '$familiyasi', '$sharfi')";
			$_SESSION['info']="Ma'lumot qo'shildi";	
		}
		mysqli_query($db, $query);
		header('Location: ./index.php');
		
	}
}else{
	echo "error";
}
