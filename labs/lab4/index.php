<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        
        <link href= "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <?php
            $backgroundImage = "img/sea.jpg";
        ?>
        <style>
            
            @import url("css/styles.css");
            body {
                background-image: url('<?=$backgroundImage ?>');
            }
            
        </style>
    </head>
    <body>
        <br /><br />
        <?php
            if(!isset($imageURLs)) {
                echo "<h2> Type a keyword to display a slideshow <br /> with random images from Pixabay.com </h2>";
            } else {
                //display carousel here
            }
        ?>
        <!-- HTML form goes here! -->
        <form>
            <input type="text" name="keyword" placeholder="Keyword">
            <input type="submit" value="Submit" />
        </form>
        <br /><br />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>