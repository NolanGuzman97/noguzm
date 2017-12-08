<?php
session_start();
include '../../dbConnection.php';
$conn = getDatabaseConnection('c9');
 
 $id=$_GET['passID'];
 $sql = "DELETE FROM gameData, videoGames
         USING gameData
         INNER JOIN videoGames ON gameData.itemID = videoGames.itemID
         WHERE gameData.itemID='$id'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

?>