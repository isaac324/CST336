<?php

//session_start();

//include '../../inc/dbConnection.php';
//$dbConn = startConnection("ottermart");
include 'inc/functions.php';
//validateSession();

// if(isset($_GET['updateProduct'])){ //user has submitted update form

//     $title = $_GET['title'];
//     $price = $_GET['price'];
//     $catId = $_GET['catId'];
//     $conId = $_GET['conId'];
//     $year = $_GET['year'];
//     $image = $_GET['gameImage'];
        
//     $console = getConsole($conId);
//     $category = getCategory($catId);
    
//         //UPDATE `om_product` SET `price` = '300.00' WHERE `om_product`.`productId` = 1;
//         //title, catId, category, conId, console, year, price, image
//         $sql = "UPDATE proj_games 
//                 SET title= :title,
//                   catId = :catId,
//                   category = :category,
//                   conId = :conId,
//                   console = :console,
//                   year = :year,
//                   price = :price,
//                   image = :image
//                 WHERE gameId = " . $_GET['gameId'];
                
//         $np = array();
//         $np[":title"] = $title;
//         $np[":catId"] = $catId;
//         $np[":category"] = $category;
//         $np[":conId"] = $conId;
//         $np[":console"] = $console;
//         $np[":year"] = $year;
//         $np[":price"] = $price;
//         $np[":image"] = $image;
        
//         $stmt = $dbConn->prepare($sql);
//         $stmt->execute($np);
//         //$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record
        
//         header("Location: admin.php");
//     }
    
//     if(isset($_GET['gameId'])){
        
//         $gameInfo = getGameInfo($_GET['gameId']);
        
//         //print_r($productInfo);
//     }

//$game = $_GET['gameId'];
$gameInfo = getGameInfo($_GET['gameId']);

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Games </title>
        <style>
            form{
                margin: 3px;
            }
            h1{
                margin-top:5px;
            }
        </style>
    </head>
    <body>

        <h1> Updating a Game </h1>
        
        
        <form>
            <input type="hidden" name="gameId" value="<?=$gameInfo['gameId']?>">
           Title: <input type="text" name="title" value="<?=$gameInfo['title']?>"><br><br>
           Price: <input type="text" name="price" value="<?=$gameInfo['price']?>"><br><br>
           Category: 
           <select name="catId">
              <option value="">Select One</option>
              <?php
              
              $categories = getCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option  "; 
                  echo  ($category['catId']==$gameInfo['catId'])?"selected":"";
                  echo " value='".$category['catId']."'>" . $category['catName'] . "</option>";
                  
              }
              
              ?>
           </select> <br><br>
           Console: 
           <select name="conId">
              <option value="">Select One</option>
              <?php
              
              $consoles = getConsoles();
              
              foreach ($consoles as $console) {
                  
                  echo "<option  "; 
                  echo  ($console['conId']==$gameInfo['conId'])?"selected":"";
                  echo " value='".$console['conId']."'>" . $console['console'] . "</option>";
                  
              }
              
              ?>
           </select> <br><br>
           Year: <input type="text" name="year" value="<?=$gameInfo['year']?>"><br><br>
           Set Image Url: <input type="text" name="gameImage" value="<?=$gameInfo['image']?>">
           <br><br>
           <input type="submit" name="updateProduct" value="Update Product">
        </form>
        
        <?= updateGames() ?>
        
    </body>
</html>