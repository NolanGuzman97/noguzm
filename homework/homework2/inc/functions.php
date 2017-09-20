<?php

function play($humanCardNum, $computerCardNum){
    $humanSize=sizeof($humanCardNum)-1;
    $computerSize=sizeof($computerCardNum)-1;
    
    displayCard($humanCardNum[$humanSize], $computerCardNum[$computerSize]);
    $card0=cardValue($humanCardNum[$humanSize]);
    $card1=cardValue($computerCardNum[$computerSize]);
    
    if($card0>$card1){
            echo "<br>";
            echo "<h1 id='humanTitle'>Human Wins!</h1>";
            array_push($humanCardNum, array_pop($computerCardNum));
            
    }
    
    if($card1>$card0){
            echo "<br>";
            echo "<h1 id='computerTitle'>Computer Wins!</h1>";
            array_push($computerCardNum, array_pop($humanCardNum));
    }
    if($card1==$card0){
        echo "<br>";
        echo "<h1 id='tie'> TIE! </h1>";
    }
   
}

function displayCard($card0, $card1){
    echo "<div id='human'>";
    echo "<span>Human</span>";
    echo "<img id='human' src='img/cards/$card0.png' alt='human' title='human' width='70' />";
    echo "</div>";
    echo "<div id='computer'>";
    echo "<span>Computer</span>";
    echo "<img id='computer' src='img/cards/$card1.png' alt='computer' title='computer' width='70' />";
    echo "</div>";
}
function cardValue($card){
        switch($card){
        case 1: $card=1;
            return $card;
            break;
        case 2: $card=2;
            return $card;
            break;
        case 3: $card=3;
            return $card;
            break;
        case 4: $card=4;
            return $card;
            break;
        case 5: $card=5;
            return $card;
            break;
        case 6: $card=6;
            return $card;
            break;
        case 7: $card=7;
            return $card;
            break;
        case 8: $card=8;
            return $card;
            break;
        case 9: $card=9;
            return $card;
            break;
        case 10: $card=10;
            return $card;
            break;
        case 11: $card=11;
            return $card;
            break;
        case 12: $card=12;
            return $card;
            break;
        case 13: $card=13;
            return $card;
            break;
        case 14: $card=1;
            return $card;
            break;
        case 15: $card=2;
            return $card;
            break;
        case 16: $card=3;
            return $card;
            break;
        case 17: $card=4;
            return $card;
            break;
        case 18: $card=5;
            return $card;
            break;
        case 19: $card=6;
            return $card;
            break;
        case 20: $card=7;
            return $card;
            break;
        case 21: $card=8;
            return $card;
            break;
        case 22: $card=9;
            return $card;
            break;
        case 23: $card=10;
            return $card;
            break;
        case 24: $card=11;
            return $card;
            break;
        case 25: $card=12;
            return $card;
            break;
        case 26: $card=13;
            return $card;
            break;
        
    }
}


?>