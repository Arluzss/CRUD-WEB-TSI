<?php
include('secured.php');
$id = $_GET['id'];

$temp = tempnam('.', '');
$tempFile = fopen($temp, 'w');

$realFp = fopen('esportes.csv', 'r');
while (($row = fgetcsv($realFp)) !== false) {
	if ($row[0] != $id) {
		fputcsv($tempFile, $row);
	}
}

fclose($realFp);
fclose($tempFile);

rename($temp, 'esportes.csv');
header('location: userPage.php');
