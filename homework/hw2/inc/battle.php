<?php

$p_types = array("fire", "water", "grass", "dark", "psychic", "fighting", "ghost", "electric", "normal", "ground");

$effect = array("are not very effective", "are effective", "are super effective ", "have no effect");

function displayTypes($randomTypes, $pos){
    global $p_types;
    
    $typevalue = $p_types[$randomTypes];
    
    echo "<figure id = 'types'>";
    echo "<img id='player$pos' src =\"img/$typevalue.png\" alt='$typevalue' title='". ucfirst($typevalue) ."' width='30%' >";
    echo "</figure>";
} //displayTypes()

function displayWinner($randomType1, $randomType2){
    global $effect;
    global $p_types;
    
    $attack = $effect[0];
    $basetype1 = $p_types[$randomType1];
    $basetype2 = $p_types[$randomType2];
    
    echo "<div id='output'>"; //"fire", "water", "grass", "dark", "psychic", "fighting", ghost, electric, normal, ground
    if($basetype1 == "fire"){
        if($randomType2 == 2){
            $attack = $effect[2];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else if($randomType2 == 0 || $randomType2 == 1){
            $attack = $effect[0];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else {
            $attack = $effect[1];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        }
    } else if($basetype1 == "water"){ //"fire", "water", "grass", "dark", "psychic", "fighting", ghost, electric, normal, ground
        if($randomType2 == 0 || $randomType2 == 9){
            $attack = $effect[2];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else if($randomType2 == 1 || $randomType2 == 2){
            $attack = $effect[0];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else {
            $attack = $effect[1];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        }
    } else if($basetype1 == "grass"){ //"fire", "water", "grass", "dark", "psychic", "fighting", ghost, electric, normal, ground
        if($randomType2 == 1 || $randomType2 == 9){
            $attack = $effect[2];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else if($randomType2 == 0 || $randomType2 == 2){
            $attack = $effect[0];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else {
            $attack = $effect[1];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        }
    } else if($basetype1 == "dark"){ //"fire", "water", "grass", "dark", "psychic", "fighting", ghost, electric, normal, ground
        if($randomType2 == 4 || $randomType2 == 6){
            $attack = $effect[2];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else if($randomType2 == 3 || $randomType2 == 5){
            $attack = $effect[0];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else {
            $attack = $effect[1];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        }
    } else if($basetype1 == "psychic"){ //"fire", "water", "grass", "dark", "psychic", "fighting", ghost, electric, normal, ground
        if($randomType2 == 5){
            $attack = $effect[2];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else if($randomType2 == 4){
            $attack = $effect[0];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else if($randomType2 == 3){
            $attack = $effect[3];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else {
            $attack = $effect[1];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        }
    } else if($basetype1 == "fighting"){ //"fire", "water", "grass", "dark", "psychic", "fighting", ghost, electric, normal, ground
        if($randomType2 == 3 || $randomType2 == 8){
            $attack = $effect[2];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else if($randomType2 == 4){
            $attack = $effect[0];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else if($randomType2 == 6){
            $attack = $effect[3];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else {
            $attack = $effect[1];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        }
    } else if($basetype1 == "ghost"){ //"fire", "water", "grass", "dark", "psychic", "fighting", ghost, electric, normal, ground
        if($randomType2 == 4 || $randomType2 == 6){
            $attack = $effect[2];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else if($randomType2 == 3){
            $attack = $effect[0];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else if($randomType2 == 8){
            $attack = $effect[3];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else {
            $attack = $effect[1];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        }
    } else if($basetype1 == "electric"){ //"fire", "water", "grass", "dark", "psychic", "fighting", ghost, electric, normal, ground
        if($randomType2 == 1){
            $attack = $effect[2];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else if($randomType2 == 2 || $randomType2 == 7){
            $attack = $effect[0];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else if($randomType2 == 9){
            $attack = $effect[3];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else {
            $attack = $effect[1];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        }
    } else if($basetype1 == "normal"){
        if($randomType2 == 6){
            $attack = $effect[3];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else {
            $attack = $effect[1];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        }
    } else if($basetype1 == "ground"){ //"fire", "water", "grass", "dark", "psychic", "fighting", ghost, electric, normal, ground
        if($randomType2 == 0 || $randomType2 == 7){
            $attack = $effect[2];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else if($randomType2 == 2){
            $attack = $effect[0];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        } else {
            $attack = $effect[1];
            echo "<h3>$basetype1 type moves $attack on $basetype2 types.</h3>";
        }
    }
    
    echo "</div>";
}

function displayMatch($randomType){
    
    switch($randomType){ //"fire", "water", "grass", "dark", "psychic", "fighting", ghost, electric, normal, ground
        case 0: echo "<h3>Strength: Grass, Bug, Ice, Steel <br>
                Weakness: Water, Ground, Rock </h3>";
                break;
        case 1: echo "<h3>Strength: Fire, Ground, Rock <br> 
                Weakness: Grass, Electric </h3>";
                break;
        case 2: echo "<h3>Strength: Water, Ground, Rock <br>
                Weakness: Fire, Bug, Ice, Flying </h3>";
                break;
        case 3: echo "<h3>Strength: Psychic, Ghost <br>
                Weakness: Fighting, Bug </h3>";
                break;
    }
    
}

function play() {
    global $p_types;
    
    for($i=1; $i<3; $i++){
        ${"randomType" . $i } = rand(0,9);
        displayTypes(${"randomType" . $i}, $i );
    }
    
    $versus1 = $p_types[$randomType1];
    $versus2 = $p_types[$randomType2];
    echo "<h2> $versus1 vs $versus2 </h2>";
    
    displayWinner($randomType1, $randomType2);
    
    //displayMatch($randomType1);
}

?>
