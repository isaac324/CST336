<?php

function displaySymbol($randomValue, $pos){
            
            //$random_value = rand(0,2); //Generates a random number from 0 to 2
            
            // if($random_value == 0){
            //     $symbol = "seven";
            // } else if($random_value == 1){
            //     $symbol = "orange";
            // } else {
            //     $symbol = "cherry";
            // }
            
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
                    break;
            case 1: $total_points = 900;
                    break;
            case 2: $total_points = 500;
                    break;
            case 3: $total_points = 250;
        }
                    
        echo "<h2>You won $total_points points!</h2>";
    } else {
        echo "<h3> Try Again! </h3>";
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
