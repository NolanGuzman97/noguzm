<?php
include '../dbConnection.php';
$conn = getDatabaseConnection();

function getFoodInfo(){
    global $conn;
    $sql = "SELECT foodName, price, timeName, name, calories FROM food
            NATURAL JOIN restaurant
            NATURAL JOIN time
            WHERE foodName=:food";
            
    $food = $_GET['foodName'];
    $namedParameters = array();
    $namedParameters[':food'] = $food;
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch();
    
    echo "<html>
            <head>
                <title> Food Information </title>
                <link rel='stylesheet' href='css/styles.css'>
            </head>
            <body>
            <h1>Food Information</h1>
            <div id='foodInfo'>
             Food: <div id='foodName'>" . $record['foodName'] . "</div><br>
            Calories: <div id='foodName'>" . $record['calories'] . "</div><br>
            Price: <div id='foodName'>$" . $record['price'] . "</div> <br>
            Time:  <div id='foodName'>" . $record['timeName'] . "</div><br>
            Restaurant: <div id='foodName'>" . $record['name'] . 
            "</div></div></body>
         </html>";
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Food Info </title>
    </head>
    <body>
        <?=getFoodInfo()?>
    </body>
</html>