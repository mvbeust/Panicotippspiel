  <form id="foo">
    <div class="row">
      <?php
	  // Parsing this spreadsheet: 
	  $url = 'https://spreadsheets.google.com/feeds/list/1_k0XrSfns-WnukwEubctqHUcA1RafVWjAnFhPDiDNOc/o49m32u/public/values?alt=json';
	  $file= file_get_contents($url);
	  
	  $json = json_decode($file);
	  $rows = $json->{'feed'}->{'entry'};
	  foreach($rows as $row) {
		$art = $row->{'gsx$art'}->{'$t'};
		$m1 = $row->{'gsx$m1'}->{'$t'};
		$m2 = $row->{'gsx$m2'}->{'$t'};
		$beschreibung = $row->{'gsx$beschreibung'}->{'$t'};
		$datum = $row->{'gsx$datum'}->{'$t'};
		$abgegeben = $row->{'gsx$abgegeben'}->{'$t'};
		$nr = $row->{'gsx$nr'}->{'$t'};
		$i = 1;
		if($art == "Kein"){
			//Wenn alle Ergebnisse eingetragen sind
			echo '<div class="col s12 m6"><div class="card-panel orange"><span class="white-text">Alle Ergebnisse eingetragen</span></div></div>';
		}else{
			//Wenn ein Ergebnis fehlt
			echo '<div style="display:none"><select name="Spiel' . $i . 'Nr"><option>' .  $nr . '</option></select><select name="wer"><option>Ergebnis</option></select></div>'; //SpielNummer
			echo '<div class="col s12 m6"><div class="card"><div class="card-content"><p style="font-size:larger; font-weight:bold">' . $m1 . ' vs. ' . $m2 . '</p><p style="font-size:smaller; font-weight:inherit; color:#999">' . $beschreibung . '</p><p><div class="input-field col s12 m6"><input id="Spiel' . $i . '1M1id" type="number" class="validate" name="Spiel' . $i . 'ScoreM1"><label for="Spiel' . $i . '1M1id">Heim</label></div><div class="input-field col s12 m6"><input id="Spiel' . $i . '1M2id" type="number" class="validate" name="Spiel' . $i . 'ScoreM2"><label for="Spiel' . $i . '1M2id">Gast</label></div></p><div><p class="hide-on-med-and-down col s12 m6"><select name="Spiel' . $i . 'Length"><option value="" disabled selected>L&#228;nge</option><option value="90">90</option><option value="120">120</option><option value="11er">11er</option></select></p><p class="hide-on-large-only col s12 m6" style="padding-bottom: 10px"><select class="browser-default" name="Spiel' . $i . 'Length"><option value="" disabled selected>L&#228;nge</option><option value="90">90</option><option value="120">120</option><option value="11er">11er</option></select></p><p class="hide-on-med-and-down col s12 m6"><select name="Spiel' . $i . 'Sieger"><option value="" disabled selected>Sieger</option><option value="' . $m1 . '">' . $m1 . '</option><option value="' . $m2 . '">' . $m2 . '</option><option value="Unentschieden">Unentschieden</option></select></p><p class="hide-on-large-only col s12 m6" style="padding-bottom: 20px"><select class="browser-default" name="Spiel' . $i . 'Sieger"><option value="" disabled selected>Sieger</option><option value="' . $m1 . '">' . $m1 . '</option><option value="' . $m2 . '">' . $m2 . '</option><option value="Unentschieden">Unentschieden</option></select></p></div><p style="font-size:smaller; font-weight:inherit; color:#999">' . $datum . '</p><p style="font-size:smaller; font-weight:inherit; color:#F90">' . $abgegeben . '</p></div></div></div>';
		};
	  };
	  ?>
    </div>
    <div class="row">
      <div class="right-align">
        <button class="btn waves-effect waves-light orange white-text" type="submit" value="Send" id="result">Eintragen <i class="mdi-content-send right"></i> </button>
      </div>
    </div>
  </form>
  <script>
      $('#loading').hide();
  </script>
  <script type="text/javascript" src="js/materialize.min.js"></script> 
  <script src="js/init.js"></script>
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
			toast('<span>Ergebnis OK</span><a class="btn-flat yellow-text" href="ergebnis.php"><i class="material-icons">refresh</i></a>', 15000);
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