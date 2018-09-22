<?php

function displaySymbol($randomValue, $pos){
            
            
    switch ($randomValue) {
                
        case 0: $symbol = "seven";
        break;
                
        case 1: $symbol = "lemon";
        break;
                
        case 2: $symbol = "orange";
        break;
        
        case 3: $symbol = "cherry";
        break;
    }
            
            
    echo "<img id='reel$pos' src =\"img/$symbol.png\" alt='$symbol' title='". ucfirst($symbol) ."' width='70' >";
            
}//displaySymbol()
            

function displayPoints($randomValue1, $randomValue2, $randomValue3) {
                
    echo "<div id='output'>";
    if($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3){
        switch ($randomValue1) {
            case 0: $total_points = 1000;
                    echo "<h1>Jackpot!</h1>";
                    echo '<audio autoplay>
                    <source src = "audio/Jackpot.mp3" type="audio/mpeg">
                    </audio>';
                    break;
            case 1: $total_points = 900;
                    echo '<audio autoplay>
                    <source src = "audio/Win.mp3" type="audio/mpeg">
                    </audio>';
                    break;
            case 2: $total_points = 500;
                    echo '<audio autoplay>
                    <source src = "audio/Win.mp3" type="audio/mpeg">
                    </audio>';
                    break;
            case 3: $total_points = 250;
                    echo '<audio autoplay>
                    <source src = "audio/Win.mp3" type="audio/mpeg">
                    </audio>';
                    break;
        }
                    
        echo "<h2>You won $total_points points!</h2>";
    } else {
        echo "<h3> Try Again! </h3>";
        echo '<audio autoplay>
                    <source src = "audio/Lose.mp3" type="audio/mpeg">
                    </audio>';
    }
    echo "</div>";
                
} //displayPoints()
            
function play() {
                
    for($i=1; $i<4; $i++){
        ${"randomValue" . $i } = rand(0,3);
        displaySymbol(${"randomValue" . $i}, $i );
    }
                
    displayPoints($randomValue1, $randomValue2, $randomValue3);
}

?>
