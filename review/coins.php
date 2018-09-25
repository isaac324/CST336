<?php
session_start();
//session_destroy();


if ( !isset ($_SESSION['heads']) ) {  // when the session doesn't exist ONLY
    $_SESSION['heads'] = 0;
    $_SESSION['tails'] = 0;
    $_SESSION['tossHistory'] = array();
}

if( rand(0,1) == 0 ) {

    $_SESSION['heads']++;
    $_SESSION['tossHistory'][] = "H"; //adds element to the array
    
} else {

    $_SESSION['tails']++;
    $_SESSION['tossHistory'][] = "T"; //adds element to the array
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Coin Flipping </title>
    </head>
    <body>
        
        <h2> Heads: <?= $_SESSION['heads'] ?> </h2>
        
        <h2> Tails: <?= $_SESSION['tails'] ?> </h2>
        
    </body>
</html>