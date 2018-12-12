<?php
include 'inc/dbConnection.php';
$dbConn = startConnection("project");

$sql ="SELECT * FROM proj_games WHERE gameId = ".$_GET['gameid'];
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);

//print_r($record);
echo json_encode($record);

?>