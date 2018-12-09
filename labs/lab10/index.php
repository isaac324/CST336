<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB: Pet Shelter </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>
            body {
                text-align: center;
            }
            .inner-carousel img{
                width: 600px;
                height: 400px;
            }
        </style>
   
    </head>
    <body>
        
	  <?php 
	    include 'inc/header.php';
	    
	  ?>
        <!-- Display Carousel here  -->
        
        <div id="pet-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#pet-carousel" data-slide-to="0" class="active"></li>
            <li data-target='#pet-carousel' data-slide-to='1'></li>
            <li data-target='#pet-carousel' data-slide-to='2'></li>
            <li data-target='#pet-carousel' data-slide-to='3'></li>
            <li data-target='#pet-carousel' data-slide-to='4'></li>
            <li data-target='#pet-carousel' data-slide-to='5'></li>
            <li data-target='#pet-carousel' data-slide-to='6'></li>
            <li data-target='#pet-carousel' data-slide-to='7'></li>
            <li data-target='#pet-carousel' data-slide-to='8'></li>            
            </ol>
          
          <!-- The slideshow -->
          <div class="inner-carousel">
            <div class="carousel-item active">
              <img src="img/alex.jpg" alt="alex">
            </div>
            <div class="carousel-item">
              <img src="img/bear.jpg" alt="bear">
            </div>
            <div class="carousel-item">
              <img src="img/carl.jpg" alt="bear">
            </div>
             <div class="carousel-item">
              <img src="img/charlie.jpg" alt="charlie">
            </div>
             <div class="carousel-item">
              <img src="img/lion.jpg" alt="lion">
            </div>
             <div class="carousel-item">
              <img src="img/otter.jpg" alt="otter">
            </div>
             <div class="carousel-item">
              <img src="img/sally.jpg" alt="sally">
            </div>
             <div class="carousel-item">
              <img src="img/samantha.jpg" alt="samantha">
            </div>
             <div class="carousel-item">
              <img src="img/ted.jpg" alt="ted">
            </div>
             <div class="carousel-item">
              <img src="img/tiger.jpg" alt="tiger">
            </div>
          </div>
          
          
          <a class="carousel-control-prev" href="#pet-carousel" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </a>
          <a class="carousel-control-next" href="#pet-carousel" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </a>
        </div>
        
        <br><br>
        
        <a class="btn btn-outline-success" href="pets.php" role="button">Adopt Now</a>
        <br><br><br>
        <?php
        include 'inc/footer.php';
        
        ?>
        </body>

</html>