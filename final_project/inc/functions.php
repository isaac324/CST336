<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("project");

function validateSession(){
    if (!isset($_SESSION['adminFullName'])) {
        header("Location: index.php");  //redirects users who haven't logged in 
        exit;
    }
}

function displayCategories() { 
    global $dbConn;
    
    $sql = "SELECT * FROM proj_category ORDER by catName";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        echo "<option value='".$record['catId']."'>" . $record['catName'] . "</option>";
    }
}

function getCategory($cat) {
    global $dbConn;
    
    $sql = "SELECT * FROM proj_category";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    foreach($records as $record){
        if($record['catId'] == $cat){
            $category = $record['catName'];
        }
    }
    
    return $category;
}

function getCategories() {
    global $dbConn;
    
    $sql = "SELECT * FROM proj_category";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    //print_r($records);
    
    return $records;
    
}

function displayConsoles() { 
    global $dbConn;
    
    $sql = "SELECT * FROM proj_consoles ORDER by console";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        echo "<option value='".$record['conId']."'>" . $record['console'] . "</option>";
    }
}

function getConsole($con) {
    global $dbConn;
    
    $sql = "SELECT * FROM proj_consoles";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    foreach($records as $record){
        if($record['conId'] == $con){
            $console = $record['console'];
        }
    }
    
    return $console;
}

function getConsoles() {
    global $dbConn;
    
    $sql = "SELECT * FROM proj_consoles";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    //print_r($records);
    
    return $records;
    
}

function filterGames() {
    global $dbConn;
    $game = $_GET['gameName'];
    
    if(isset($_GET['searchForm'])) {
        
        //echo "<h3>Games For You: </h3>";
        
        $namedParameters = array();
        //$product = $_GET['productName'];
        
        //This SQL works but it doesn't prevent SQL injection (due to single quotes)
        //$sql = "SELECT * FROM om_product 
        //       WHERE productName LIKE '%$product%'";
        
        $sql = "SELECT * FROM proj_games WHERE 1"; //Getting all records from database
        
        if(!empty($game)){
            //This SQL prevents SQL INJECTION by using a named parameter 
            $sql .= " AND (title LIKE :game)";
            $namedParameters[':game'] = "%$game%";
        }
        
        if(!empty($_GET['category'])){
            //This SQL prevents SQL INJECTION by using a named parameter
            $sql .= " AND catId = :category";
            $namedParameters[':category'] = $_GET['category'];
        }
        
        if(!empty($_GET['console'])){
            //This SQL prevents SQL INJECTION by using a named parameter
            $sql .= " AND conId = :console";
            $namedParameters[':console'] = $_GET['console'];
        }
        
        if(!empty($_GET['priceFrom'])){
            $sql .= " AND price >= :pricemin";
            $namedParameters[':pricemin'] = $_GET['priceFrom'];
        }
    
        if(!empty($_GET['priceTo'])){
            $sql .= " AND price <= :pricemax";
            $namedParameters[':pricemax'] = $_GET['priceTo'];
        }
        
        if (isset($_GET['searchBy'])) {
            
            if($_GET['searchBy'] == "nameOrder") {
                $sql .= " ORDER BY title";
            } else {
                $sql .= " ORDER BY year";
            }
            
            if (isset($_GET['orderBy'])) {
            
                if($_GET['orderBy'] == "dc") {
                    $sql .= " DESC";
                } else {
                    $sql .= " ASC";
                }
                
            }
            
        }
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //Creating a table
        echo "<table class='table'>";
        
        foreach($records as $record){
            
            //Putting them in variables to avoid having to concatenate strings later
            $itemName = $record['title'];
            $itemPrice = $record['price'];
            $itemImage = $record['image'];
            $itemId = $record['gameId'];
            $itemConsole = $record['conId'];
            $itemYear = $record['year'];
            
            //Displaying things as a table
            echo "<tr>";
            echo "<td> <img src='$itemImage' width=50> </td>";
            echo "<td> <h4> <a href='gameInfo.php?gameId=".$record['gameId']."'> $itemName </a> </h4> </td>";
            echo "<td> <h4>Price: $$itemPrice</h4> </td>";
            //echo "<td> <h4>Console: $itemDirector</h4> </td>";
            //echo "<td> <h4>Starring: $itemActors</h4> </td>";
            echo "<td> <h4>Year: $itemYear </h4> </td>";
            
            
            //Hidden elements
            echo "<form method='POST'>";
            echo "<input type='hidden' name='itemName' value='$itemName'>";
            //echo "<input type='hidden' name='itemDirector' value='$itemDirector'>";
            //echo "<input type='hidden' name='itemActors' value='$itemActors'>";
            //echo "<input type='hidden' name='itemRating' value='$itemRating'>";
            echo "<input type='hidden' name='itemImage' value='$itemImage'>";
            echo "<input type='hidden' name='itemYear' value='$itemYear'>";
            echo "<input type='hidden' name='itemId' value='$itemId'>";
            
            //Check to see if the item we added is the most recent POST itemId
            //and change button accordingly
            if ($_POST['itemId'] == $itemId) {
                echo "<td> <button class='btn btn-success'> Added </button> </td>";
            } else {
                echo "<td> <button class='btn btn-warning'> Add </button> </td>";
            }
            echo "</form>";
            
            echo "</tr>";
            
        }
        
        echo "</table>";
    
    }
    
}



