<?php
    
    session_start();
    
    include 'inc/dbConnection.php';
    $dbConn = startConnection("project");
    
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
                             
            $sql = "SELECT * FROM proj_admin
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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <title> Admin Login </title>
        <style>
            h1, form{
                text-align:center;
                padding: 5px;
            }
            footer {
                text-align: center;
                padding: 10px;
                margin-top: 250px;
            }
            .admin{
                color: darkred;
            }
            .admin:hover{
                color: red;
            }
            body{
                background-color: Lightgrey;
            }
        </style>
            
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />-->
        
    </head>
    <body>
        
        <!-- Bootstrap Navagation Bar -->
        <nav class='navbar navbar-default - navbar-fixed-top'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <a class='navbar-brand' href='#'>GameCart</a>
                </div>
                  <ul class='nav navbar-nav'>
                    <li><a href='index.php'>Home</a></li>
                    <li><a href='login.php'><span class='admin'>Admin</span></a></li>
                </ul>
            </div>
        </nav>
        <br /> <br /> <br />

        <h1> GameCart - Admin Login </h1>
        
        <form method="post">
          Username:  <input type="text" name="username"/> <br><br>
          Password:  <input type="password" name="password"/> <br><br>
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
            
        </footer>

    </body>
</html>