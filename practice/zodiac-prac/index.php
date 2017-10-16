<?php

function yearList($startYear=1900, $endYear=2000){
    $index=0;
    
    $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
     for($i=$startYear;$i<=$endYear;$i+=4){
            echo"<li> Year $i ";
            if($i>=1900){
                echo "<img src='zodiac/$zodiac[$index].png' width='100'";
                 $index++;
            }
            if($i==1776){
                echo "USA INDEPENDENCE!";
                
            }
            if($i%100==0){
                echo "Happy New Century!";
            }
            echo "</li>";
            $temp=$temp+$i;
           if($index>11){
               $index=0;
           }
        }
        echo "<br>";
        return $temp;
        
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Zodiac stuff</title>
        <h1>Chinese Zodiac Lists</h1>
        <br>
       <?php
       $sumYear=yearList();
       echo "Year Sum: $sumYear <br/>";
       ?>
    </head>
</html>