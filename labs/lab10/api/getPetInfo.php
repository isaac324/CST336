<?php
include '../../../inc/dbConnection.php';
$dbConn = startConnection("c9");

$sql ="SELECT * FROM pets WHERE id = ".$_GET['petid'];
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);

//print_r($record);
echo json_encode($record);

?>