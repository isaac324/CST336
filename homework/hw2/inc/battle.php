<?php

$p_types = array("fire", "water", "grass", "dark", "psychic", "fighting");

$effect = array("not very effective", "effective", "super effective");

function displayTypes($randomTypes, $pos){
    global $p_types;
    
    $typevalue = $p_types[$randomTypes];
    
    echo "<figure id = 'types'>";
    echo "<img id='player$pos' src =\"img/$typevalue.png\" alt='$typevalue' title='". ucfirst($typevalue) ."' width='15%' >";
    echo "</figure>";
} //displayTypes()

function displayWinner($randomType1, $randomType2){
    global $effect;
    global $p_types;
    $attack = $effect[0];
    $basetype1 = $p_types[0];
    $basetype2 = $p_types[0];
    
    echo "<div id='output'>";
    if($randomType1 == $randomType2){
        switch($randomType1){
            case 0: $attack = $effect[0];
                    $basetype1 = $p_types[$randomType1];
                    $basetype2 = $p_types[$randomType2];
                    echo "<h3>$basetype1 types are $attack against  $basetype2 types.</h3>";
                    break;
        }
    }
    echo "</div>";
}

function play() {
    
    for($i=1; $i<3; $i++){
        ${"randomType" . $i } = rand(0,0);
        displayTypes(${"randomType" . $i}, $i );
    }
    displayWinner($randomType1, $randomType2);
}

?>
