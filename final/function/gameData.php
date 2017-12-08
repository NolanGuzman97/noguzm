<?php
session_start();
include '../../dbConnection.php';
$conn = getDatabaseConnection('c9');
$value=$_GET['passID'];

$sql="SELECT *
      FROM videoGames
      NATURAL JOIN gameData
      WHERE itemID='$value'";
      

$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->fetch();

$new_array[]=$records;


echo json_encode($new_array);




?>