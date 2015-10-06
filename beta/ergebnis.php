<!DOCTYPE html>

<head>
<meta charset="UTF-8">
<title>Ergebnis - Panicotippspiel</title>
<meta name="description" content="Die Ergebniseingabe des Panicotippspiels. Hier kann man Ergebnisse eintragen, sollte das noch nicht durch magische Hand geschehen sein." />
<?php
include 'metamobile.inc.php';
?>
</head>

<body>
<header>
  <?php
include 'nav.inc.php';
?>
</header>
<main class="container" id="container">
  <div id="loading" class="animated pulse infinite center-align" style="padding-top:50px">
   <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a>
  </div>
<script>
$(document).ready(function() {
    $("#container").load("ergebnisinclude.inc.php");
});

</script>
<a class="waves-effect waves-light btn-large orange" href="refresh.php"><i class="mdi-navigation-refresh right"></i>Refresh</a>
</main>
<script data-cfasync="false" type="text/javascript">

jQuery( document ).ready(function( $ ) {
	
	// variable to hold request
	var request;
	// bind to the submit event of our form
	$("#foo").submit(function(event){

		// abort any pending request
		if (request) {
			request.abort();
		}
		// setup some local variables
		var $form = $(this);
		$('#result').attr("class", "btn grey white-text inactive");
		$('#result').text('Senden...');
		
		
		
		// let's select and cache all the fields
		var $inputs = $form.find("button, input, select, button, textarea");
		// serialize the data in the form
		var serializedData = $form.serialize();
	
		// let's disable the inputs for the duration of the ajax request
		// Note: we disable elements AFTER the form data has been serialized.
		// Disabled form elements will not be serialized.
		$inputs.prop("disabled", true);
	
		// fire off the request to /form.php
		request = $.ajax({
			url: "https://script.google.com/macros/s/AKfycbymohqCiwrzRknolQI_cvHTeybwjCdbziQumKfJidydzrfgKqT2/exec",
			type: "post",
			data: serializedData
		});
		$('#result').text('Senden...');
	
		// callback handler that will be called on success
		request.done(function (response, textStatus, jqXHR){
			// log a message to the console
			$('#result').text('Angenommen');
			$('#result').parent(this).hide();
			toast('Ergebnis eingetragen', 9000, 'rounded');
			console.log("Jap, dieses Ergebnis ist angekommen");
		});
	
		// callback handler that will be called on failure
		request.fail(function (jqXHR, textStatus, errorThrown){
			// log the error to the console
			console.error(
				"The following error occured: "+
				textStatus, errorThrown
			);
		});
	
		// callback handler that will be called regardless
		// if the request failed or succeeded
		request.always(function () {
			// reenable the inputs
			$inputs.prop("disabled", true);
			$('#result').text('iOS is a Bitch!');
		});
	
		// prevent default posting of form
		event.preventDefault();
	});
});

</script> 

<!--Skripte--> 
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> 
<script type="text/javascript">if (!window.jQuery) { document.write('<script src="bin/jquery-2.1.1.min.js"><\/script>'); }</script> 
<script type="text/javascript" src="js/materialize.min.js"></script> 
<script src="js/init.js"></script>

  <?php
include 'footer.inc.php';
?>

</body>
