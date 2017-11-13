var humanCardNum;
var computerCardNum;
var humanCardVal;
var computerCardVal;

window.sessionStorage;

function getRand(){
        return Math.floor((Math.random()*26)+1);

}
window.onload=play();
function play(){
    humanCardNum=getRand();
    computerCardNum=getRand();
    humanCardVal=humanCardNum%13;
    computerCardVal=computerCardNum%13;
    if(humanCardVal==0){
        humanCardVal=13;
    }
    if(computerCardVal==0){
        computerCardVal=13;
    }
   
    console.log(humanCardVal);
    console.log(computerCardVal);
    displayCard(humanCardNum, computerCardNum);
    displayWinner(humanCardVal, computerCardVal);
    
    $("#button").append("<button id='button'>Play Again</button>");
}
function displayCard(human,computer){
    $("#human").append("<span>Human</span>");
    $("#human").append("<img id='humanPic' src='img/cards/"+human+".png' alt='human' title='human' width='70' />");
    
    $("#computer").append("<span>Computer</span>");
    $("#computer").append("<img id='computerPic' src='img/cards/"+computer+".png' alt='computer' title='computer' width='70' />");
    
}
function displayWinner(human,computer){
    var humanWins=sessionStorage.getItem("humanWins");
    var computerWins=sessionStorage.getItem("computerWins");
    if(human>computer){
        $("#result").append("<br><h1 id='humanTitle'>Human Wins!</h1>");
        humanWins++;
        sessionStorage.setItem("humanWins",humanWins);
    }
    if(computer>human){
        $("#result").append("<br><h1 id='computerTitle'>Computer Wins!</h1>");
        computerWins++;
        sessionStorage.setItem("computerWins",computerWins);
       
    }
    if(human==computer){
        $("#result").append("<br><h1 id='tie'>TIE!</h1>");
    }
     $("#score").append("<h2 id='scoreText'>Human: "+humanWins+" Computer: "+computerWins+"</h2>");
}
$("button").click(function(){
    location.reload();
})

