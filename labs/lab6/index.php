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
    
    $namedParameters = array();
    $product = $_GET['productName'];
    
    //This SQL works but it doesn't prevent SQL injection (due to single quotes)
    //$sql = "SELECT * FROM om_product 
    //       WHERE productName LIKE '%$product%'";
    
    
    $sql = "SELECT * FROM om_product WHERE 1"; //Getting all records from database
    
    if(!empty($product)){
        //This SQL prevents SQL INJECTION by using a named parameter 
        $sql .= " AND productName LIKE :product";
        $namedParameters[':product'] = "%product%";
    }
    
    if(!empty($_GET['category'])){
        //This SQL prevents SQL INJECTION by using a named parameter
        $sql .= " AND catId = :category";
        $namedParameters[':category'] = $_GET['category'];
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
        
        
        echo "<a href='productInfo.php?productId=7'>";
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
    </head>
    <body>
        
        <h1> Ottermart </h1>
        <h2> Poduct Search </h2>
        
        <form>
            Product: <input type="text" name="productName" placeholder="Product keyword" />
            
            Category:
            <select name="category">
                <option value=""> Select one </option>
                <?=displayCategories()?>
            </select>
            
            Price: From: <input type="text" name="priceFrom" />
            To: <input type="text" name="priceTo" />
            <br>
            Order By:
            Price <input type="radio" name="orderBy" value="productPrice">
            Name <input type="radio" name="orderBy" value="productName">
            <br>
            <input type="submit" name="submit" value="Search!"/>
        </form>
        <br>
        <hr>
        
        <?= filterProducts() ?>
        
    </body>
</html>