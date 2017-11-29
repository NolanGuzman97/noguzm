<?php
include '../../dbConnection.php';
$conn = getDatabaseConnection();
$value=$_GET['passValue'];


 $sql="SELECT * 
          FROM queries
          WHERE searchValue='$value'";
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $records=$stmt->fetchAll();
  foreach($records as $record){
      echo $record['timeStamp']."<br>";
  }
  
  


?>