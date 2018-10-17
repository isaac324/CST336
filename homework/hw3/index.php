<?php

$backgroundImage = "img/map.jpg";

$traveler = array("ophilia", "cyrus", "tressa", "olberic", "primrose", "alfyn", "therion", "haanit");

$result = $traveler[0];

include 'inc/character.php';

    if(isset($_POST["job"])) {
        $job = $_POST["job"];
    }

    if(isset($_POST["region"])) {
        $region = $_POST["region"];
    }
    
    if(isset($_POST["gameplay"])) {
        $gameplay = $_POST["gameplay"];
    }
    
    if(isset($_POST["npc"])) {
        $npc = $_POST["npc"];
        // if(validBackground()){
        //     $color = $_POST["color"];
        // }
    }
    
    // if(isset($_POST["color"])) {
    //     if(validBackground()){
    //         $color = $_POST["color"];
    //     }
    // }
    
    if(isset($_POST["music"])) {
        $music = $_POST["music"];
    }
    
    
    function IsformValid(){
        $valid = true;
        
        if (empty($_POST["job"])) {
        echo "<h3> ERROR!!! You must select a job for this form.</h3>";
        $valid = false;
        }
        if (empty($_POST["region"])) {
        echo "<h3> ERROR!!! You must select a region for this form.</h3>";
        $valid = false;
        }
        if (empty($_POST["gameplay"])) {
        echo "<h3> ERROR!!! You must select a gameplay for this form.</h3>";
        $valid = false;
        }
        // if (empty($_POST["npc"])) {
        // echo "<h3> ERROR!!! You must select an interaction for this form.</h3>";
        // $valid = false; 
        // }
        if (empty($_POST["npc"])) {
        echo "<h3> ERROR!!! You must select an interaction for this form.</h3>";
        $valid = false; 
        }
        if (empty($_POST["music"])) {
        echo "<h3> ERROR!!! You must select music for this form.</h3>";
        $valid = false;
        }
        
        return $valid;
    }
    
    function validBackground(){
        if(empty($_POST["region"]) || empty($_POST["gameplay"]) || empty($_POST["job"]) || empty($_POST["music"])){
            return false;
        }
        return true;
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Homework 3</title>
        <style>
            body {
                text-align: center;
                background-image: url(<?=$backgroundImage?>);
                background-size: cover;
            }
            
            h1, form {
                border-style: solid;
                background-color: Lightgray;
                padding: 5px;
            }
            h2 {
                color: black;
                border-style: solid;
                border-color: black;
            }
            h3 {
                border-style: solid;
                border-color: black;
                background-color: black;
                color: yellow;
            }
            #profile {
                text-align: center;
            }
            #characters {
                border-style: solid;
                border-color: black;
                border-width: 5px;
            }
            footer{
                text-align: center;
                font-size:1em;
                color: yellow;
                background-color:black;
                border-style:solid;
                border-color:black;
                width: 300px;
                margin:0 auto;
                padding-top:10px;
                clear: left;
            }
        </style>
    </head>
    <body> 
        <!--<body style = 'background-color: php echo $color;'>-->
        <h1> Homework 3 </h1>
        
        <form method="POST">
            
            Pick a Job: <br> 
            <input type="radio" name="job" value="cleric"> Cleric
            <input type="radio" name="job" value="scholar"> Scholar
            <input type="radio" name="job" value="merchant"> Merchant
            <input type="radio" name="job" value="warrior"> Warrior
            <input type="radio" name="job" value="dancer"> Dancer
            <input type="radio" name="job" value="apothecary"> Apothecary
            <input type="radio" name="job" value="thief"> Thief
            <input type="radio" name="job" value="hunter"> Hunter
            <br /><br />
            
            Pick a region: 
            <input type="text" name="region" placeholder="Region" /><br>
            (Ex: Tundra, Desert, Forest, Mountain, Canyon, Coast, River, Plains) <br><br>  
            
            What is your play style? <br>
            <input type="radio" name="gameplay" value="safe"> Play it Safe. <br>  
            <input type="radio" name="gameplay" value="risk"> High Risk, High Reward.
            <br><br>
            
            How do you interact with NPCs?
            <select name="npc">
                <option value=""> Select one </option>
                <option value="fight">Fight them.</option>
                <option value="item">Get items from them.</option>
                <option value="info">Get information from them.</option>
                <option value="help">Get help from them.</option>
            </select>
            <br><br>
            
            Would you like some music?
            <input type="checkbox" name="music" value="yes"> Yes
            <br><br>
            
            <!--Color:-->
            <!--<select name="color">-->
            <!--    <option value=""> Select one </option>-->
            <!--    <option value="white">White</option>-->
            <!--    <option value="black">Black</option>-->
            <!--    <option value="yellow">Yellow</option>-->
            <!--    <option value="blue">Blue</option>-->
            <!--    <option value="red">Red</option>-->
            <!--    <option value="green">Green</option>-->
            <!--    <option value="purple">Purple</option>-->
            <!--    <option value="pink">Pink</option>-->
            <!--</select>-->
            <!--<br><br>-->
            
            <input type="submit" name="submit" value="Search"/>
        </form>
        
        <?php
            if( IsformValid()){
                global $result;
                global $color;
                
                $most = 0;
                $ophilia = 0; $cyrus = 0; $tressa = 0; $olberic = 0; $primrose = 0; $alfyn = 0; $therion = 0; $haanit = 0;
                
                if($job == "cleric"){
                    $ophilia += 1;
                } else if($job == "scholar"){
                    $cyrus += 1;
                } else if($job == "merchant"){
                    $tressa += 1;
                } else if($job == "warrior"){
                    $olberic += 1;
                } else if($job == "dancer"){
                    $primrose += 1;
                } else if($job == "apothecary"){
                    $alfyn += 1;
                } else if($job == "thief"){
                    $therion += 1;
                } else if($job == "hunter"){
                    $haanit += 1;
                }
                
                if(ucfirst($region) == "Tundra"){
                    $ophilia += 1;
                } else if(ucfirst($region) == "Plains"){
                    $cyrus += 1;
                } else if(ucfirst($region) == "Coast"){
                    $tressa += 1;
                } else if(ucfirst($region) == "Mountain"){
                    $olberic += 1;
                } else if(ucfirst($region) == "Desert"){
                    $primrose += 1;
                } else if(ucfirst($region) == "River"){
                    $alfyn += 1;
                } else if(ucfirst($region) == "Canyon"){
                    $therion += 1;
                } else if(ucfirst($region) == "Forest"){
                    $haanit += 1;
                }
                
                if($gameplay == "safe"){
                    $ophilia += 1;
                    $tressa += 1;
                    $olberic += 1;
                    $alfyn += 1;
                } else {
                    $primrose += 1; 
                    $cyrus += 1;
                    $therion += 1;
                    $haanit += 1;
                }
                
                if($npc == "fight"){
                    $olberic += 1;
                    $haanit += 1;
                } else if($npc == "item"){
                    $tressa += 1;
                    $therion += 1;
                } else if($npc == "info"){
                    $cyrus += 1;
                    $alfyn += 1;
                } else if($npc == "help"){
                    $primrose += 1;
                    $ophilia += 1;
                }
                
                for($i = 0; $i < 8; $i++){
                    if(${$traveler[$i]} > $most){
                        $most = ${$traveler[$i]};
                        $result = $traveler[$i];
                    }
                }
                
                echo"<br>";
                echo "<figure id = 'profile'>";
                echo "<img id='characters' src =\"img/$result.png\" alt='$result' title='". ucfirst($result) ."' width='30%' >";
                echo "</figure>";
                
                character($result);
                
            }
        ?>
        
        <br><br>
        <footer>
            <span class = "last">CST 336 &copy; 2018 Isaac Avila</span> <br />
            
            <br />
            
            <!--<figure>-->
            <!--    <img src = "img/buddy.png" width = '70'> -->
            <!--</figure>-->
        </footer>
        
    </body>
</html>