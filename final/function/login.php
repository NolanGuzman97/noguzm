<?php
session_start();
//print_r($_POST);

include '../../dbConnection.php';
$conn = getDatabaseConnection('c9');

//print_r($conn);


$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql="SELECT *
      FROM admin
      WHERE userName='$username'
      AND password='$password'";
  


      
$stmt = $conn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch();//expecting only one record



if (empty($record)) {
    header("Location: index.php");
    
} else {
    $_SESSION['username']=$record['userName'];
    header("Location: ../admin.php"); //redirecting to admin portal
}

?>