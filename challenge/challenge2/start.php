
<!DOCTYPE html>
<html>
    <head>
        <title> Random Card Game </title>
        <meta charset='utf-8'/>
        <link rel='stylesheet' href='css/styles.css'/>
    </head>
    <body>
        <div id='main'>
            <h1>Random Card Game</h1>
            <span>Human</span><span>Computer</span>
            <br/>
            <?php
                for($i=0;$i<2;$i++)
                    {
                    ${'symbol' . $i} = rand(0, 3);
                    ${'card' . $i} = rand(1,5);
                    displayCard(${'symbol' . $i}, ${'card' . $i});
                    }
                displayWinner($card0, $card1);
                
                function displayCard($randomSymbol, $randomCard)
                {
                    switch($randomSymbol){
                        case 0: $symbol = "clubs";
                                break;
                        case 1: $symbol = "diamonds";
                                break;
                        case 2: $symbol = "hearts";
                                break;
                        case 3: $symbol = "spades";
                                break;
                    }
                   switch($randomCard){
                        case 1: $card = 'ten';
                                break;
                        case 2: $card = 'jack';
                                break;
                        case 3: $card = 'queen';
                                break;
                        case 4: $card = 'king';
                                break;
                        case 5: $card = 'ace';
                                break;
                    }
                    echo "<img id='card' src='img/cards/$symbol/$card.png' alt='$symbol' title='". ucfirst($symbol) . "' width='200' />";
                }
                function displayWinner($card0, $card1)
                {
                    if($card0 > $card1)    
                    {
                        echo "<h2>Human Wins!</h2>";
                    }
                    else if($card0 == $card1)
                    {
                        echo "<h2>Tie!</h2>";    
                    }
                    else 
                    {
                        echo "<h2>Computer Wins!</h2>";
                    }
                }
                
                
               
            ?>        
        </div>
    </body>
</html>