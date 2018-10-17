<?php
    if(isset($_POST["job"])) {
        $job = $_POST["job"];
    }

    if(isset($_POST["region"])) {
        $region = $_POST["region"];
    }
    
    if(isset($_POST["gameplay"])) {
        $gameplay = $_POST["gameplay"];
    }
    
    if(isset($_POST["color"])) {
        if(validBackground()){
            $color = $_POST["color"];
        }
    }
        
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
        if (empty($_POST["color"])) {
        echo "<h3> ERROR!!! You must select a color for this form.</h3>";
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
            }
            
            form {
                border-style: solid;
                background-color: gray;
                padding: 5px;
            }
            
            h1 {
                background-color: gray;
                border-style: solid;
            }
            h2 {
                color: black;
                border-style: solid;
            }
            h3 {
                border-style: solid;
                border-color: black;
                background-color: gray;
                color: yellow;
            }
        </style>
    </head>
    <body style = 'background-color: <?php echo $color;?>'>
        
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
            <input type="radio" name="gameplay" value="safe"> Play it Safe.  
            <input type="radio" name="gameplay" value="risk"> High Risk, High Reward.
            <br><br>
            
             Color:
            <select name="color">
                <option value=""> Select one </option>
                <option value="red">Red</option>
                <option value="blue">Blue</option>
                <option value="yellow">Yellow</option>
            </select>
            <br><br>
            
            Would you like some music?
            <input type="checkbox" name="music" value="yes"> Yes
            <br><br>
            
            <input type="submit" name="submit" value="Search"/>
        </form>
        
        <?php
            if( IsformValid()){
                $ophilia = 0; $alfyn = 0; $tressa = 0;
            }
        ?>
        
    </body>
</html>