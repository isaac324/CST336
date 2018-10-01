<!DOCTYPE html>
<html>
    <?php
        include 'inc4/functions.php';
    ?>
    <head>
        <style>
            @import url("css4/styles.css");
        </style>
        
    </head>
    
    <body>
        <header>
            <h1>Aces vs Kings</h1>
        </header>
        
        <?php
        
        displayCards();
        
        ?>
        
        <form method="GET">
            Number of Rows: <input type="text" name="rows" size="15" /> <br /><br />
            Number of Columns: <input type="text" name="columns" size="15" /> <br /><br />
            
            Suit of omit: 
            <select name="suits">
                <option value = "hearts">Hearts</option>
                <option value = "diamonds">Diamonds</option>
                <option value = "clubs">Clubs</option>
                <option value = "spades">Spades</option>
            </select>
            
            <input type ="submit" name="submit" value="Submit"/>
            
        </form>
        
    </body>
</html>