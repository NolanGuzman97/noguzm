<?php
session_start();

include '../../dbConnection.php';
$conn = getDatabaseConnection('c9');
$fileName="img/".$_FILES["myFile"]["name"];
$name=$_POST['newName'];
$price=$_POST['newPrice'];
$release=$_POST['newReleaseDate'];
$category=$_POST['newCategory'];
$rating=$_POST['newRating'];

move_uploaded_file($_FILES["myFile"]["tmp_name"],"../img/". $_FILES["myFile"]["name"]);

$sql= "INSERT INTO videoGames(name, itemID, price, releaseDate)
       VALUES('$name',null,'$price','$release')";
       
$stmt=$conn->prepare($sql);
$stmt->execute();

$sql= "INSERT INTO gameData(itemID, picAddress, category, rating)
       VALUES(null,'$fileName','$category','$rating')";
       
$stmt=$conn->prepare($sql);
$stmt->execute();

header("Location: ../admin.php");


?>