<?php
    session_start();

    include 'inc/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Final Exam: Part 1</title>
        <script src="js/jquery.min.js"></script>
        <link  href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="js/bootstrap.min.js"></script>
        
        <script>
	      $('document').ready(function() {
	          $('.form').submit(function(event) {
	              
	              
	              $.ajax({

                    type: "GET",
                    url: "api/superheroAPI.php",
                    dataType: "json",
                    data: { "id": $(this).attr('id') },
                    success: function(data, status) {
                        
                    
                    },
	          }); // ajax closing
	          
	          }); // form click
	          
	      }); // doc end
	  </script>
        
        <style>
            .jumbotron, #feedback, #stats {
                text-align:center;
                margin:0px;
            }
            #rubric{
                margin-top: 150px;
            }
        </style>        
    </head>
    <body>
       <div class="jumbotron">
    <h3>What is the real name of the following superhero?</h3>
    
    <?=displayHero()?>

    <form method = "post">
        <select id="heroName">
            <option value=""> Select one </option>
            <?=displayNames()?>
        </select>
        <br /><br />
        <input type="button" value="Check Answer" />
    </form>
    <br>
    </div>
    
    <div id="feedback">    
    </div>

    <div id="stats">
    </div>
    
    
    <div id="rubric">
  <table border="1" width="600" cellpadding="10px">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
     <tr style="background-color:#99E999">
      <td>1</td>
      <td>A random image of a superhero is displayed when refreshing the page <br></td>
      <td width="20" align="center">15</td>
     </tr>     
     <tr style="background-color:#99E999">
      <td>2</td>
      <td><p>The "real names" of the superheroes in the dropdown menu come from the database (without duplicates and in alphabetical order) <br>
        </p></td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#FFC0C0">
      <td>3</td>
      <td>An error message is displayed if the user clicks on the "Check Answer" button without selecting anything. <br></td>
      <td width="20" align="center">10</td>
    </tr>     
     <tr style="background-color:#FFC0C0">
      <td>4</td>
      <td>The right color-coded feedback (correct or incorrect) is displayed upon clicking on the "Check Answer" button <br></td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td>The number of times the real name for the specific superhero has been answered correctly and incorrectly is stored in the database, via AJAX (you'll need to create a new table, you decide the structure)<br></td>
      <td width="20" align="center">15</td>
    </tr>     

     <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>The updated number of times for total of correct and incorrect answers (for the specific superhero) is displayed, via AJAX <br></td>
      <td width="20" align="center">15</td>
    </tr>
     
     <tr style="background-color:#FFC0C0">
      <td>7</td>
      <td>The spinning images (indicating that data is being loaded) are displayed and replaced when the data is retrieved, via AJAX</td>
      <td width="20" align="center">5</td>
    </tr> 

     <tr style="background-color:#99E999">
      <td>8</td>
      <td>This rubric is properly included AND UPDATED</td>
      <td width="20" align="center">2</td>
    </tr>
        
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center">&nbsp;</td>
    </tr> 
  </tbody></table>
  </div>
    
    </body>
</html>