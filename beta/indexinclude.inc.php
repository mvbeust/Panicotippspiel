<?php
	 	
      $cachefile = "cache/index.html";
      $cachetime = 2 * 60; // 2 minutes
	  
      // Serve from the cache if it is younger than $cachetime
      if (file_exists($cachefile) && (time() - $cachetime
         < filemtime($cachefile))) 
      {
         include($cachefile);
         echo "<!-- Cached ".date('jS F Y H:i', filemtime($cachefile))." 
         -->";
         exit;
      }
      ob_start(); // start the output buffer
?>
    <div class="row"> 
      <!--HIER MUSS PHP REIN-->
      <?php

	  // Parsing this spreadsheet: 
	  $url = 'https://spreadsheets.google.com/feeds/list/1_k0XrSfns-WnukwEubctqHUcA1RafVWjAnFhPDiDNOc/ok5y6gc/public/values?alt=json';
	  $file= file_get_contents($url);
	  
	  $i = 1;
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
		
		//Art des Spiels wird geprüft
		if($art == "Kein"){
			//Wenn kein Spiel vorhanden
			echo '<div class="col s12 m6"><div class="card-panel orange"><span class="white-text">Leider finden in den nächsten 10 Tagen keine zu tippenden Spiele statt. Bitte schau in ein paar Tagen nochmal vorbei! Danke</span></div></div>';
		}elseif($art == "ko"){
			//Wenn es ein ko-Spiel ist
			echo '<div style="display:none"><select name="Spiel' . $i . 'Nr"><option>' .  $nr . '</option></select></div>'; //SpielNummer
			echo '<div class="col s12 m6"><div class="card"><div class="card-content"><p style="font-size:larger; font-weight:bold">' . $m1 . ' vs. ' . $m2 . '</p><p style="font-size:smaller; font-weight:inherit; color:#999">' . $beschreibung . '</p><p><div class="input-field col s12 m6"><input id="Spiel' . $i . '1M1id" type="number" class="validate" name="Spiel' . $i . 'ScoreM1"><label for="Spiel' . $i . '1M1id">Heim</label></div><div class="input-field col s12 m6"><input id="Spiel' . $i . '1M2id" type="number" class="validate" name="Spiel' . $i . 'ScoreM2"><label for="Spiel' . $i . '1M2id">Gast</label></div></p><div><p class="hide-on-med-and-down col s12 m6"><select name="Spiel' . $i . 'Length"><option value="" disabled selected>L&#228;nge</option><option value="90">90</option><option value="120">120</option><option value="11er">11er</option></select></p><p class="hide-on-large-only col s12 m6" style="padding-bottom: 10px"><select class="browser-default" name="Spiel' . $i . 'Length"><option value="" disabled selected>L&#228;nge</option><option value="90">90</option><option value="120">120</option><option value="11er">11er</option></select></p><p class="hide-on-med-and-down col s12 m6"><select name="Spiel' . $i . 'Sieger"><option value="" disabled selected>Sieger</option><option value="' . $m1 . '">' . $m1 . '</option><option value="' . $m2 . '">' . $m2 . '</option></select></p><p class="hide-on-large-only col s12 m6" style="padding-bottom: 20px"><select class="browser-default" name="Spiel' . $i . 'Sieger"><option value="" disabled selected>Sieger</option><option value="' . $m1 . '">' . $m1 . '</option><option value="' . $m2 . '">' . $m2 . '</option></select></p></div><p style="font-size:smaller; font-weight:inherit; color:#999">' . $datum . '</p><p style="font-size:smaller; font-weight:inherit; color:#F90">' . $abgegeben . '</p></div></div></div>';
			
		}elseif($art == "Normal"){
			//Wenn es ein normales Spiel ist
			echo '<div style="display:none"><select name="Spiel' . $i . 'Nr"><option>' . $nr . '</option></select></div>'; //SpielNummer
			echo '<div class="col s12 m6"><div class="card"><div class="card-content"><p style="font-size:larger; font-weight:bold">' . $m1 . ' vs. ' . $m2 . '</p><p style="font-size:smaller; font-weight:inherit; color:#999">' . $beschreibung . '</p><p><div class="input-field col s12 m6"><input id="Spiel' . $i . '1M1id" type="number" class="validate" name="Spiel' . $i . 'ScoreM1"><label for="Spiel' . $i . '1M1id">Heim</label></div><div class="input-field col s12 m6"><input id="Spiel' . $i . '1M2id" type="number" class="validate" name="Spiel' . $i . 'ScoreM2"><label for="Spiel' .$i . 'M2id">Gast</label></div></p><p style="font-size:smaller; font-weight:inherit; color:#999">' . $datum . '</p><p style="font-size:smaller; font-weight:inherit; color:#F90">' . $abgegeben . '</p></div></div></div>';
		}
		
		$i = $i+1;
	  };
        ?>
    </div>
    <div class="row">
      <div class="right-align">
        <button class="btn waves-effect waves-light orange white-text" type="submit" value="Send" id="result">Abgeben <i class="mdi-content-send right"></i> </button>
      </div>
    </div>
    <script>
      $('#loading').hide();
	 </script>
<script type="text/javascript" src="js/materialize.min.js"></script> 
<script src="js/init.js"></script> 
<?php
       // open the cache file for writing
       $fp = fopen($cachefile, 'w'); 
       // save the contents of output buffer to the file
	    fwrite($fp, ob_get_contents());
		// close the file
        fclose($fp); 
		// Send the output to the browser
        ob_end_flush(); 
?>