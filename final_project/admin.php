<?php
//session_start();



//include 'inc/dbConnection.php';
//$dbConn = startConnection("project");

include 'inc/functions.php';
//validateSession();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <!--<link rel="stylesheet" href="css/styles.css" type="text/css" />-->
        <style>
            h1 {
                text-align:center;
            }
            form {
                display: inline-block;
                padding: 3px;
                padding-left: 5px;
            }
            footer {
                text-align: center;
                padding: 10px;
                margin-top: 250px;
            }
            .admin{
                color: darkred;
            }
            .admin:hover{
                color: red;
            }
        </style>
        <script>
        
            function confirmDelete() {
                
                //alert();
                //prompt();
                return confirm("Are you sure you want to delete this?");
                
            }
            
            // function openModal() {
                
            //     $('#myModal').modal("show");
            // }
            
            
        </script>
    </head>
    <body>
        
        <!-- Bootstrap Navagation Bar -->
        <!--<nav class='navbar navbar-default - navbar-fixed-top'>-->
        <!--    <div class='container-fluid'>-->
        <!--        <div class='navbar-header'>-->
        <!--            <a class='navbar-brand' href='#'>GameCart</a>-->
        <!--        </div>-->
        <!--          <ul class='nav navbar-nav'>-->
        <!--            <li><a href='index.php'>Home</a></li>-->
        <!--            <li><a href='login.php'><span class='admin'>Admin</span></a></li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</nav>-->
        <!--<br /> <br /> <br />-->
        
        <h1> Admin Page </h1>
        
        <form action="addProduct.php">
            <input type="submit" value="Add New Product">
        </form>
        <form action="index.php">
            <input type="submit" value="Logout">
        </form>

        <br><br>
        
        <script>
	      $('document').ready(function() {
	          $('.gameLink').click(function() {
	              $("#container").html("<img src='img/loading.gif' />");
	              
	              $('#gameModal').modal("show");
	              $.ajax({

                    type: "GET",
                    url: "getgameInfo.php",
                    dataType: "json",
                    data: { "gameid": $(this).attr('gameId') },
                    success: function(data, status) {
                        $("#gamename").html(data.title);
                        $("#category").html(data.category);
                        $("#console").html(data.console);
                        $("#year").html(data.year);
                        $("#gameimage").attr('src', data.image);
                        $("#container").html("");
                        //alert(data); 
                       
                        
                    
                    },
	          }); // ajax closing
	          
	           //   alert($(this).attr('id'));
	          }); // gamelink click
	          
	      }); // doc end
	  </script>
	  <?php
	    $games = getAllGames();
	    foreach($games as $game) {
	        //echo "<a href='#' class = 'gameLink' id = '". $game['gameId']. "'>". $game['title'] ." </a>";
	        //echo "<hr>";
	        echo "<a class='btn btn-primary' role='button' href='updateProduct.php?gameId=".$game['gameId']."'>Update</a>";
	        echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
	        echo "   <input type='hidden' name='gameId' value='".$record['gameId']."'>";
	        echo "   <button class='btn btn-outline-danger' type='submit'>Delete</button>";
	        echo "</form>";
	        echo "<a href='#' class = 'gameLink' id = '". $game['gameId']. "'>". $game['title'] ." </a>";
	        echo "<hr>";
	    }
	  ?>
	  
	  <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="gameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="gamename">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="container"></div>
        <div>
	      
	    <img id = "gameimage" src="" width=40><br><br>  
	    Title: <span id="gamename"> </span> <br> <br>
	    Type: <span id="category"> </span> <br> <br>
        Console: <span id="console"> </span> <br> <br>
        Year: <span id="year">
	      
	      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        
        <br /><br />
        <footer>
            <!--<span class = "current">CST 336 &copy; 2018 Isaac Avila</span> <br />-->
            
            <br />
            <strong> Disclaimer:</strong> The information in this website is fake. It is used for academic purposes only.
            <br />
            
            <!--<figure>-->
            <!--    <img src = "img/buddy.png" width = '70'> -->
            <!--</figure>-->
        </footer>
        
    </body>
</html>