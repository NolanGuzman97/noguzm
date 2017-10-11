<?php

function checkMemory(){
    if(isset($_GET['memory'])&&$_GET['memory']=='16'){
        echo "selected";
    }
    if(isset($_GET['memory'])&&$_GET['memory']=='64'){
        echo "selected";
    }
    if(isset($_GET['memory'])&&$_GET['memory']=='128'){
        echo "selected";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>yuPhone</title>
        <meta charset="utf-8"/>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
       <link href="https://fonts.googleapis.com/css?family=Chivo|Geo|Kaushan+Script|Michroma" rel="stylesheet">
    <body>
       <div class="wrapper">
           <h1><strong>yuPhone</strong></h1>
           <h2>The phone designed for yu, and only yu.</h2>
       
       
       <div>
           <form method="get">
               <img id="gold" src="img/gold.png" alt="Gold"/>
               <input type="radio" name="phoneColor" value="gold" <?= ($_GET['phoneColor']=='gold')?"checked":""  ?>>Gold
               <img id="rose" src="img/rosegold.png" alt="RoseGold"/>
               <input type="radio" name="phoneColor" value="rosegold" <?= ($_GET['phoneColor']=='rosegold')?"checked":""  ?>>Rose
               <img id="silver" src="img/silver.png" alt="Silver"/>
               <input type="radio" name="phoneColor" value="silver" <?= ($_GET['phoneColor']=='silver')?"checked":""  ?>>Silver
               
        
               <br>
               <select name="memory">
                   <option value="">Select One</option>
                   <option <?=checkMemory()?> value="16">16 GB</option>
                   <option <?=checkMemory()?> value="64">64 GB</option>
                   <option <?=checkMemory()?> value="128">128 GB</option>
               </select>
               <br>
               <strong>Personal Engraving</strong><br>
               <input type="text" name="personal"/>
               <br>
                <input type="submit" value="Submit">
           </form>
       </div>
          
           <?php
                if(isset($_GET['phoneColor'])&&isset($_GET['memory'])&&isset($_GET['personal'])){
                    echo '<strong>Your Full Phone Build is Complete!</strong>';
                    echo '<br>';
                    echo '<br>';
                    echo '<div class="casing">';
                    echo '<h3 class="enTag">' . $_GET['personal'].'</h3>';
                    echo '<img class="phoneImage" src="img/' . $_GET['phoneColor'] .'.png"/>';
                    
                    echo '<br>';
                    /*
                    echo '<img class="memoryCard" src="img/' . $_GET['memory'] .'.jpeg"/>';
                    echo '</div>';
                    */
                   
                    
                    echo '<div class="boxed">';
                    if($_GET['phoneColor']=="rosegold"){
                        echo 'yuPhone is composed of Rose Gold plating, ';
                    }
                    if($_GET['phoneColor']=="gold"){
                        echo 'yuPhone is composed of Gold plating, ';
                    }
                    if($_GET['phoneColor']=="silver"){
                        echo 'yuPhone is composed of Silver plating, ';
                    }
                    echo $_GET['memory'] . ' GB memory, and personal engraving: <strong>';
                    if(empty($_GET['personal'])){
                        echo 'None</strong>';
                    }
                    else{
                        echo '<h4>'.$_GET['personal'].'</strong></h4>';
                    }
                }
                if(!isset($_GET['phoneColor'])){
                    echo '<strong>PLEASE SELECT A PHONE COLOR! </strong>';
                }
                if(!isset($_GET['memory'])){
                    echo '<strong>PLEASE SELECT MEMORY!</strong>';
                }
                echo '</div>';
           ?>
      
       </div>
    </body>
</html>