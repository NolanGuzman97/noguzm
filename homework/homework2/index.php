<?php
include 'inc/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>War</title>
        <meta charset="utf-8"/>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div>
            
            <?php
             $humanCardNum=array();
             $computerCardNum=array();
             for($i=1; $i<27;$i++){
                array_push($humanCardNum, rand(1,26));
            }
            for($i=1; $i<27;$i++){
                array_push($computerCardNum, rand(1,26));
            }
            shuffle($humanCardNum);
            shuffle($computerCardNum);
           
            play($humanCardNum, $computerCardNum);
            ?>
            
        </div>
        
             
       <form id='button'><input type=button value="Play Again!" onClick="window.location.reload()"></form> 
    </body>
</html>