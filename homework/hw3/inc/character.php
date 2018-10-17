<?php

function character($traveler){
    if($traveler == "ophilia"){
        echo '<audio autoplay>
                    <source src = "audio/ophilia.mp3" type="audio/mpeg">
                    </audio>';
        echo "<h2 style ='background-color:white;'>".ucfirst($traveler)."</h2>";
        echo "<p>cleric</p>";
    }
    else if($traveler == "cyrus") {
        echo '<audio autoplay>
                    <source src = "audio/cyrus.mp3" type="audio/mpeg">
                    </audio>';
        echo "<h2 style ='background-color:black; color:white;'>".ucfirst($traveler)."</h2>";
    }
    else if($traveler == "tressa") {
        echo '<audio autoplay>
                    <source src = "audio/tressa.mp3" type="audio/mpeg">
                    </audio>';
        echo "<h2 style ='background-color:yellow;'>".ucfirst($traveler)."</h2>";
    }
    else if($traveler == "olberic") {
        echo '<audio autoplay>
                    <source src = "audio/olberic.mp3" type="audio/mpeg">
                    </audio>';
        echo "<h2 style ='background-color:blue; color:white;'>".ucfirst($traveler)."</h2>";
    }
    else if($traveler == "primrose") {
        echo '<audio autoplay>
                    <source src = "audio/primrose.mp3" type="audio/mpeg">
                    </audio>';
        echo "<h2 style ='background-color:red;'>".ucfirst($traveler)."</h2>";
    }
    else if($traveler == "alfyn") {
        echo '<audio autoplay>
                    <source src = "audio/alfyn.mp3" type="audio/mpeg">
                    </audio>';
        echo "<h2 style ='background-color:green;'>".ucfirst($traveler)."</h2>";
    }
    else if($traveler == "therion") {
        echo '<audio autoplay>
                    <source src = "audio/therion.mp3" type="audio/mpeg">
                    </audio>';
        echo "<h2 style ='background-color:purple; color:white;'>".ucfirst($traveler)."</h2>";
    }
    else if($traveler == "haanit") {
        echo '<audio autoplay>
                    <source src = "audio/haanit.mp3" type="audio/mpeg">
                    </audio>';
        echo "<h2 style ='background-color:pink;'>H'aanit</h2>";
    }
}

?>