<!--name - b730b49a8f46f0-->
<!--password - 895fc035-->
<!--host name - us-cdbr-iron-east-01.cleardb.net-->
<!--database name - heroku_0c556d5f9895652-->
<?php

include '../inc/dbConnection.php';
$dbConn = startConnection("midterm");

function displayPopulation(){
    global $dbConn;
    
    $sql = "SELECT *
            FROM mp_town
            WHERE population > 50000 && population < 80000";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    
    foreach ($records as $record) {
        echo $record['town_name'];
        echo " - ";
        echo $record['population'];
        echo "<br>";
    }
    
}

function displayOrder() {
    global $dbConn;
    
    $sql = "SELECT *
            FROM mp_town
            ORDER BY population DESC";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    
    foreach ($records as $record) {
        echo $record['town_name'];
        echo " - ";
        echo $record['population'];
        echo "<br>";
    }
}

function displayLeast() {
    global $dbConn;
    
    $sql = "SELECT *
            FROM mp_town
            ORDER BY population ASC";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    $counter = 0;
    foreach ($records as $record) {
        if($counter == 3){
            break;
        }
        echo $record['town_name'];
        echo " - ";
        echo $record['population'];
        echo "<br>";
        $counter++;
    }
}

function displayTown(){
    global $dbConn;
    
    $sql = "SELECT *
            FROM mp_county
            WHERE county_name LIKE 'S%' ";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    
    foreach ($records as $record) {
        echo $record['county_name'];
        echo "<br>";
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Midterm Practice </title>
    </head>
    <body>

        <h2>Midterm Practice 2</h2>
        
        <?php displayPopulation(); ?>
        <br><br>
        <?php displayOrder(); ?>
        <br><br>
        <?php displayLeast(); ?>
        <br><br>
        <?php displayTown(); ?>
        <br><br>
        
    </body>
      
  <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:green">
      <td>1</td>
      <td>The report shows all cities/towns that have a population between 50,000 and 80,000</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:green">
      <td>2</td>
      <td>The report shows all towns ordered by population (from biggest to smallest)</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:green">
      <td>3</td>
      <td>The report lists the three least populated towns</td>
      <td width="20" align="center">10</td>
    </tr>     
    <tr style="background-color:green">
        <!--change color #FFC0C0 to lime if it's complete-->
      <td>4</td>
      <td>The report Lists the counties that start with the letter "S"</td>
      <td width="20" align="center">10</td>
    </tr>
<!--     <tr style="background-color:#99E999">
      <td>7</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
 </tr>     -->
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>    

</html>
