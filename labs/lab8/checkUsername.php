<?php


include '../../dbConnection.php';
$conn = getDatabaseConnection();


$sql = "SELECT *
        FROM tc_user
        WHERE universityId = :universityId"; 

$namedParameters = array();
$namedParameters[':universityId'] = $_GET['username'];
       
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

//print_r($record);

echo json_encode($record);
?>
