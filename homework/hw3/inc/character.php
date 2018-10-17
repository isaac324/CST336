<?php

function character($traveler){
    if($traveler == "ophilia"){
        echo '<audio autoplay>
                    <source src = "audio/ophilia.mp3" type="audio/mpeg">
                    </audio>';
        echo "<h2 style ='background-color:white;'>".ucfirst($traveler)."</h2>";
        
        echo "<div id = 'bio'>";
        echo "<ul>";
        echo "<li><span class = 'topic'><strong>Job:</strong></span> Cleric</li>";
        echo "<li><span class = 'topic'><strong>Hometown:</strong></span> Frostlands - Flamesgrace</li>";
        echo "<li><span class = 'topic'><strong>Weapon:</strong></span> Staves</li>";
        echo "<li><span class = 'topic'><strong>Path Action:</strong></span> Guide</li>";
        echo "</ul>";
        echo "</div>";
    }
    else if($traveler == "cyrus") {
        echo '<audio autoplay>
                    <source src = "audio/cyrus.mp3" type="audio/mpeg">
                    </audio>';
        echo "<h2 style ='background-color:black; color:white;'>".ucfirst($traveler)."</h2>";
        
        echo "<div id = 'bio'>";
        echo "<ul>";
        echo "<li><span class = 'topic'><strong>Job:</strong></span> Scholar</li>";
        echo "<li><span class = 'topic'><strong>Hometown:</strong></span> Flatlands - Atlasdam</li>";
        echo "<li><span class = 'topic'><strong>Weapon:</strong></span> Staves</li>";
        echo "<li><span class = 'topic'><strong>Path Action:</strong></span> Scrutinize</li>";
        echo "</ul>";
        echo "</div>";
    }
    else if($traveler == "tressa") {
        echo '<audio autoplay>
                    <source src = "audio/tressa.mp3" type="audio/mpeg">
                    </audio>';
        echo "<h2 style ='background-color:yellow;'>".ucfirst($traveler)."</h2>";
        
        echo "<div id = 'bio'>";
        echo "<ul>";
        echo "<li><span class = 'topic'><strong>Job:</strong></span> Merchant</li>";
        echo "<li><span class = 'topic'><strong>Hometown:</strong></span> Coastlands - Rippletide</li>";
        echo "<li><span class = 'topic'><strong>Weapon:</strong></span> Polearms and Bows</li>";
        echo "<li><span class = 'topic'><strong>Path Action:</strong></span> Purchase</li>";
        echo "</ul>";
        echo "</div>";
    }
    else if($traveler == "olberic") {
        echo '<audio autoplay>
                    <source src = "audio/olberic.mp3" type="audio/mpeg">
                    </audio>';
        echo "<h2 style ='background-color:blue; color:white;'>".ucfirst($traveler)."</h2>";
        
        echo "<div id = 'bio'>";
        echo "<ul>";
        echo "<li><span class = 'topic'><strong>Job:</strong></span> Warrior</li>";
        echo "<li><span class = 'topic'><strong>Hometown:</strong></span> Highlands - Cobblestone</li>";
        echo "<li><span class = 'topic'><strong>Weapon:</strong></span> Swords and Polearms</li>";
        echo "<li><span class = 'topic'><strong>Path Action:</strong></span> Challenge</li>";
        echo "</ul>";
        echo "</div>";
    }
    else if($traveler == "primrose") {
        echo '<audio autoplay>
                    <source src = "audio/primrose.mp3" type="audio/mpeg">
                    </audio>';
        echo "<h2 style ='background-color:red;'>".ucfirst($traveler)."</h2>";
        
        echo "<div id = 'bio'>";
        echo "<ul>";
        echo "<li><span class = 'topic'><strong>Job:</strong></span> Dancer</li>";
        echo "<li><span class = 'topic'><strong>Hometown:</strong></span> Sunlands - Sunshade</li>";
        echo "<li><span class = 'topic'><strong>Weapon:</strong></span> Daggers</li>";
        echo "<li><span class = 'topic'><strong>Path Action:</strong></span> Allure</li>";
        echo "</ul>";
        echo "</div>";
    }
    else if($traveler == "alfyn") {
        echo '<audio autoplay>
                    <source src = "audio/alfyn.mp3" type="audio/mpeg">
                    </audio>';
        echo "<h2 style ='background-color:green;'>".ucfirst($traveler)."</h2>";
        
        echo "<div id = 'bio'>";
        echo "<ul>";
        echo "<li><span class = 'topic'><strong>Job:</strong></span> Apothecary</li>";
        echo "<li><span class = 'topic'><strong>Hometown:</strong></span> Riverlands - Clearbrook</li>";
        echo "<li><span class = 'topic'><strong>Weapon:</strong></span> Axes</li>";
        echo "<li><span class = 'topic'><strong>Path Action:</strong></span> Inquire</li>";
        echo "</ul>";
        echo "</div>";
    }
    else if($traveler == "therion") {
        echo '<audio autoplay>
                    <source src = "audio/therion.mp3" type="audio/mpeg">
                    </audio>';
        echo "<h2 style ='background-color:purple; color:white;'>".ucfirst($traveler)."</h2>";
        
        echo "<div id = 'bio'>";
        echo "<ul>";
        echo "<li><span class = 'topic'><strong>Job:</strong></span> Thief</li>";
        echo "<li><span class = 'topic'><strong>Hometown:</strong></span> Cliftlands - Bolderfall</li>";
        echo "<li><span class = 'topic'><strong>Weapon:</strong></span> Daggers and Swords</li>";
        echo "<li><span class = 'topic'><strong>Path Action:</strong></span> Steal</li>";
        echo "</ul>";
        echo "</div>";
    }
    else if($traveler == "haanit") {
        echo '<audio autoplay>
                    <source src = "audio/haanit.mp3" type="audio/mpeg">
                    </audio>';
        echo "<h2 style ='background-color:pink;'>H'aanit</h2>";
        
        echo "<div id = 'bio'>";
        echo "<ul>";
        echo "<li><span class = 'topic'><strong>Job:</strong></span> Hunter</li>";
        echo "<li><span class = 'topic'><strong>Hometown:</strong></span> Woodlands - S'warkii</li>";
        echo "<li><span class = 'topic'><strong>Weapon:</strong></span> Bows and Axes</li>";
        echo "<li><span class = 'topic'><strong>Path Action:</strong></span> Provoke</li>";
        echo "</ul>";
        echo "</div>";
    }
}

?>