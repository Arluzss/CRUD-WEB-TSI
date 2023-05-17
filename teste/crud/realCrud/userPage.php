<?php
include('secured.php');
$fp = fopen('esportes.csv', 'r');

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Paginas esportes</title>
</head>

<body>
	<style>
		* {
			box-sizing: border-box;
			padding: 0;
			margin: 0;
			overflow: hidden;
		}

		h1 {
			text-align: center;
		}

		td,
		th {
			border: 1px solid #dddddd;
			text-align: center;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
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

		form {
			display: flex;
			flex-direction: column;
		}
		label{
			text-align: center;
		}
	</style>
	<a href="logout.php">Logout</a>
	<h1>Bem-vindo a esportes</h1>
	<div id="forms">
		<table style="background-color: orange;">
			<tr>
				<th>ID</th>
				<th>Modalidade</th>
				<th>tipo</th>
				<th>Qtd jogadores</th>
				<th>equipamentos</th>
				<th>temporada</th>
				<th>Editar</th>
				<th>Deletar</th>
			</tr>
			<?php while (($row = fgetcsv($fp)) !== false) : ?>
				<tr>
					<td><?= $row[0] ?></td>
					<td><?= $row[1] ?></td>
					<td><?= $row[2] == '1' ? 'individual' : 'coletivo' ?></td>
					<td><?= $row[3] ?></td>
					<td><?= $row[4] ?></td>
					<td><?= $row[5] ?></td>
					<td><a href="edit.php?id=<?= $row[0] ?>">edit</a></td>
					<td><a href="delete.php?id=<?= $row[0] ?>">delete</a></td>
				</tr>
			<?php endwhile ?>
		</table>
		<form action="create.php" method="post">
			<input name="id" type="number" value=<?= time() ?> hidden>
			<label for="name">Nome</label>
			<input name="name" placeholder="nome" type="text">
			<label for="type">Modalidade</label>
			<select name="type">
				<option value="1">individual</option>
				<option value="0">coletivo</option>
			</select>
			<label for="numP">Qtd jogadores</label>
				<input name="numP" placeholder="numero de jogadores" type="number">
				<label for="gear">equipamentos</label>
				<input name="gear" placeholder="equipamentos" type="text">
				<label for="season">temporada</label>
				<input name="season" placeholder="temporada" type="text">
				<button>Create</button>
		</form>
	</div>
</body>

</html>