<?php
include('secured.php');

$id = $_POST['id'];
$name = $_POST['name'];
$type = $_POST['type'];
$numP = $_POST['numP'];
$gear = $_POST['gear'];
$season = $_POST['season'];

$fp = fopen('esportes.csv', 'r');
while (($row = fgetcsv($fp)) !== false) {
	if ($row[0] == $id) {
		header('location: userPage.php');
		exit();
	}
}

$fp = fopen('esportes.csv', 'a');

fputcsv($fp, [$id, $name, $type, $numP, $gear, $season]);
fclose($fp);
header('location: userPage.php');
