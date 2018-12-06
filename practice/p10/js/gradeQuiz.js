$(document).ready(function(){
    
    $("#logoutBtn").click( function() {
        window.location.href="login.html";
        }
    );
    
    var score = 0;
    $("form").submit(function(event) {
        
        event.preventDefault();
        
        //Get answers
        var answer1 = $("input[name='question1']").val().trim();
        var answer2 = $("input[name='question2']:checked").val();
        
        //Check answers
        // Question 1
        if(answer1 === "1994") {
            correctAnswer($("#question1-feedback"));
        } 
        else {  
            incorrectAnswer($("#question1-feedback"));
        }
        
        $("#question1-feedback").append("The answer is <strong>1994</strong>" );
        
        // Question 2
        if(answer2 === "C") {   
            correctAnswer($("#question2-feedback"));
        } 
        else { 
            incorrectAnswer($("#question2-feedback"));
        }
        $("#question2-feedback").append("The answer is <strong>Monte Rey</strong>" );
        
        $("#score").html( score );
        $("#waiting").html("<img src='img/loading.gif' alt='submitting data' />");
        $("input[type='submit']").css("display","none");
        
        //Submits and stores score, retrieves average score
        $.ajax({
            type : "post",
            url  : "submitScores.php",            
            dataType : "json",
            data : {"score" : score},            
            success : function(data){
                //console.log(data);
                $("#times").html(data.times);
                $("#average").html(data.average);
                $("#feedback").css("display","block");
                $("#waiting").html("");
                $("input[type='submit']").css("display","");
            },
            complete: function(data,status) { //optional, used for debugging purposes
               // alert(status);
            }

        });//AJAX
        
    }); //formSubmit
    
    function correctAnswer(questionFeedback){
        questionFeedback.html("Correct! ");
        questionFeedback.addClass("correct");
        questionFeedback.removeClass("incorrect");
        score++;
    }
    
    function incorrectAnswer(questionFeedback){
        questionFeedback.html("Incorrect! ");
        questionFeedback.addClass("incorrect");
        questionFeedback.removeClass("correct");
    }
    
}); //documentReady       