<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("final");

function displayNames() { 
    global $dbConn;
    
    $sql = "SELECT DISTINCT firstName, lastName FROM superhero ORDER by firstName";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    //echo "<hr>";
    //echo $records[2] . "<br>";
    //echo $records[1]['catDescription'] . "<br>";
    
    foreach ($records as $record) {
        echo "<option value='".$record['id']."'>" . $record['firstName'] . " " . $record['lastName'] . "</option>";
    }
}

function displayHero() {
    global $dbConn;
    
    $sql = "SELECT DISTINCT image FROM superhero ORDER BY RAND() LIMIT 1";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($records);
    //echo "<hr>";
    //echo $records[2] . "<br>";
    //echo $records[1]['catDescription'] . "<br>";
    
    //foreach ($records as $record) {
        $hero = $record['image'];
        echo "<img src=img/superheroes/" .$hero. ".png>";
    //}
    
}

?>