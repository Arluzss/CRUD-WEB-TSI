<?php
include('secured.php');
$id = $_GET['id'];

$fp = fopen('esportes.csv', 'r');


$found = false;
$data = null;

while (($row = fgetcsv($fp)) !== false) {
	if ($row[0] == $id) {
		$found = true;
		$data = $row;
	}
}


if (!$found) {
	header('location: userPage.php');
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Edition deluuxe</title>
	<style>
		* {
			box-sizing: border-box;
			padding: 0;
			margin: 0;
			overflow: hidden;
		}

		#forms {
			position: relative;
			width: 100vw;
			height: 100vh;
			background-color: aliceblue;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
		}
		form{
			display: flex;
			flex-direction: column;
		}
		label{
			text-align: center;
		}
	</style>
</head>

<div id="forms">
	<form action="update.php" method="post">
		<input type="number" name="id" value="<?= $data[0] ?>" hidden>
		<label for="name">Nome</label>
		<input type="text" name="name" placeholder="nome" value="<?= $data[1] ?>" required>
		<label for="name">Modalidade</label>
		<select name="type">
			<option value="1" <?= $data[2] == '1' ? 'selected' : '' ?>>individual</option>
			<option value="0" <?= $data[2] == '0' ? 'selected' : '' ?>>coletivo</option>
		</select>
		<label for="name">Quantidades</label>
		<input type="text" name="numP" placeholder="Qtd de jogadores" value="<?= $data[3] ?>" required>
		<label for="name">equipamentos</label>
		<input type="text" name="gear" placeholder="equipamentos" value="<?= $data[4] ?>" required>
		<label for="name">temporada</label>
		<input type="text" name="season" placeholder="temporada" value="<?= $data[5] ?>" required>

		<button>Edit</button>
	</form>
</div>

<body>

</body>

</html>