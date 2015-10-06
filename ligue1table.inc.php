<?php
	 	
      $cachefile = "cache/ligue1.html";
      $cachetime = 350 * 60; // 5 minutes
	  
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
	  $url = 'https://spreadsheets.google.com/feeds/list/1DfqbxCNBjXuTiCujaSa-Ze4xYDA5VpHQ1LSvFmPFuD0/oqfr03z/public/values?alt=json';
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
		if($i === 0){
		  echo '<table class="bordered hoverable"><tbody>';
	  echo '<tr><th><b class="hide-on-small-only">Platz</b></th><th>Mannschaft</th><th>Punkte</th><th class="hide-on-small-only">Spiele</th><th class="hide-on-med-and-down">Siege</th><th class="hide-on-med-and-down">Unentschieden</th><th class="hide-on-med-and-down">Niederlage</th><th class="hide-on-large-only hide-on-small-only">S/U/N</th><th>Diff.</th></tr>';
  		};
		//Panicotabelle Inhalt
		if($i > 0){
		echo '<tr><td>' . $erste . '.</td><td>' . $funfte . '</td><td><b>' . $elfte . '</b></td><td class="hide-on-small-only">' . $sechste . '</td><td class="hide-on-med-and-down">' . $siebte . '</td><td class="hide-on-med-and-down">' . $achte . '</td><td class="hide-on-med-and-down">' . $neunte . '</td><td class="hide-on-large-only hide-on-small-only">' . $siebte . '/' . $achte . '/' . $neunte . '</td><td>' . $zehnte . '</td>';
		};
		//Panicotabelle Ende
	   //Zählvariable um 1 erhöhen
	   $i = $i + 1;
	  };      
	  ?>
      </tbody></table>
  <script>
      $('#loading').hide();
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