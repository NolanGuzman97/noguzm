<?php
include 'inc/functions.php';




$start = microtime(true);
session_start();

if (!isset($_SESSION['matchCount'])) { //checks whether the session exists
    $_SESSION['matchCount'] = 1;
    $_SESSION['totalElapsedTime'] = 0;
}


function elapsedTime(){
global $start;
     echo "<hr>";
     $elapsedSecs = microtime(true) - $start;
     echo "This match elapsed time: " . $elapsedSecs . " secs <br /><br/>";

     echo "Matches played:"  . $_SESSION['matchCount'] . "<br />";

     $_SESSION['totalElapsedTime'] += $elapsedSecs;
     
     echo "Total elapsed time in all matches: " .  $_SESSION['totalElapsedTime'] . "<br /><br />";
     
     echo "Average time: " . ( $_SESSION['totalElapsedTime']  / $_SESSION['matchCount']);
     
     $_SESSION['matchCount']++;
} //elapsedTime here



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SilverJack</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">  
        
    </head>
    <body>
         <header>
            <h1> SilverJack</h1>
        </header>
        

       
        <div id="mainContent">
                <?php
                displayCards();
              
                ?>
                
               <div id="playButton">
                    <form>
                        <input type='submit' value='Play Again'/>
                    </form>
                </div>
          
            
        </div>
        
       <?=elapsedTime()?> 
        
    </body>
    
    
    
</html>

