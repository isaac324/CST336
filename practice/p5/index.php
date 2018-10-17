<!DOCTYPE html>
<html>

<!-- This is the head -->
<!-- All styles and javascript go inside the head -->
    <head>
        <meta charset="utf-8" />
        <title>Custom Password Generator</title>

    </head>

    <body>
         <h2>Custom Password Generator</h2>

         <form method = "POST">
                 How many passwords? 
                 <input type="text" name="number" size="3" value =""/>
                 (No more than 8)
             <br><br>
             <strong>Password Length</strong>
            <br>
              <input type="radio" name="length" value="6" <?=($_GET['length'] == "6")?" checked ":""?> > 6 characters
              <input type="radio" name="length" value="8"> 8 characters
              <input type="radio" name="length" value="10"> 10 characters  <br><br>
          
                <input type="checkbox" name="digits" value="digits">Include digits (up to 3 digits will be part of the password)
                
                <br><br>
                <input type="submit" name="create" value="Create Password!">
                <input type="submit" name="history" value="Display Password History">
            
        </form>
        
        <?php
        if (isset($_POST["number"])) {  //checks if the form has been submitted
        $keyword = $_POST["number"];
        }
        
        if(isset($_POST["length"])) {
            $length = $_POST["length"];
        }
        
        if(isset($_POST["digits"])) {
            $digits = $_POST["digits"];
        }
            
        
        if($keyword > 8) {
                echo "<h2> ERROR! The number of passwords to generate should not exceed 8</h2>";
            }
        ?>

    </body>
    <!-- closing body -->
</html>