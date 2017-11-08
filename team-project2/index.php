<?php
session_start();
include '../dbConnection.php';
$conn = getDatabaseConnection();
function checkIfSelected($timeName){
    if($_GET['meal_time'] == $timeName){
        return "selected";
    }
}
function checkIfRestaurant($restaurant){
    if($_GET['restaurant'] == $restaurant){
        return "selected";
    }
}
function getOptions(){
    global $conn;
    $sql = "SELECT timeName FROM time";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll();
    foreach($record as $time){
        $selection = checkIfSelected($time['timeName']);
        echo "<option $selection value='" . $time['timeName'] . "'>" . $time['timeName'] . "</option>";
    }
}
function getRestaurants(){
    global $conn;
    $sql = "SELECT name FROM restaurant";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll();
    foreach($record as $restaurant){
        $selection = checkIfRestaurant($restaurant['name']);
        echo "<option $selection value='" . $restaurant['name'] . "'>" . $restaurant['name']. "</option>";
    }
}
function printFoods(){
    global $conn;
    $namedParameters = array();
    $sql = "SELECT foodName, price, calories FROM `food`
            NATURAL JOIN time
            NATURAL JOIN restaurant
            WHERE 1";
    if(isset($_GET['meal_time']) && !empty($_GET['meal_time'])){
        $sql .= " AND timeName=:meal_time";
        $namedParameters[':meal_time'] = $_GET['meal_time'];
    }
    if(isset($_GET['food']) && !empty($_GET['food'])){
        $sql .= " AND foodName LIKE :food";
        $namedParameters[':food'] = "%" . $_GET['food'] . "%";
    }
    if(isset($_GET['restaurant']) && !empty($_GET['restaurant'])){
        $sql .= " AND name=:restaurant";
        $namedParameters[":restaurant"] = $_GET['restaurant'];
    }
    if(isset($_GET['sort']) && !empty($_GET['sort'])){
        if($_GET['sort'] == 'asc'){
            $sql .= " ORDER BY price ASC";
        }
        else{
            $sql .= " ORDER BY price DESC";
        }
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetchAll();
    echo "<table id='foods'>";
    echo "<tr><th>Food</th>" . "<th>Calories</th>" . "<th>Price</th>" . "<th>Add to cart</th></tr>";
    foreach($record as $food){
        echo "<tr>
                <td><a href='getFoodInfo.php?foodName=${food['foodName']}'>" . $food['foodName'] . "</a></td>
                <td>". $food['calories'] . "</td>
                <td> $". $food['price'] . "</td>
                <td><button><a href='addToCart.php?item=${food['foodName']}&price=${food['price']}'>Add to cart</a></button></td>
            </tr>";
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Food Menu </title>
        <link rel='stylesheet' href='css/styles.css'>
    </head>
    <body>
        <h1>Food Menu</h1>
        <div>
            <a href='shoppingCart.php' id='cartbutton'>View Cart</a>
        </div>
        <br>
        <form>
            <input id='textinput' type='text' name='food' placeholder='Food Name' value=<?=$_GET['food']?>>
            <br>
            <br>
            <div id = 'title'>Meal Time
            <select name='meal_time' id="meanTime">
                <option value="">Select One</option>
                <?=getOptions()?>
            </select>
            Restaurant
            <select name='restaurant' id ='resturant'>
                <option value="">Select One</option>
                <?=getRestaurants()?>
            </select>
            </div>
            <br>
            <div id='selection'>
            Price: 
            <input id='asc' type='radio' name='sort' value='asc' <?=($_GET['sort'] == 'asc') ? "checked":""?>>
            <label for='asc'>Ascending</label>
            <input id='desc' type='radio' name='sort' value='desc' <?=($_GET['sort'] == 'desc') ? "checked":""?>>
            <label for='desc'>Descending</label>
            <br>
            </div>
            <input type='submit' value="Submit">
        </form>
        <br>
        <?=printFoods()?>
    </body>
</html>