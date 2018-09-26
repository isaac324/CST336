<?php

include 'inc/battle.php';

?>
<!DOCTYPE html>
<html>
    <head>
        
        <style>
            @import url("form/styles.css");
        </style>
        
        <title> Pokemon Type Matcher </title>
    </head>
    <body>
        
        <figure id = "chart">
            <img src = "img/pokemontypes.jpg" alt ="Type Chart"/>
        </figure>
        
        <br>
        <div id="main">
            
            <form>
                <!--<select name = "trainer">-->
                <!--    <option value = "fire">Fire</option>-->
                <!--    <option value = "water">Water</option>-->
                <!--    <option value = "grass">Grass</option>-->
                <!--    <option value = "psychic">Psychic</option>-->
                <!--    <option value = "fighting">Fighting</option>-->
                <!--    <option value = "dark">Dark</option>-->
                <!--</select>-->
                
                <input type="submit" name = "submit" value="Battle!"/>
            </form>
            
            <?php
                play();
            ?>
           
        </div>
        
    </body>
</html>