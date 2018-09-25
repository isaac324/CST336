<?php

include 'inc/charts.php';
$posters = array("ready_player_one","rampage","paddington_2","hereditary","alpha","black_panther","christopher_robin","coco","dunkirk","first_man");
sort($posters);

function movieReviews($add) {
    global $posters;
    
    $randomPoster = $posters[0 + $add];
    $randomposter = str_replace('_', ' ', $randomPoster);
    
    echo "<div class='poster'>";
    echo "<h2> ".ucfirst($randomposter)." </h2>";
    echo "<img width='100' src='img/posters/$randomPoster.jpg'>";    
    echo "<br>";
    
    //NOTE: $totalReviews must be a random number between 100 and 300
    $totalReviews = rand(100, 300); 
    
    //NOTE: $ratings is an array of 1-star, 2-star, 3-star, and 4-star rating percentages
    //      The sum of rating percentages MUST be 100
    $ratings = array(30,20,40,10);
    $newratings = array();
    $rest = 10;
    
    for($i = 0; $i < 3; $i++){
        $rate = rand(0, $rest);
        $rest = $rest - $rate;
        $newratings[$i] = $rate*10;
    }
    $newratings[3] = $rest*10;
    
    
    //NOTE: displayRatings() displays the ratings bar chart and
    //      returns the overall average rating
    $overallRating = displayRatings($totalReviews,$newratings);
    
    //NOTE: The number of stars should be the rounded value of $overallRating
    if($overallRating < 2){
         echo "<br><img src='img/star.png' width='25'>";
    }
    else if($overallRating >= 2 && $overallRating < 3){
        echo "<br><img src='img/star.png' width='25'>";
        echo "<img src='img/star.png' width='25'>";
    }
    else if($overallRating >= 3 && $overallRating < 4){
        echo "<br><img src='img/star.png' width='25'>";
        echo "<img src='img/star.png' width='25'>";
        echo "<img src='img/star.png' width='25'>";
    }
    else if($overallRating >= 4){
        echo "<br><img src='img/star.png' width='25'>";
        echo "<img src='img/star.png' width='25'>";
        echo "<img src='img/star.png' width='25'>";
        echo "<img src='img/star.png' width='25'>";
    }
    
    echo "<br>Total reviews: $totalReviews";
    echo "</div>";
}    

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Movie Reviews </title>
        <style type="text/css">
            body {
                text-align:center;
            }
            #main {
                display:flex;
                justify-content: center;
            }
            .poster {
                padding: 0 10px;
            }
        </style>
    </head>
    <body>
       
       <h1> Movie Reviews </h1>
        <div id="main">
           <?php
             //NOTE: Add for loop to display 4 movie reviews
             for($i = 0; $i < 4; $i++){
                 movieReviews($i);
             }
           ?>
       </div>
       <br/>
       <hr>
       <h1>Based on ratings you should watch:</h1>
       
    </body>
</html>