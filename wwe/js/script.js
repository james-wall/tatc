$( document ).ready(function() {

	function updateText(text) {
		if (text.length > 150) {
			text = text.slice(0, 150) + "...";
		}
		$("#question_text").text(text);
		$("#question_text_mobile").text(text);
	}
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

	// $.get( "trippy.php", function( data ) {
	//   alert( "Data Loaded: " + data );
	// });

});