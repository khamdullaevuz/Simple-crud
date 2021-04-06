<?php
session_start();
require __DIR__ . '/config.php';

if(!empty($_GET['id'])):
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Ma'lumotni tahrirlash</title>
	</head>
	<body>
		<?php 
		$id = $_GET['id'];
		$query = "SELECT * FROM rating where `id` = '$id'";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_assoc($result);
		$ismi = $row['ismi'];
		$familiyasi = $row['familiyasi'];
		$sharfi = $row['sharfi'];
		?>
		<form action="../check.php" method="post">
			<input name="id" type="hidden" value="<?= $id ?>">
			<p>Ism: <input type="text" name="ismi" placeholder="Ismingizni kiriting" required="true" value="<?= $ismi ?>"></p>
			<p>Familiya: <input type="text" name="familiyasi" placeholder="Familiyangizni kiriting" required="true" value="<?= $familiyasi ?>"></p>
			<p>Sharfi: <input type="text" name="sharfi" placeholder="Sharfingizni kiriting" required="true" value="<?= $sharfi ?>"></p>
			<button type="submit">Tahrirlash</button>
		</form>
	</body>
	</html>
	<?php else: ?>
		Error
		<?php endif; ?>