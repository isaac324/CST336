<?php
    $zodiac = array("rat", "ox", "tiger", "rabbit", "dragon", "snake", 
    "horse", "goat", "monkey", "rooster", "dog", "pig");

function yearList($startyear, $endyear){
    global $zodiac;
    $sum = 0;
    $counter = 0;
    $olymipic = 0;
    
    for($i = $startyear; $i <= $endyear; $i++){
        $sum += $i;
        
        echo "<li> Year $i ";
        
        if($i == 1776){
        echo "<strong>USA INDENPENDENCE!</strong>";
        }
        
        if($i%100 == 0){
            echo "<strong>Happy New Century</strong>";
        }
        
        echo "<br />";
        
        if($olympic%4 == 0){
            echo "<img src = 'img/".$zodiac[$counter].".png'>";
            $olympic++;
        } else {
            $olympic++;
        }
        
        if($counter == 11){
            $counter = 0;
        } else {
            $counter++;
        }
        
        echo "<br />";
    }
    echo "<br />";
    
    return $sum;
}

?>

<!DOCTYPE html>
<html>

<!-- This is the head -->
<!-- All styles and javascript go inside the head -->
    <head>
        <meta charset="utf-8" />
        <title>Zodiac</title>
        <style>
            body {
                text-align: center;
            }
            
        </style>

    </head>

    <body>
        <h1>Chinese Zodiac Task</h1> <br />
        
            <?= "<strong> Year Sum: ". yearList(1900, 2000) ."</strong>" ?>
            
            <form method = "GET">
                Row <input type="text" name="row" size="4" value =""/>  
                Column <input type="text" name="column" size="4" value =""/> <br />
            </form>
            
            <?php
            
            if (isset($_GET["row"])) {
                $rownumber = $_GET["row"];
            }
            
            if(isset($_GET["column"])) {
                $columnnumber = $_GET["column"];
            }
            
            ?>
        
    </body>
    <!-- closing body -->
</html>