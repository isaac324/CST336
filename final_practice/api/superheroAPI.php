<?php
include '../inc/dbConnection.php';
$dbConn = startConnection("final");

$sql ="SELECT * FROM superhero WHERE id = ".$_GET['id'];
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);

//print_r($record);
echo json_encode($record);

?>