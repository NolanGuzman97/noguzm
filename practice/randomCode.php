<!DOCTYPE html>
<html>
    <head>
        <title>Rnaomd Background Color</title>
        <meta charset="utf-8"/>
        <h1>Hello world</h1>
        <style>
        
         h1{
                /* background-color: rgba(15,20,240,1); */
                <?php
                echo "color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,100)/100)." );";
                
                ?>
                
            }
            body{
                /* background-color: rgba(15,20,240,1); */
                <?php
                echo "background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,100)/100)." );";
                
                ?>
                
            }
        </style>
    </head>
</html>