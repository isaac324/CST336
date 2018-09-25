<?php

$p_types = array("fire", "water", "grass", "dark", "psychic", "fighting");

function displayTypes($randomTypes, $pos){
    global $p_types;
    
    $typevalue = $p_types[$randomTypes];
    
    // switch ($randomValue) {
                
    //     case 0: $symbol = "fire";
    //     break;
        
    //     case 1: $symbol = "water";
    //     break;
        
    //     case 2: $symbol = "grass";
    //     break;
        
    //     case 3: $symbol = "electric";
    //     break;
    // }
    
    echo "<img id='player$pos' src =\"img/$typevalue.png\" alt='$typevalue' title='". ucfirst($typevalue) ."' width='70' >";
} //displayTypes()

function play() {
    for($i=1; $i<3; $i++){
        ${"randomType" . $i } = rand(0,5);
        displayTypes(${"randomType" . $i}, $i );
    }
    displayWinner($randomType1, $randomType2);
}

?>
