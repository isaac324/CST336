<?php

$hearts = range(1, 13);
$diamonds = range(1, 13);
$clubs = range(1, 13);
$spades = range(1, 13);

function displayCards(){
    global $hearts;
    global $diamonds;
    global $clubs;
    global $spades;
    
    if(isset($_GET["rows"]) && isset($_GET["columns"]) ){
        $rows = $_GET["rows"];
        $columns = $_GET["columns"];
        $suit = $_GET["suits"];
        
        $suit_name = array("clubs", "diamonds", "hearts", "spades");
        
        
        echo "<table>";
        
        for($i = 0; $i< $rows; $i++){
            echo "<tr class='table-row'>";
            
            for($j = 0; $j<$columns; $j++){
                shuffle($hearts);
                shuffle($diamonds);
                shuffle($clubs);
                shuffle($spades);
                
                $suit_num = rand(0,3);
                $card = array_shift(${$suit_name[$suit_num]});
                
                echo "<td> <img src='cards/".$suit_name[$suit_num]."/".$card.".png' alt='Card Image' title='Card' /> </td>";
            }
            
            echo "</tr>";
        }
        
        echo"</table>";
    }
}
?>