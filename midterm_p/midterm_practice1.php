<?php
    session_start();

    $France  = array("bordeaux", "le_havre", "lyon", "montpellier", "paris", "strasbourg");
    $Mexico = array("acapulco", "cabos", "cancun", "chichenitza", "huatulco", "mexico_city");
    $USA = array("chicago", "hollywood", "las_vegas", "ny", "washington_dc", "yosemite");
    
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Midterm Practice</title>
        <style>
        body {
            text-align: center;
        }
        td {
            border:1px solid black;
            width:100px;
            height:100px;
        }
        img {
            width: 50%;
            height: 50%;
        }
        </style>
    </head>
    <body>
        
        <h1> Midterm Practice </h1>
        
        <form method="POST">
            Select Month: 
            <select name="month">
                <option value=""> Select </option>
                <option value="November"> November </option>
                <option value="December"> December </option>
                <option value="January"> January </option>
                <option value="February"> February </option>
            </select>
            <br /><br />
            
            Number of Locations: 
            <input type="radio" name="locations" value="3" <?=($_GET['locations'] == "3")?" checked ":""?> > <strong>Three</strong>
            <input type="radio" name="locations" value="4"> <strong>Four</strong>
            <input type="radio" name="locations" value="5"> <strong>Five</strong>
            <br /><br />
            
            Select Country: 
            <select name="country">
                <option value="USA"> USA </option>
                <option value="Mexico"> Mexico </option>
                <option value="France"> France </option>
            </select>
            <br /><br />
            
            Visit locations in alphabetical order: 
            <input type="checkbox" name="order" value="1"> <strong>A-Z</strong>
            <input type="checkbox" name="order" value="2"> <strong>Z-A</strong>
            <br /><br />
            
            <input type="submit" name="submit" value="Create Itinerary"/>
        </form>
        
        <?php
        
        if(isset($_POST["month"])) {
            $month = $_POST["month"];
        }
        if($_POST["month"] == "") {
            echo "<h2>You must select a month.</h2>";
            echo "<br>";
        }
        
        if(isset($_POST["locations"])) {
            $locations = $_POST["locations"];
        } else {
            echo "<h2>You must select a number of locations.</h2>";
            echo "<br>";
        }
        
        if(isset($_POST["country"])) {
            $country = $_POST["country"];
        }
        
        if(isset($_POST["order"])) {
            $order = $_POST["order"];
        } else {
            $order = 0;
        }
        
        
        if(!empty($_POST["month"]) && isset($_POST["locations"]) && isset($_POST["country"])){
            if($order == 2){
                if($country == "USA"){
                    rsort($USA);
                } else if($country == "Mexico"){
                    rsort($Mexico);
                } else if($country == "France"){
                    rsort($France);
                }
            }
            
            if($month == "November"){
                $days = 30;
            } else if($month == "December" || $month == "January"){
                $days = 31;
            } else{
                $days = 28;
            }
            
            echo "<table>";
            echo "<tr>";
            for($i = 1; $i <= $days; $i++){
                echo "<td> $i </td>";
                if($i % 7 == 0){
                    echo "</tr>";
                    echo "<tr>";
                }
            }
            echo "</table>";
            
        } //end of calendar generator
        
        ?>
        
    </body>
    
    <br><br>  
    <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#FFC0C0">
      <td>1</td>
      <td>The page includes the form elements as the Program Sample: dropdown menu, radio buttons, etc.</td>
      <td width="20" align="center">5</td>
    </tr>
    <tr style="background-color:#FFC0C0">
      <td>2</td>
      <td>Errors are displayed if month or number of locations are not submitted.</td>
      <td width="20" align="center">5</td>
    </tr> 
    <tr style="background-color:#FFC0C0">
      <td>3</td>
      <td>Header and Subheader are displayed with info submitted. </td>
      <td align="center">5</td>
    </tr>    
	<tr style="background-color:#FFC0C0">
      <td>4</td>
      <td>A table with days and weeks is displayed when submitting the form</td>
      <td align="center">5</td>
    </tr> 
    <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td>The number of days in the table correspond to the month selected</td>
      <td align="center">10</td>
    </tr>
    <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>Random images are displayed in random days</td>
      <td align="center">5</td>
    </tr>       
    <tr style="background-color:#FFC0C0">
      <td>7</td>
      <td>The number of random images correspond to the number of locations and country submitted</td>
      <td align="center">10</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>8</td>
      <td>The proper name of the location is displayed below the image 
      		(e.g. "New York", "Las Vegas")</td>
      <td align="center">10</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>9</td>
      <td>The list of months submitted along with the country and number of locations is displayed below the table (using Sessions)</td>
      <td align="center">15</td>
    </tr>    
    <tr style="background-color:#FFC0C0">
      <td>10</td>
      <td>Random locations should be ordered alphabetically, if user checks corresponding radio button (A-Z or Z-A). </td>
      <td align="center">15</td>
    </tr>        
    <tr style="background-color:#FFC0C0">
      <td>11</td>
      <td>The web page uses Bootstrap and has a nice look. </td>
      <td align="center">5</td>
    </tr>        
 <!--   <tr style="background-color:#99E999">
      <td>12</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>   -->  
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>

</html>