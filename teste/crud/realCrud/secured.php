<?php
session_start();

if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
	header('location: ../login.php');
	http_response_code(302);
	exit();
}
