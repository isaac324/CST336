<?php
session_start();

// include 'inc/dbConnection.php';
// $dbConn = startConnection("project");
include 'inc/functions.php';

// if(isset($_GET['addGame'])) { //checks whether the form was submitted
    
//     $title = $_GET['title'];
//     $price = $_GET['price'];
//     $catId = $_GET['catId'];
//     $conId = $_GET['conId'];
//     $year = $_GET['year'];
//     $image = $_GET['gameImage'];
    
//     $console = getConsoles($conId);
//     $category = getCategories($catId);
    
//     //title, catId, category, conId, console, year, price, image
//     $sql = "INSERT INTO proj_games (title, catId, category, conId, console, year, price, image) 
//             VALUES (:title, :catId, :category, :conId, :console, :year, :price, :image);";
//     $np = array();
//     $np[":title"] = $title;
//     $np[":catId"] = $catId;
//     $np[":category"] = $category;
//     $np[":conId"] = $conId;
//     $np[":console"] = $console;
//     $np[":year"] = $year;
//     $np[":price"] = $price;
//     $np[":image"] = $image;
    
//     $stmt = $dbConn->prepare($sql);
//     $stmt->execute($np);
//     echo "New Product was added!";
    
//     header("Location: admin.php");
    
// }

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Add New Product </title>
    </head>
    <body>
        
        <h1> Adding New Game </h1>
        
        <form>
           Title: <input type="text" name="title"><br>
           Price: <input type="text" name="price"><br>
           Category: 
           <select name="catId">
              <option value=""> Select one </option>
                    <?=displayCategories()?>
           </select> <br />
           Console:
           <select name="conId">
              <option value=""> Select one </option>
                    <?=displayConsoles()?>
           </select> <br />
           Year: <input type="text" name="year"><br>
           Set Image Url: <input type="text" name="gameImage"><br>
           <input type="submit" name="addGame" value="Add Product">
        </form>
        
        <?= addGames() ?>

    </body>
</html>