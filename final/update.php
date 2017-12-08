<?php
  
  session_start();
  if (!isset($_SESSION['username'])) { //checks whether admin has logged in
    
    header("Location: index.php");
    exit();
    
}
    function displayItems(){
        include '../dbConnection.php';
        $conn = getDatabaseConnection('c9');
        $sql="SELECT *
              FROM videoGames v
              NATURAL JOIN gameData";
              
        
            
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll();//expecting only one record
        
        foreach($records as $record){
                echo "<img src='".$record['picAddress']."'height=300 width=300 hspace=20 vspace=10 onclick='getInfo(".$record['itemID'].")'>";
                
        }
    }
    function getUserInfo($userId) {
    global $conn;    
    $sql = "SELECT * 
            FROM tc_user
            WHERE userId = $userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    //print_r($record);
    return $record;
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
    <script>
        
        function getInfo(id){
          $('#resultModal').modal("show");
             $.ajax({
            type: "GET",
            url: "function/gameData.php",
            dataType: "json",
            data: {passID: id},
            success: function(response) {
            
            $('#result').html("<form id='theForm'>"+
                            "Item ID: <input id='theID' type='text' value='"+response[0]['itemID']+"' readonly><br>"+
                            "Name: <input id='theName' type='text' required value='"+response[0]['name']+"'><br>"+
                            "Price of Item:  <input id='thePrice' type='text' required value='"+response[0]['price']+"'><br>"+
                            "Release Date: <input id='theReleaseDate' type='text' required value='"+response[0]['releaseDate']+"'><br>"+
                            "Cover Art: <input id='thePic' type='text' required value='"+response[0]['picAddress']+"'><br>"+
                            "Platform:<input id='theCategory' type='text' required value='"+response[0]['category']+"'><br>"+
                            "Rating: <input id='theRating' type='text' required value='"+response[0]['rating']+"'><br>"+
                            "<button type='button' onclick='deleteEntry()'>Delete Entry</button>"+
                            "</form>");
            }
        });
       
        }
        
        function updateEntry(id){
           $.ajax({
            type: "GET",
            url: "function/updateFunction.php",
            dataType: "html",
            data: {passID: id,
                  name: $('#theName').val(),
                  price:$('#thePrice').val(),
                  releaseDate:$('#theReleaseDate').val(),
                  coverArt:$('#thePic').val(),
                  platform:$('#theCategory').val(),
                  rating:$('#theRating').val()
                  
            },
            success: function(response) {
            alert("Changes Submitted");
            }
        });
        }
        
        function deleteEntry(){
          var id=document.getElementById('theID').value;
          $.ajax({
            type: "GET",
            url: "function/deleteFunction.php",
            dataType: "html",
            data: {passID: id},
            success: function(response) {
            alert("Item Deleted");
            }
        });
        }
        
    </script>
    </head>
    <body style="text-align: center;" background="img/background.jpg">
     <?=displayItems()?>
        <div class="modal" id="resultModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Change Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="result">
                    
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="updateEntry(document.getElementById('theID').value)">Update</button>
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>