$( document ).ready(function() {

	function updateText(text) {
		/*if (text.length > 150) {
			text = text.slice(0, 150) + "...";
		}*/
		$("#question_text").text(text);
		$("#question_text_mobile").text(text);
	}

	$.get( "/tatc/wwe/js/callAPI.php", function(jsonObj) {

		//var jsonObj = JSON.parse(json);
		var randNum = Math.random();

		console.log(randNum);

		if(randNum < .25){
			$("<h1>" + jsonObj.realCity + "</h1>").appendTo("#choice_1");
			$("<h1>" + jsonObj.fakeCity2 + "</h1>").appendTo("#choice_2");
			$("<h1>" + jsonObj.fakeCity3 + "</h1>").appendTo("#choice_3");
			$("<h1>" + jsonObj.fakeCity1 + "</h1>").appendTo("#choice_4");
		}
		else if(randNum >= .25 && randNum < .5){
			$("<h1>" + jsonObj.fakeCity1 + "</h1>").appendTo("#choice_1");
			$("<h1>" + jsonObj.realCity + "</h1>").appendTo("#choice_2");
			$("<h1>" + jsonObj.fakeCity3 + "</h1>").appendTo("#choice_3");
			$("<h1>" + jsonObj.fakeCity2 + "</h1>").appendTo("#choice_4");
		}
		else if(randNum >= .5 && randNum < .75){
			$("<h1>" + jsonObj.fakeCity1 + "</h1>").appendTo("#choice_1");
			$("<h1>" + jsonObj.fakeCity2 + "</h1>").appendTo("#choice_2");
			$("<h1>" + jsonObj.realCity + "</h1>").appendTo("#choice_3");
			$("<h1>" + jsonObj.fakeCity3 + "</h1>").appendTo("#choice_4");
		}
		else{
			$("<h1>" + jsonObj.fakeCity1 + "</h1>").appendTo("#choice_1");
			$("<h1>" + jsonObj.fakeCity2 + "</h1>").appendTo("#choice_2");
			$("<h1>" + jsonObj.fakeCity3 + "</h1>").appendTo("#choice_3");
			$("<h1>" + jsonObj.realCity + "</h1>").appendTo("#choice_4");
		}
		updateText(jsonObj.comment);
	}, "json").fail(function() {
		alert( "error" );
	});

	$(document).delegate("#choice_1", "click", function() {
		console.log("You chose choice 1.");
	});
	$(document).delegate("#choice_2", "click", function() {
		console.log("You chose choice 2.");
	});
	$(document).delegate("#choice_3", "click", function() {
		console.log("You chose choice 3.");
	});
	$(document).delegate("#choice_4", "click", function() {
		console.log("You chose choice 4.");
	});

	//updateText("Despite staying on the top floor, there was no way you could see the Gateway Arch. Needless to say there were quite a few buildings in the way. Great serive though.");


});