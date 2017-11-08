<?php
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
    $_SESSION['prices'] = array();
}
array_push($_SESSION['cart'], $_GET['item']);
array_push($_SESSION['prices'], $_GET['price']);
header("location:index.php");
?>