<?php
    include '../../inc/dbConnection.php';
    $dbConn = startConnection("c9");

function displayCategories() { 
    global $dbConn;
    
    $sql = "SELECT DISTINCT category FROM p1_quotes ORDER by category";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    //echo "<hr>";
    //echo $records[2] . "<br>";
    //echo $records[1]['catDescription'] . "<br>";
    
    foreach ($records as $record) {
        echo "<option value='".$record['category']."'";
        if($_GET['category'] == $record['category']){echo "selected";}
        echo ">" . $record['category'] . "</option>";
    }
}

function filterProducts() {
    global $dbConn;
    $quote = $_GET['keyquote'];
    
    if(isset($_GET['searchForm'])) {
    
    $namedParameters = array();
    //$product = $_GET['productName'];
    
    //This SQL works but it doesn't prevent SQL injection (due to single quotes)
    //$sql = "SELECT * FROM om_product 
    //       WHERE productName LIKE '%$product%'";
    
    $sql = "SELECT * FROM p1_quotes WHERE 1"; //Getting all records from database
    
    if(!empty($quote)){
        //This SQL prevents SQL INJECTION by using a named parameter 
        $sql .= " AND quote LIKE :quote";
        $namedParameters[':quote'] = "%$quote%";
    }
    
    if(!empty($_GET['category'])){
        //This SQL prevents SQL INJECTION by using a named parameter
        $sql .= " AND category = :category";
        $namedParameters[':category'] = $_GET['category'];
    }
    
    if (isset($_GET['orderBy'])) {
        
        if($_GET['orderBy'] == "AZ") {
            $sql .= " ORDER BY quote";
        } else {
            $sql .= " ORDER BY quote DESC";
        }
        
    }
    
    //}
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    
    echo "<div id='quotes'>";
    foreach($records as $record){
        echo "<b>";
        echo $record['quote'];
        echo "</b> <i>(";
        echo $record['author'];
        echo ")</i><br />";
        
    }
    
    echo "</div>";
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
            footer {
                text-align: center;
                padding: 10px;
                margin-top: 250px;
            }
            #quotes {
                font-size: 1.2em;
                line-height: 40px;
                text-align: center;
            }
            body {
                font-family: arial;
                background-color: #07F6FE;
            }
        </style>
    </head>
    <body>
        
        <h1> Famous Quote Finder </h1>
        
        <form>
            
            Enter Quote Keyword <input type="text" name="keyquote" placeholder="Quote" value = "<?php if(isset($_GET['keyquote'])){ echo $_GET['keyquote'];} ?>"/>
            <br><br>
            Category:
                <select name="category">
                    <option value=""> Select One </option>
                    <?=displayCategories()?>
                </select>
            <br><br>
            Order
            <br>
            <input type="radio" name="orderBy" value="AZ" <?php if($_GET['orderBy']=="AZ"){echo "checked";}?> >A-Z <br>
            <input type="radio" name="orderBy" value="ZA" <?php if($_GET['orderBy']=="ZA"){echo "checked";}?> >Z-A
            <br><br>
            <input type="submit" name="searchForm" value="Display Quotes!"/>
        </form>
        <br>
        <hr>
        
        <?=filterProducts()?>
        
    </body>
</html>