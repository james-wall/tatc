$( document ).ready(function() {

	function updateText(text) {
		$("#question_text").text(text);
		$("#question_text_mobile").text(text);
	}
	var jsonObjReal;
	$.get( "/tatc/wwe/js/callAPI.php", function(jsonObj) {
		jsonObjReal = jsonObj;
		var randNum = Math.random();

		console.log(randNum);

		if(randNum < .25){
			$("<h1 id = 'choiceOne'>" + jsonObj.realCity + "</h1>").appendTo("#choice_1");
			$("<h1 id = 'choiceTwo'>" + jsonObj.fakeCity2 + "</h1>").appendTo("#choice_2");
			$("<h1 id = 'choiceThree'>" + jsonObj.fakeCity3 + "</h1>").appendTo("#choice_3");
			$("<h1 id = 'choiceFour'>" + jsonObj.fakeCity1 + "</h1>").appendTo("#choice_4");
		}
		else if(randNum >= .25 && randNum < .5){
			$("<h1 id = 'choiceOne'>" + jsonObj.fakeCity1 + "</h1>").appendTo("#choice_1");
			$("<h1 id = 'choiceTwo'>" + jsonObj.realCity + "</h1>").appendTo("#choice_2");
			$("<h1 id = 'choiceThree'>" + jsonObj.fakeCity3 + "</h1>").appendTo("#choice_3");
			$("<h1 id = 'choiceFour'>" + jsonObj.fakeCity2 + "</h1>").appendTo("#choice_4");
		}
		else if(randNum >= .5 && randNum < .75){
			$("<h1 id = 'choiceOne'>" + jsonObj.fakeCity1 + "</h1>").appendTo("#choice_1");
			$("<h1 id = 'choiceTwo'>" + jsonObj.fakeCity2 + "</h1>").appendTo("#choice_2");
			$("<h1 id = 'choiceThree'>" + jsonObj.realCity + "</h1>").appendTo("#choice_3");
			$("<h1 id = 'choiceFour'>" + jsonObj.fakeCity3 + "</h1>").appendTo("#choice_4");
		}
		else{
			$("<h1 id = 'choiceOne'>" + jsonObj.fakeCity1 + "</h1>").appendTo("#choice_1");
			$("<h1 id = 'choiceTwo'>" + jsonObj.fakeCity2 + "</h1>").appendTo("#choice_2");
			$("<h1 id = 'choiceThree'>" + jsonObj.fakeCity3 + "</h1>").appendTo("#choice_3");
			$("<h1 id = 'choiceFour'>" + jsonObj.realCity + "</h1>").appendTo("#choice_4");
		}
		updateText(jsonObj.comment);
	}, "json").fail(function(jqXHR, textStatus, errorThrown) {
		console.log(jqXHR);
		console.log(textStatus);
		console.log(errorThrown);
		alert(jqXHR);
		alert(textStatus);
		alert(errorThrown);
		//alert( "error" );
	});

	$(document).delegate("#choice_1", "click", function() {
		console.log(jsonObjReal.realCity);
		console.log(document.getElementById('choiceOne').innerHTML);
		if(jsonObjReal.realCity === document.getElementById('choiceOne').innerHTML){
			alert("you did it!");
		}
		else{
			alert("awwww... :/");
		}
	});
	$(document).delegate("#choice_2", "click", function() {
		console.log(jsonObjReal.realCity);
		console.log(document.getElementById('choiceTwo').innerHTML);
		if(jsonObjReal.realCity === document.getElementById('choiceTwo').innerHTML){
			alert("you did it!");
		}
		else{
			alert("awwww... :/");
		}
	});
	$(document).delegate("#choice_3", "click", function() {
		console.log(jsonObjReal.realCity);
		console.log(document.getElementById('choiceThree').innerHTML);
		if(jsonObjReal.realCity === document.getElementById('choiceThree').innerHTML){
			alert("you did it!");
		}
		else{
			alert("awwww... :/");
		}
	});
	$(document).delegate("#choice_4", "click", function() {
		console.log(jsonObjReal.realCity);
		console.log(document.getElementById('choiceFour').innerHTML);
		if(jsonObjReal.realCity === document.getElementById('choiceFour').innerHTML){
			alert("you did it!");
		}
		else{
			alert("awwww... :/");
		}
	});

	//updateText("Despite staying on the top floor, there was no way you could see the Gateway Arch. Needless to say there were quite a few buildings in the way. Great serive though.");


});