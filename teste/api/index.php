<?php
$fp= fopen('pessoas.csv', 'r');

$data = [];

while(($row = fgetcsv($fp)) !== false){
  $data[] = [
  	'senha' => $row[1],
  	'email' => $row[0]
  ];
	
}
echo json_encode(
	$data
);
?>