function displayCart(){
    if(isset($_SESSION['cart'])) {
        
        echo "<table class='table'>";
        foreach ($_SESSION['cart'] as $item) {

            $itemId = $item['id'];
            $itemQuant = $item['quantity'];
            
            echo "<tr>";
            
            //display data for item
            echo "<td><img src ='" .$item['img']. "'></td>";
            echo "<td><h4> <a href='gameInfo.php?gameId=".$item['id']."'> ".$item['name']." </a> </h4></td>";
            //echo "<td><h4>" .$item['console']. "</h4></td>";
            echo "<td><h4>" .$item['price']. "</h4></td>";
            //echo "<td><h4>" .$item['year']. " </h4></td>";
            
            //update for this item
            echo '<form method = "post">';
            echo "<input type ='hidden' name='itemId' value ='$itemId'>";
            echo "<td><input type='text' name ='update' class = 'form-control' placeHolder= '$itemQuant'></td>";
            echo '<td><button class = "btn btn-danger">Update</button></td>';
            echo '</form>';
            
            //deletion
            echo "<form method = 'post'>";
            echo "<input type = 'hidden' name='removeId' value = '$itemId'>";
            echo "<td><button class = 'btn btn-danger'>Remove</button></td>";
            echo '</form>';
        
            echo '</tr>';
        }
        echo "</table>";
        
        //delete all
        echo "<form method = 'post'>";
        echo "<input type = 'hidden' name='removeAll' value = '1'>";
        echo "<button class = 'btn btn-danger'>Remove All</button>";
        echo '</form>';
    }
}



function displayCartCount() {
    //echo count($_SESSION['cart']);
    
    $cartTotal = 0;
    
    if(isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $cartTotal += $item['quantity'];
        }
    }
    
    echo $cartTotal;
}



function addRemove() {
    //if rmoveId sent, search cart for itemId
    if (isset($_POST['removeId'])) {
        foreach ($_SESSION['cart'] as $itemKey => $item){
            if($item['id'] == $_POST['removeId']) {
                unset($_SESSION['cart'][$itemKey]);
            }
        }
    }
    
    if(isset($_POST['itemId'])) {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $_POST['itemId']) {
                $item['quantity'] = $_POST['update'];
            }
        }
    }
    
    if (isset($_POST['removeAll'])) {
        if($_POST['removeAll'] == 1) {
            $_SESSION['cart'] = array();
            unset($_POST['removeAll']);
        }
    }
}

function getAllGames(){
    global $dbConn;
    
    $sql = "SELECT * FROM proj_games ORDER BY title";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records

    // foreach ($records as $record) {
    //     echo "<a class='btn btn-primary' role='button' href='updateProduct.php?gameId=".$record['gameId']."'>Update</a>";
    //     //echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";
    //     echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
    //     echo "   <input type='hidden' name='gameId' value='".$record['gameId']."'>";
    //     echo "   <button class='btn btn-outline-danger' type='submit'>Delete</button>";
    //     echo "</form>";
        
    //     echo "[<a 
        
    //     onclick='openModal()' target='productModal'
    //     href='gameInfo.php?gameId=".$record['gameId']."'>".$record['title']."</a>]  ";
    //     echo " $" . $record[price]   . "<br><br>";
        
    // }
    
    return $records;
}

