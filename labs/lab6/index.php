<?php

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

function displayCategories() { 
    global $dbConn;
    
    $sql = "SELECT * FROM om_category ORDER by catName";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    //echo "<hr>";
    //echo $records[2] . "<br>";
    //echo $records[1]['catDescription'] . "<br>";
    
    foreach ($records as $record) {
        echo "<option value='".$record['catId']."'>" . $record['catName'] . "</option>";
    }
}

function filterProducts() {
    global $dbConn;
    
    echo "<h3>Products Found: </h3>";
    
    $namedParameters = array();
    $product = $_GET['productName'];
    //$description = $_GET['productDescription'];
    
    //This SQL works but it doesn't prevent SQL injection (due to single quotes)
    //$sql = "SELECT * FROM om_product 
    //       WHERE productName LIKE '%$product%'";
    
    $sql = "SELECT * FROM om_product WHERE 1"; //Getting all records from database
    
    if(!empty($product)){
        //This SQL prevents SQL INJECTION by using a named parameter 
        $sql .= " AND productName LIKE :product 
                  OR productDescription LIKE :product";
        $namedParameters[':product'] = "%$product%";
    }
    
    if(!empty($_GET['category'])){
        //This SQL prevents SQL INJECTION by using a named parameter
        $sql .= " AND catId = :category";
        $namedParameters[':category'] = $_GET['category'];
    }
    
    if(!empty($_GET['priceFrom'])){
        $sql .= " AND price >= :pricemin";
        $namedParameters[':pricemin'] = $_GET['priceFrom'];
    }
    
    if(!empty($_GET['priceTo'])){
        $sql .= " AND price <= :pricemax";
        $namedParameters[':pricemax'] = $_GET['priceTo'];
    }
    
    if (isset($_GET['orderBy'])) {
        
        if($_GET['orderBy'] == "productPrice") {
            $sql .= " ORDER BY price";
        } else {
            $sql .= " ORDER BY productName";
        }
        
    }
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    
    
    foreach($records as $record){
        
        echo "<a href='productInfo.php?productId=".$record['productId']."'>";
        echo $record['productName'];
        echo "</a> ";
        echo $record['productDescription'] . " $" . $record['price'] . "<br>";
        
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6 : Ottermart Product Search</title>
        <!--<link rel="stylesheet" href="css/styles.css" type="text/css" />-->
        <style>
            h1, form{
                text-align:center;
            }
        </style>
    </head>
    <body>
        
        <h1> Ottermart Product Search</h1>
        
        <form>
            
            Product: <input type="text" name="productName" placeholder="Product keyword" />
            <br><br>
            Category:
                <select name="category">
                    <option value=""> Select one </option>
                    <?=displayCategories()?>
                </select>
            <br><br>
            Price: From <input type="text" name="priceFrom" size="7"/>
                   To <input type="text" name="priceTo" size="7"/>
            <br><br>
            Order By:
            <br>
            Price <input type="radio" name="orderBy" value="productPrice">
            Name  <input type="radio" name="orderBy" value="productName">
            <br><br>
            <input type="submit" name="searchForm" value="Search"/>
        </form>
        <br>
        <hr>
        
        <?= filterProducts() ?>
        
    </body>
</html>