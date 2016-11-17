<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background-image: url("huella.jpg");
        }
    </style> 
  </head>
  <body>
   
    
    <div class="container">
      
     
      
     
    
        <?php
          include $_REQUEST['trabajo'].'.php';
        ?>
        
   
 
   
    
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