function addGames(){
    global $dbConn;
    
    $title = $_GET['title'];
    $price = $_GET['price'];
    $catId = $_GET['catId'];
    $conId = $_GET['conId'];
    $year = $_GET['year'];
    $image = $_GET['gameImage'];
        
    $console = getConsole($conId);
    $category = getCategory($catId);
    
    if(isset($_GET['addGame'])) { //checks whether the form was submitted
    
        // $title = $_GET['title'];
        // $price = $_GET['price'];
        // $catId = $_GET['catId'];
        // $conId = $_GET['conId'];
        // $year = $_GET['year'];
        // $image = $_GET['gameImage'];
        
        // $console = getConsole($conId);
        // $category = getCategory($catId);
        
        //title, catId, category, conId, console, year, price, image
        $sql = "INSERT INTO proj_games (title, catId, category, conId, console, year, price, image) 
                VALUES (:title, :catId, :category, :conId, :console, :year, :price, :image);";
        $np = array();
        $np[":title"] = $title;
        $np[":catId"] = $catId;
        $np[":category"] = $category;
        $np[":conId"] = $conId;
        $np[":console"] = $console;
        $np[":year"] = $year;
        $np[":price"] = $price;
        $np[":image"] = $image;
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($np);
        echo "New Product was added!";
        
        header("Location: admin.php");
    }

}

function deleteGames(){
    global $dbConn;
    
    $sql = "DELETE FROM proj_games WHERE gameId = " . $_GET['gameId'];
    $stmt=$dbConn->prepare($sql);
    $stmt->execute();

    header("Location: admin.php");
}

function updateGames(){
    global $dbConn;
    
    $title = $_GET['title'];
    $price = $_GET['price'];
    $catId = $_GET['catId'];
    $conId = $_GET['conId'];
    $year = $_GET['year'];
    $image = $_GET['gameImage'];
        
    $console = getConsole($conId);
    $category = getCategory($catId);
    
    if(isset($_GET['updateProduct'])){ //user has submitted update form
    
        //UPDATE `om_product` SET `price` = '300.00' WHERE `om_product`.`productId` = 1;
        //title, catId, category, conId, console, year, price, image
        $sql = "UPDATE proj_games 
                SET title= :title,
                   catId = :catId,
                   category = :category,
                   conId = :conId,
                   console = :console,
                   year = :year,
                   price = :price,
                   image = :image
                WHERE gameId = " . $_GET['gameId'];
                
        $np = array();
        $np[":title"] = $title;
        $np[":catId"] = $catId;
        $np[":category"] = $category;
        $np[":conId"] = $conId;
        $np[":console"] = $console;
        $np[":year"] = $year;
        $np[":price"] = $price;
        $np[":image"] = $image;
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($np);
        //$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record
        
        header("Location: admin.php");
    }
    
    if(isset($_GET['gameId'])){
    
        $gameInfo = getGameInfo($_GET['gameId']);
    
        //print_r($productInfo);
    }
}

function getGameInfo($game){
    global $dbConn;
    
    $sql = "SELECT * FROM proj_games WHERE gametId = $game";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $record;
}

function displayProductInfo(){
    global $dbConn;
    
    
    $movId = $_GET['movId'];
    $sql = "SELECT *
            FROM proj_movies
            WHERE movId = $movId";
    //NATURAL RIGHT JOIN om_product
    
    //$np = array();
    //$np[$movId] = $movId;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetchAll returns an Array of Arrays
    
    //echo $records[0]['productName'] . "<br>";
    echo "<img src='" . $records[0]['image'] . "'  width='200'/><br>";
    
    foreach ($records as $record) {
        echo "<br><br>";
        echo "<strong>Title:</strong>";
        echo "<br>";
        echo $record[title];
        echo "<br><br>";
        echo "<strong>Year:</strong>";
        echo "<br>";
        echo $record[year]; 
        echo "<br><br>";
        echo "<strong>Directed by:</strong>"; 
        echo "<br>";
        echo $record[director]; 
        echo "<br><br>";
        echo "<strong>Starring:</strong>"; 
        echo "<br>";
        echo $record[actors]; 
        echo "<br><br>";
        echo "<strong>Rating:</strong>";
        echo "<br>";
        echo $record[ratingId];
        echo " Stars <br><br>";
        echo "<br><br>";
    }
    
    // echo "<table>";
    // echo "<tr>";
    // echo "<th>Title </th><th>Year </th><th>Actors</th>";
        
    // foreach ($records as $record) {
    //     echo "<tr>";    
    //     echo "<td>" . $record[title] . "</td>";
    //     echo "<td>" . $record[year] . "</td>";
    //     echo "<td>" . $record[actors] . "</td>";
    //     echo "</tr>";
    // }
    // echo "</table>";
    
    
    //print_r($records);
}

?>