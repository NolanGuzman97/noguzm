<?php

    include '../../../dbConnection.php';
    $dbConn = getDatabaseConnection("c9");    
    $sql = "SELECT *, YEAR(CURDATE()) - yob age 
            FROM adoptees 
            WHERE id = :id";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute(array("id"=>$_GET['id']));
    $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($resultSet);
        
?>