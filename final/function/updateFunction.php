<?php
session_start();

include '../../dbConnection.php';
$conn = getDatabaseConnection('c9');
 
 $id=$_GET['passID'];
 echo $id;
 $name=$_GET['name'];
 echo $name;
 $price=$_GET['price'];
 echo $price;
 $releaseDate=$_GET['releaseDate'];
 $coverArt=$_GET['coverArt'];
 echo $coverArt;
 $platform=$_GET['platform'];
 $rating=$_GET['rating'];
 
 
 $sql = "UPDATE gameData as g, videoGames as v
            SET v.name='$name',
            v.price='$price',
            v.releaseDate='$releaseDate',
            g.picAddress='$coverArt',
            g.category='$platform',
            g.rating='$rating'
			WHERE(v.itemID = '$id' AND g.itemID='$id')";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

?>