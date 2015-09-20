var jsonObjReal;
function main() {
	$("#question_text").text(" ");
	$("#question_text_mobile").text(" ");
	function updateText(text) {
		$("#question_text").text(text);
		$("#question_text_mobile").text(text);
	}
	$.get( "http://172.27.168.90/js/callAPI.php", function(jsonObj) {
		jsonObjReal = jsonObj;
		var randNum = Math.random();
		if(randNum < .25){
			$("#choiceOne").text(jsonObj.realCity);
			$("#choiceTwo").text(jsonObj.fakeCity2);
			$("#choiceThree").text(jsonObj.fakeCity3);
			$("#choiceFour").text(jsonObj.fakeCity1);
		}
		else if(randNum >= .25 && randNum < .5){
			$("#choiceOne").text(jsonObj.fakeCity1);
			$("#choiceTwo").text(jsonObj.realCity);
			$("#choiceThree").text(jsonObj.fakeCity3);
			$("#choiceFour").text(jsonObj.fakeCity2);
		}
		else if(randNum >= .5 && randNum < .75){
			$("#choiceOne").text(jsonObj.fakeCity1);
			$("#choiceTwo").text(jsonObj.fakeCity2);
			$("#choiceThree").text(jsonObj.realCity);
			$("#choiceFour").text(jsonObj.fakeCity3);
		}
		else{
			$("#choiceOne").text(jsonObj.fakeCity1);
			$("#choiceTwo").text(jsonObj.fakeCity2);
			$("#choiceThree").text(jsonObj.fakeCity3);
			$("#choiceFour").text(jsonObj.realCity);
		}

		updateText(jsonObj.comment);
	}, "json").fail(function(jqXHR, textStatus, errorThrown) {
		console.log(jqXHR);
		console.log(textStatus);
		console.log(errorThrown);
		alert(jqXHR);
		alert(textStatus);
		alert(errorThrown);
	});
}

$( document ).ready(function() { main(); }); 

function startgame() {
            $("#map").css("display", "none");
            $("#play_game").css("display", "none");
            $("#game_container").css("display", "initial");
            $("#results").css("display", "none");
            city = jsonObjReal.realCity;

        }
        function showResults(oranges) {
        	$("#game_container").css("display", "none");
        	$("#map").css("display", "inherit");
        	$("#results").css("display", "initial");
            if (oranges == 1) {
                if (jsonObjReal.realCity == $("#choiceOne").text()) {
                    console.log("You were correct!");
                } else {
                    console.log("You were wrong");
                } 
            } 
            else if (oranges == 2) {
                if (jsonObjReal.realCity == $("#choiceTwo").text()) {
                    console.log("You were correct!");
                } else {
                    console.log("You were wrong");
                } 
            } 
            else if (oranges == 3) {
                if (jsonObjReal.realCity == $("#choiceThree").text()) {
                    console.log("You were correct!");
                } else {
                    console.log("You were wrong");
                } 
            } 
            else if (oranges == 4) {
                if (jsonObjReal.realCity == $("#choiceFour").text()) {
                    console.log("You were correct!");
                } else {
                    console.log("You were wrong");
                } 
            } 
            $("#corrected").text("The correct location was: " + jsonObjReal.realCity);
            city = jsonObjReal.realCity;
            initMap();
        }
        function newgame() {
            $("#map").css("display", "none");
            $("#results").css("display", "none");
            $("#game_container").css("display", "initial");
            main(); }