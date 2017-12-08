<?php
session_start();
if (!isset($_SESSION['username'])) { //checks whether admin has logged in
    
    header("Location: index.php");
    exit();
    
}
include '../dbConnection.php';
$conn = getDatabaseConnection('c9');
function averagePrice(){
  global $conn;
  $sql="SELECT category, AVG(price) AS average
      FROM videoGames
      NATURAL JOIN gameData
      GROUP BY category";
      


      
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $records = $stmt->fetchAll();
      foreach ($records as $record){
        echo "<span id='prices'>".$record['category']." ".$record['average']."</span></br>";
      }
}
function averageDate(){
  global $conn;
  $sql="SELECT category, ROUND(AVG(releaseDate)) AS average
      FROM videoGames
      NATURAL JOIN gameData
      GROUP BY category";
      


      
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $records = $stmt->fetchAll();
      foreach ($records as $record){
        echo "<span id='dates'>".$record['category']." ".$record['average']."</span></br>";
      }
}
function howMany(){
  global $conn;
  $sql="SELECT category, COUNT(category) AS sum
  FROM gameData
  GROUP BY category";
      


      
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll();
  
  foreach ($records as $record){
     echo "<span id='counts'>".$record['category']." ".$record['sum']."</span></br>";
  }
}

?>


<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg " style="color:#32CD32; background-color: black;">
  <a class="navbar-brand" style="color:#32CD32;" href="admin.php">Admin Page</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" style="color:#32CD32;" href="addItem.php">Add New Item<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" style="color:#32CD32;" href="update.php">Update<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" style="color:#32CD32;" href="index.php">Logout<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    
  </div>
</nav>
   
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </head>
    <body style="text-align:center;" background="img/background.jpg">
      <!--post records and shit i dont really know what to put here-->
      <div style="display:inline-block; margin:30px; color:white; text-align:center;" id="containerLeft">
        <h3>Average of Prices</h2>
        <hr>
        <?php averagePrice();?>
      </div>
      <div style="display:inline-block; margin:30px; color:white; text-align:center;" id="containerCenter">
        <h3>Average Release Date by Platform</h2>
        <hr>
        <?php averageDate();?>
        </div>
        <div style="display:inline-block; margin:30px; color:white; text-align:center;" id="containerRight">
          <h3>Total Games by Platform</h2>
          <hr>
        <?php howMany();?>
      </div>
      
    </body>
</html>