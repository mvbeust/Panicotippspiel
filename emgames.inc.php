<?php
	 	
      $cachefile = "cache/euroqualigames.html";
      $cachetime = 1500 * 60; // 5 minutes
	  
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
    	<?php

	  // Parsing this spreadsheet: 
	  $url = 'https://spreadsheets.google.com/feeds/list/1DfqbxCNBjXuTiCujaSa-Ze4xYDA5VpHQ1LSvFmPFuD0/od1zs5n/public/values?alt=json';
	  $file= file_get_contents($url);
	  $i = 0;
	  $json = json_decode($file);
	  $rows = $json->{'feed'}->{'entry'};
	  foreach($rows as $row) {
		$erste = $row->{'gsx$erste'}->{'$t'};
		$zweite = $row->{'gsx$zweite'}->{'$t'};
		$dritte = $row->{'gsx$dritte'}->{'$t'};
		$vierte = $row->{'gsx$vierte'}->{'$t'};
		$funfte = $row->{'gsx$funfte'}->{'$t'};
		$sechste = $row->{'gsx$sechste'}->{'$t'};
		$siebte = $row->{'gsx$siebte'}->{'$t'};
		$achte = $row->{'gsx$achte'}->{'$t'};
		$neunte = $row->{'gsx$neunte'}->{'$t'};
		$zehnte = $row->{'gsx$zehnte'}->{'$t'};
		$elfte = $row->{'gsx$elfte'}->{'$t'};
		//Panicotabelle beginnt
		if(substr($erste,0,6) === "Gruppe" Or substr($erste,0,8) === "Playoffs"){
			$i = 0;
			echo '</tbody></table></div></li>';
		};
		if($i === 0){
		  echo '<li><div class="collapsible-header" style="font-weight: bold">' . $erste .'</div><div class="collapsible-body" style="padding: 20px;  margin: 0; background-color:#F5F5F5">';
		  echo '<table class="bordered hoverable"><tbody>';
  		};
		//Panicotabelle Inhalt
		if($i > 0){
					//Überprüfung ob es eine Uhrzeit ist um einzurücken
			if(strlen ($erste) === 5){
				$padding = 'padding-left: 44px;';
			}else{
				$padding = '';
			};
			//Datum für mobile Ansicht erstellen
			if($zweite === '' && $vierte === ''){
				$spieldatum = substr($erste, -11);
				$erste = $spieldatum;
		    }else{
				$spieldatum = '';
			};
			//Farbe der Uhrzeit bei Wiederholung ändern
			if($erste === $uhrzeit){
              $farbe = '; color:lightgrey';
			}else{
			  $farbe = '';
			};
			//Tatsächlicher Code
			echo '<tr><td class="hide-on-small-only" style="' . $padding . $farbe .  '">' . $erste . '</td><td class="hide-on-small-only">' . $zweite . '</td><td class="hide-on-med-and-up">' . $vierte . '</td><td><b>' . $sechste . '</b><i class="hide-on-med-and-up" style="font-style:normal">' .  $spieldatum  .'</i></td><td class="hide-on-small-only">' . $zehnte . '</td><td class="hide-on-med-and-up">' . $achte . '</td>';
			$uhrzeit = $erste;
		};
		//Panicotabelle Ende
	   //Zählvariable um 1 erhöhen
	   $i = $i + 1;
	  };      
	  ?>
      </tbody></table></div></li>
  <script>
      $('#loading2').hide();
  </script>
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