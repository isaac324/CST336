// VARIABLES
// Creating an array of available letters
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H',
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P',
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

var selectedWord = "";
var selectedHint = "";
var board = []; 
var remainingGuesses = 6;

var words = [{ word: "snake", hint: "It's a reptile" },
             { word: "monkey", hint: "It's a mammal" },
             { word: "beetle", hint: "It's an insect" }];

// LISTENERS
window.onload = startGame();

$("#letters").on("click", ".letter", function(){
    checkLetter($(this).attr("id"));
    disableButton($(this));
});

$(".replayBtn").on("click", function(){
    location.reload();
});

// FUNCTIONS
function startGame(){
    pickWord();
    createLetters();
    
    initBoard();
    updateBoard();
}

function pickWord() {
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

//Creating the letters inside the letters div
function createLetters() {
    for(var letter of alphabet) {
        let letterInput = '"' + letter + '"';
        $("#letters").append("<button class='btn btn-success letter' id='" + letter + "'>" + letter + "</button>");
    }
}

//fill the board with underscores
function initBoard() {
    for(var letter in selectedWord) {
        board.push("_");
    }
}

//function to display hint
function showHint() {
    document.getElementById("hintmessage").style.display = "inline";
    document.getElementById("hintmessage").innerHTML = "<i>" + selectedHint + "</i>";
    document.getElementById("hintmessage").style.color = "navy";
    document.getElementById("HintBtn").style.display = "none";
    
    remainingGuesses--;
    updateMan();
}

function updateBoard() {
    $("#word").empty();
    
    for(var i = 0; i < board.length; i++) {
        $("#word").append(board[i] + " ");
    }
    
    $("#word").append("<br />");
    //$("#word").append("<span class='hint'> Hint: </span>");
    //$("#word").append("<span class='hint'>" + emptyHint + "</span>");
    //$("#word").append("<span class='hint'> <button id='hintBtn' onclick='showHint()' >Get Hint</button> " + "</span>");
    
    // for(var letter of board) {
    //     document.getElementById("word").innerHTML += letter + " ";
    // }
}

//Update the current word then calls for a board update
function updateWord(positions, letter) {
    for(var pos of positions) {
        board[pos] = letter;
    }
    
    updateBoard(board);
    
    //Checks to see if user got winning guess
    if(!board.includes('_')) {
        endGame(true);
    }
}

//Checks to see if the selected letter exists in the selectedWord
function checkLetter(letter) {
    var positions = new Array();
    
    //Put all the positions the letter exists in an array
    for (var i = 0; i < selectedWord.length; i++) {
        if(letter == selectedWord[i]) {
            positions.push(i);
        }
    }
    
    if(positions.length > 0) {
        updateWord(positions, letter);
    } else {
        remainingGuesses--;
        updateMan();
        
        if(remainingGuesses <= 0){
            endGame(false);
        }
    }
}

function updateMan() {
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

//Ends the game by hiding game divs and displaying the win or loss divs
function endGame(win) {
    document.getElementById("hintmessage").style.display = "none";
    document.getElementById("HintBtn").style.display = "none";
    $("#letters").hide();
    
    if(win) {
        $('#won').show();
    }else {
        $('#lost').show();
    }
}

// Disables the button and changes the style to tell the user it's disabled
function disableButton(btn) {
    btn.prop("disabled",true);
    btn.attr("class", "btn btn-danger")
}

    