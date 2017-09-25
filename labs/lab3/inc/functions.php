<?php


     
    $card_numbers = range(1, 52); //array of cards
function displayCards(){
    $flag=false;
    $names = array("Chris", "Cynthia", "Nolan", "Raeleen"); //array of usernames
    $users = array("Chris", "Cynthia", "Nolan", "Raeleen");  //key value pairs of names and scores
    $users = array_fill_keys($users, 0); //give each user initial value of 0
    shuffle($names); //make user order random
    //get cards for each user and set their score
    
    foreach($names as $player){ 
        $users[$player] = getCards($player);
    }
    
    
    // This is where winner score calculates and displays. 
    
    while ($getWinner = current($users)) {
        
        if($getWinner<42 && $getWinner>$temp){
            $temp=$getWinner;
            $tempkey=key($users);
        }
        if ($getWinner == 42) {
           
           
           $countWinners = 0;
           $countWinners = $countWinners + $getWinner;
           $sumOfCountWinners += $countWinners;
           
           
           $winner = key($users);
          
           $sum = array_sum($users);
           
           $points = $sum - $sumOfCountWinners;
    
           echo "<div id='winnerInfo'>";    
           echo $winner . " ". $points ." wins points!!";
           echo "</div>";
           $flag=true;
           break;
           
        }
    
        next($users);
}
    if($flag==false){
    $countWinners = 0;
    $countWinners = $countWinners + $temp;
    $sumOfCountWinners += $countWinners;
           
           
    $winner = $tempkey;
          
    $sum = array_sum($users);
           
    $points = $sum - $sumOfCountWinners;
    
    echo "<div id='winnerInfo1'>";    
    echo $winner . " ". $points ." wins points!!";
    echo "</div>";
    }
    
}

function getCards($user){
    global $card_numbers; //use global array
    
    $lowercase = strtolower($user); //make username lowercase for img path
    echo "<div id='userinfo'><span id='name'>$user</span>"; //username
    echo "<br/>";
    echo "<img id='userpicture' src='img/$lowercase.jpg' title='$user' alt='$user'/></div>"; //user image
    $total = 0; //user score
    //get user new card until score greater than 35
    while($total < 35){
        $card = rand(1, 13); //random card
        $suite = rand(1, 4); //random suite
        if($card_numbers[($card * $suite) - 1] != 0){
            $card_numbers[($card * $suite) - 1] = 0;
            $total += $card;
            echo "<img id='cards' src='img/cards/$suite/$card.png' alt='$card' title='' />"; //display card
        }
        
        
    }
    echo "<span id='score'>Score: $total</span>";
    echo "<br>";
       
    return $total;
}



?>


