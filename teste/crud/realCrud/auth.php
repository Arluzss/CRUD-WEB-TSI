<?php
session_start();

$email = $_POST['email'];
$password = $_POST['senha'];

$data = json_decode(file_get_contents('http://localhost:8000'), true);
foreach ($data as $row) {
	if ($email == $row['email'] && $password == $row['senha']) {
		$_SESSION['auth'] = true;
		header('location: userPage.php');
		exit();
	}
}

$_SESSION['auth'] = false;
header('location: ../login.php');
?>
