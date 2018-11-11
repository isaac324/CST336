<?php
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

$username = $_POST['username'];
$password = sha1($_POST['password']);
    
//This SQL does NOT prevent SQL Injection (because of the single quotes)
// $sql = "SELECT * FROM om_admin
//                  WHERE username = '$username' 
//                  AND  password = '$password'
    
$sql = "SELECT * FROM om_admin
                 WHERE username = :username 
                 AND  password = :password";
    
$np = array();
$np[':username'] = $username;
$np[':password'] = $password;
    
$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record
    
//print_r($record);
    
if (empty($record)) {
    
    // $check = false;
    // loginCheck($check);
    echo "Wrong username or password!!";
    //header('Location: index.php');
    //echo "Wrong username or password!!";
    //return false;
    
} else {
    
    $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
    header('Location: admin.php'); //redirect to another program
    
}


// function loginCheck($check){
//     if($check == false){
//         echo "<br><br>";
//         echo "Wrong username or password!!";
//     }
    
// }

?>