<?php

    function displayArray($symbols){
        echo "<hr>";
        print_r($symbols);
        
        for($i=0; $i< count($symbols); $i++){
            
            echo $symbols[$i] . " ";
            
        }
    }
    
    $symbols = array("seven");
    print_r($symbols); //displays array content
    
    $points = array("orange"=>250, "cherry"=>500);
    // echo $points["cherry"]; //displays 500 points 
    $points["seven"] = 1000;
    
    array_push($symbols, "orange", "grapes"); //adds element(s) to the end of the array
    print_r($symbols); //displays array content
    
    $symbols[] = "cherry"; //adds element to the end of the array
    //print_r($symbols);
    displayArray($symbols);
    
    sort($symbols);
    displayArray($symbols);
    
    rsort($symbols);
    displayArray($symbols);
    
    unset($symbols[2]);
    displayArray($symbols);
    
    $symbols = array_values($symbols);
    displayArray($symbols);
    
    shuffle($symbols);
    displayArray($symbols);
    
    echo "<hr>";
    //echo "Random item: " . $symbols[ rand(0, count($symbols)-1)]; //displays random item
    
    //echo "<hr>";
    //echo "Random item: " . $symbols[ array_rand($symbols)]; //displays random item
    
    $indexes = array();
    
    for($i = 0; $i<3; $i++){
        $indexes[] = $symbols[ array_rand($symbols) ];
        echo "<img src='../lab2/img/" . $indexes[$i] . ".png'>"; //displays random item
    }
    
    echo "<hr>";
    print_r($indexes);
    
    if($indexes[0]==$indexes[1] && $indexes[1]==$indexes[2]){
        echo "Congrats!!! You won " . $points[ $symbols[ $indexes[0] ] ]. " points.";
    }
    

?>

<!DOCTYPE html>
<html>
    <head>
        
        
        
    </head>
    
    <body>
        
        
        
    </body>
</html>