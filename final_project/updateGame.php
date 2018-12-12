<?php

//session_start();

// include '../../inc/dbConnection.php';
// $dbConn = startConnection("ottermart");
include 'inc/functions.php';
//validateSession();

// if(isset($_GET['updateProduct'])){ //user has submitted update form
//     $productName = $_GET['productName'];
//     $description =  $_GET['description'];
//     $price =  $_GET['price'];
//     $catId =  $_GET['catId'];
//     $image = $_GET['productImage'];
    
//     //UPDATE `om_product` SET `price` = '300.00' WHERE `om_product`.`productId` = 1;
//     $sql = "UPDATE om_product 
//             SET productName= :productName,
//               productDescription = :productDescription,
//               price = :price,
//               catId = :catId,
//               productImage = :productImage
//             WHERE productId = " . $_GET['productId'];
            
//     $np = array();
//     $np[':productName'] = $productName;
//     $np[':productDescription'] = $description;
//     $np[':price'] = $price;
//     $np[':catId'] = $catId;
//     $np[':productImage'] = $image;
    
//     $stmt = $dbConn->prepare($sql);
//     $stmt->execute($np);
//     //$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record
    
//     header("Location: admin.php");
// }

// if(isset($_GET['gameId'])){
    
//     $gameInfo = getGameInfo($_GET['gameId']);
    
//     //print_r($productInfo);
    
// }

//header("Location: admin.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Games </title>
    </head>
    <body>

        <h1> Updating a Game </h1>
        
        <form>
            <input type="hidden" name="gameId" value="<?=$gameInfo['gameId']?>">
           Title: <input type="text" name="title" value="<?=$gameInfo['title']?>"><br>
           Price: <input type="text" name="price" value="<?=$gameInfo['price']?>"><br>
           Category: 
           <select name="catId">
              <option value="">Select One</option>
              <?php
              
              $categories = getCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option  "; 
                  echo  ($category['catId']==$productInfo['catId'])?"selected":"";
                  echo " value='".$category['catId']."'>" . $category['catName'] . "</option>";
                  
              }
              
              ?>
           </select> <br />
           Set Image Url: <input type="text" name="gameImage" value="<?=$gameInfo['gameImage']?>"><br>
           <input type="submit" name="updateProduct" value="Update Product">
        </form>
        
        
    </body>
</html>