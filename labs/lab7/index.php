<?php
    
    session_start();

    include '../../inc/dbConnection.php';
    $dbConn = startConnection("ottermart");
    
    function check(){
        if(isset($_POST['loginform'])){
            $check = true;
        } else {
            $check = false;
        }
        
        Logincheck($check);
    }
    
    function Logincheck($check){
        global $dbConn;
        
        $username = $_POST['username'];
        $password = sha1($_POST['password']);
        
        if($check == true) {
        
            //This SQL does NOT prevent SQL Injection (because of the single quotes)
            // $sql = "SELECT * FROM om_admin
            //                  WHERE username = '$username' 
            //                  AND  password = '$password'";
                             
            $sql = "SELECT * FROM om_admin
                             WHERE username = :username 
                             AND  password = :password ";                 
            $np = array();
            $np[':username'] = $username;
            $np[':password'] = $password;
            
            $stmt = $dbConn->prepare($sql);
            $stmt->execute($np);
            $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record
            
            //print_r($record);
            
            if (empty($record)) {
                
                echo "<h2>Wrong username or password!!</h2>";
            } else {
               
               $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
               header('Location: admin.php'); //redirects to another program
                
            }
        
        }
        
    }

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
            h2{
                color:red;
            }
            footer{
                margin-top: 200px;
            }
        </style>
            
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />-->
        
    </head>
    <body>

        <h1> Ottermart - Admin Login </h1>
        
        <form method="post">
          Username:  <input type="text" name="username"/> <br>
          Password:  <input type="password" name="password"/> <br>
          <input type="submit" name="loginform" value="Login">
        </form>
        <!--action="loginProcess.php"-->
        <!--value="Login"-->
        
        <?= check() ?>
        
        <br /><br />
        <footer>
            <span class = "current">CST 336 &copy; 2018 Isaac Avila</span> <br />
            
            <br />
            <strong> Disclaimer:</strong> The information in this website is fake. It is used for academic purposes only.
            <br />
            
            <figure>
                <img src = "img/buddy.png" width = '70'> 
            </figure>
        </footer>

    </body>
</html>