<?php
//include '../../inc/dbConnection.php';
//include 'loginProcess.php';
//$dbConn = startConnection("ottermart");

// if(loginCheck() == false){
//     echo "Wrong username or password!!";
// }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <style>
            body{
                text-align:center;
            }
            form{
                display: inline-block;
            }
        </style>
            
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />-->
    </head>
    <body>

        <h1> Ottermart - Admin Login </h1>
        
        <form method="post" action="loginProcess.php">
          Username:  <input type="text" name="username"/> <br>
          Password:  <input type="password" name="password"/> <br>
          <input type="submit" value="Login">
        </form>
        
        <!--<= ?>-->
        <!--loginCheck()-->
        
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
        <!--<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
        <!--action="loginProcess.php"-->

    </body>
</html>