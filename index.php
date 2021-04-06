<?php
session_start();
require __DIR__ . '/config.php';
$query = "SELECT * FROM rating";
$result = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ro'yxat</title>
</head>
<body>
	<h3>Ro'yxat</h3>
	<table border="1">
		<th>Id</th><th>Ismi</th><th>Familiyasi</th><th>Sharfi</th>
		<?php while($row = mysqli_fetch_assoc($result)): ?>
			<tr><td><?= $row['id'] ?></td><td><?= $row['ismi'] ?></td><td><?= $row['familiyasi'] ?></td><td><?= $row['sharfi'] ?></td><td><a href="delete/<?= $row['id'] ?>">Del</a> | <a href="edit/<?= $row['id'] ?>">Edit</a></td>
			<?php endwhile; ?>
		</table>
		<p><a href="add.php">Yangi ma'lumot qo'shish</a></p>
		<?php if(isset($_SESSION['info'])) echo "<p>".$_SESSION['info']."</p>" ?>
	</body>
	</html>
	<?php session_destroy(); ?>