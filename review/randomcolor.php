<?php
        
        function getLuckyNumber(){
            
            do{
                $n = rand(1,10);
            } while ($n == 4);
            echo $n;
            
        }
        
        function getrandomcolor(){
            echo 
        }
        
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Random Colors & Numbers </title>
        <style>
            
            body {
                
                <?php
                
                    $blue = rand(0,255);
                    $red = rand(0,255);
                    $opac = (rand(0,10)/10);
                    
                    echo "background-color: rgba($red,".rand(0,255).", $blue,$opac);";
                
                ?>
                
                
                
            }
            
            h1 {
                
                background-color: <?= getrandomcolor(); ?> 
                /* use (=) when you want to display something */
                
            }
            
        </style>
    </head>
    <body>
        
        <h1>
        My lucky number is:
        
        <?php
        
            getLuckyNumber();
        
        ?>
        </h1>
    </body>
</html>