<?php 

$db = new mysqli('localhost', 'root', '', 'travelapp');

$rows = $db->query("SELECT * FROM travels");

foreach($rows as $row) {
	$ssku = 'TP'.(string)$row['id'];
    $db->query("UPDATE travels SET SKU ='$ssku' WHERE id ={$row['id']}");
    echo "{$ssku} added.. to {$row['id']}<br>";
}
