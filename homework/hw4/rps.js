var imgPlayer;
var btnfire;
var btnwater;
var btngrass;
var btnGo;
var playerMove;
var computerMove;


function startGame(){
    document.getElementById('introScreen').style.display = 'none';
}

// function replay(){
//     location.reload();
// }

function replay(){
    document.getElementById('endScreen').style.display = 'none';
    
    btnGo.style.display = 'none';
    
    deselectAll();
    
    document.getElementById('lblfire').style.backgroundColor = 'silver';
    document.getElementById('lblwater').style.backgroundColor = 'silver';
    document.getElementById('lblgrass').style.backgroundColor = 'silver';
    
    imgPlayer.src = 'images/question.png';
    document.getElementById('imgComputer').src = 'images/question.png';
}

function go(){
    //alert('Ready to Go!');
    var EndTitle = document.getElementById('EndTitle');
    var EndMessage = document.getElementById('EndMessage');
    
    var numChoice = Math.floor(Math.random()*3); // 0 - 2
    var imgComputer = document.getElementById('imgComputer');
    
    document.getElementById('lblfire').style.backgroundColor = 'silver';
    document.getElementById('lblwater').style.backgroundColor = 'silver';
    document.getElementById('lblgrass').style.backgroundColor = 'silver';
    
    if(numChoice == 0){
        computerMove = 'fire';
        imgComputer.src = 'images/fire.png';
        document.getElementById('lblfire').style.backgroundColor = 'red';
        if(playerMove == 'fire'){
            EndTitle.innerHTML = '';
            EndMessage.innerHTML = 'TIE';
        }
        else if(playerMove == 'water'){
            EndTitle.innerHTML = 'Water puts out Fire';
            EndMessage.innerHTML = 'YOU WIN';
        }
        else if(playerMove == 'grass'){
            EndTitle.innerHTML = 'Fire burns Grass';
            EndMessage.innerHTML = 'YOU LOSE';
        }
    }
    else if(numChoice == 1){
        computerMove = 'water';
        imgComputer.src = 'images/water.png';
        document.getElementById('lblwater').style.backgroundColor = 'blue';
        if(playerMove == 'fire'){
            EndTitle.innerHTML = 'Water puts out Fire';
            EndMessage.innerHTML = 'YOU LOSE';
        }
        else if(playerMove == 'water'){
            EndTitle.innerHTML = '';
            EndMessage.innerHTML = 'TIE';
        }
        else if(playerMove == 'grass'){
            EndTitle.innerHTML = 'Grass absorbs water';
            EndMessage.innerHTML = 'YOU WIN';
        }
    }
    else if(numChoice == 2){
        computerMove = 'grass';
        imgComputer.src = 'images/grass.png';
        document.getElementById('lblgrass').style.backgroundColor = 'green';
        if(playerMove == 'fire'){
            EndTitle.innerHTML = 'Fire burns Grass';
            EndMessage.innerHTML = 'YOU WIN';
        }
        else if(playerMove == 'water'){
            EndTitle.innerHTML = 'Grass beats Water';
            EndMessage.innerHTML = 'YOU LOSE';
        }
        else if(playerMove == 'grass'){
            EndTitle.innerHTML = '';
            EndMessage.innerHTML = 'TIE';
        }
    }
    document.getElementById('endScreen').style.display = 'block';
}

function init(){
	imgPlayer = document.getElementById("imgPlayer");
	btnfire = document.getElementById("btnfire");
	btnwater = document.getElementById("btnwater");
	btngrass = document.getElementById("btngrass");
	btnGo = document.getElementById("btnGo");
	deselectAll();
}

function deselectAll(){
    btnwater.style.backgroundColor = 'silver';
    btngrass.style.backgroundColor = 'silver';
    btnfire.style.backgroundColor = 'silver';
}

function select(choice){
    playerMove = choice;
    imgPlayer.src = 'images/' + choice + '.png';
    deselectAll();
    if(choice == 'fire') btnfire.style.backgroundColor = 'red';
    if(choice == 'water') btnwater.style.backgroundColor = 'blue';
    if(choice == 'grass') btngrass.style.backgroundColor = 'green';
    
    btnGo.style.display = 'block';
}
	
