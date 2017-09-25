<?php

$backgroundImage = "img/sea.jpg";



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url("css/styles.css");
            
            body{
                background-image: url(<?=$backgroundImage?>);
            }
        </style>
    </head>
    <body>
        
        
        
        <form>
            
            <input type ="text" name="keyword" placeholder="Type Keyword"/>
            <input type="submit" value="Search" name="submiter"/>
            
        </form>
        <br/> <br />
        <?php
        
        if(isset($_GET['keyword'])){
        include 'api/pixabayAPI.php';
        $imageURLs = getImageURLs($_GET['keyword']);
        $backgroundImage=$imageURLs[array_rand($imageURLs)];
        for($i=0;$i<5;$i++){
            do{
            echo "<img src='".$imageURLs[rand(0, count($imageURLs))]."' width='200' >";
            }
            while(!isset($imageURLs[$randomIndex]));
            
            echo "<img src='" . $imageURLs[$randomIndex]."' width='200' >";
            unset($imageURLs[$randomIndex]);
                
            }
        }
        else{
            echo "<h2> Type a keyword to display a slideshow
                with random integers from Pixabay.com</h2>";
             }
            
        ?>
        
        <br/> <br />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>