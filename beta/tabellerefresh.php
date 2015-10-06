<?php
	 	
      $cachefile = "cache/tabelle.html";
      $cachetime = 0 * 60; // 5 minutes
	  
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
<div class="card">
    <div class="card-content">
    	<?php
      echo '<table class="bordered hoverable"><tbody>';
	  echo '<tr><th>Platz</th><th>Name</th><th>Punkte</th><th class="grey-text hide-on-small-only">1<small>Tag</small></th><th class="grey-text">2<small class="hide-on-small-only">Tage</small><small class="hide-on-med-and-up">d</small></th><th class="grey-text hide-on-med-and-down">7<small class="hide-on-small-only">Tage</small><small class="hide-on-med-and-up">d</small></th></tr>';
	  // Parsing this spreadsheet: 
	  $url = 'https://spreadsheets.google.com/feeds/list/1_k0XrSfns-WnukwEubctqHUcA1RafVWjAnFhPDiDNOc/oofr89u/public/values?alt=json';
	  $file= file_get_contents($url);
	  
	  $json = json_decode($file);
	  $rows = $json->{'feed'}->{'entry'};
	  foreach($rows as $row) {
		$platz = $row->{'gsx$platz'}->{'$t'};
		$name = $row->{'gsx$name'}->{'$t'};
		$punkte = $row->{'gsx$punkte'}->{'$t'};
		$tag = $row->{'gsx$tag'}->{'$t'};
		$heute = $row->{'gsx$heute'}->{'$t'};
		$woche = $row->{'gsx$woche'}->{'$t'};
		
		echo '<tr><td>' . $platz . '</td><td>' . $name . '</td><td><b>' . $punkte . '</b></td><td class="grey-text hide-on-small-only">' . $tag . '</td><td class="grey-text">' . $heute . '</td><td class="grey-text  hide-on-med-and-down">' . $woche . '</td>';
		
	  };
      echo '</tbody></table>';
	  ?>
    </div>
  </div>
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