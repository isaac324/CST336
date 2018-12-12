<?php

session_start();
//include 'inc/dbConnection.php';
include 'inc/functions.php';
//$dbConn = startConnection("project");

?>


<!DOCTYPE html>
<html>
    <head>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        
        <title> Game Info </title>
        <style>
            footer {
                text-align: center;
                padding: 10px;
                margin-top: 250px;
            }
            .home{
                color: navy;
            }
            .home:hover{
                color: blue;
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
    </head>
    <body>
        
        <!-- Bootstrap Navagation Bar -->
        <nav class='navbar navbar-default - navbar-fixed-top'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <a class='navbar-brand' href='#'>GameCart</a>
                </div>
                  <ul class='nav navbar-nav'>
                    <li><a href='index.php'><span class='home'>Home</span></a></li>
                    <li><a href='login.php'><span class='admin'>Admin</span></a></li>
                    <li><a href='scart.php'>
                    <span class ='glyphicon glyphicon-shopping-cart' aria-hidden ='true'></span>
                    </span>Cart: <?php displayCartCount(); ?></a></li>
                </ul>
            </div>
        </nav>
        <br /> <br /> <br />

        <div class='container'>
            <div class='text-center'>
                <h2>Game Info</h2>
                
                <?=displayGameInfo()?>
            </div>
        </div>
        
    </body>
</html>