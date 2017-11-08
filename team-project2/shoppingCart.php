<?php
session_start();

function getCart(){
    if(isset($_SESSION['cart'])){
        $items = $_SESSION['cart'];
        $prices = $_SESSION['prices'];
        echo "<table id='cart'>";
        echo "<tr><th>Food</th><th>Prices</th></tr>";
        for($i = 0; $i < count($items);$i++){
            echo 
            "<tr>" .
            "<td><a href='getFoodInfo.php?foodName=${items[$i]}'>" . $items[$i] . "</a></td>" .
            "<td> $" . $prices[$i] . "</td>". 
            "</tr>";
        }
        echo "</table";
    }
    else{
        echo "Your cart is empty. Add items to cart to see them here";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Shopping Cart </title>
        <link rel='stylesheet' href='css/styles.css'>
    </head>
    <body>
        <h1>Shopping Cart</h1>
        <?=getCart()?>
    </body>
</html>