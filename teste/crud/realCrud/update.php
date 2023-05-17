<?php
include('secured.php');

$id = $_POST['id'];
$name = $_POST['name'];
$type = $_POST['type'];
$numP = $_POST['numP'];
$gear = $_POST['gear'];
$season = $_POST['season'];

$temp = tempnam('.', '');
$tempFile = fopen($temp, 'w');

$realFp = fopen('esportes.csv', 'r');
while (($row = fgetcsv($realFp)) !== false) {
	if ($row[0] == $id) {
		fputcsv($tempFile, [$id, $name, $type, $numP, $gear, $season]);
	} else {
		fputcsv($tempFile, $row);
	}
}
fclose($tempFile);
fclose($realFp);

rename($temp, 'esportes.csv');
header('location: userPage.php');
