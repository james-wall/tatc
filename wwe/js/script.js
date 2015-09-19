$( document ).ready(function() {

	function updateText(text) {
		if (text.length > 150) {
			text = text.slice(0, 150) + "...";
		}
		$("#question_text").text(text);
		$("#question_text_mobile").text(text);
	}

	$.get( "/tatc/wwe/js/callAPI.php", function(json) {
	 alert( "Load was performed." );
	 //alert( "Data Loaded: " + json);
	 var jsonObj = JSON.parse(json);
	 console.log(jsonObj);
	 console.log(jsonObj.fakeCity1);
	 console.log(jsonObj.realCity);
	 $(jsonObj.fakeCity1).appendTo("#choice_1");gi
	 $(jsonObj.fakeCity2).appendTo("#choice_2");
	 $(jsonObj.fakeCity3).appendTo("#choice_3");
	 $(jsonObj.realCity).appendTo("#choice_4");
	})
	.fail(function() {
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

	updateText("Despite staying on the top floor, there was no way you could see the Gateway Arch. Needless to say there were quite a few buildings in the way. Great serive though.");


});