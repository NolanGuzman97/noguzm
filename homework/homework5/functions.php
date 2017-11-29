<?php
include '../../dbConnection.php';
$conn = getDatabaseConnection();

    $value=$_GET['passValue'];
    $sql = "INSERT INTO queries
            (searchValue)
            VALUES
            ('$value')";
            

            
    $stmt=$conn->prepare($sql);
    $stmt->execute();

    
    $sql = "SELECT searchValue,COUNT(*) as count
            FROM queries
            WHERE searchValue='$value'
            ORDER BY count DESC";
            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record= $stmt->fetch();
    echo $record['count'];
    
   
    

   



?>