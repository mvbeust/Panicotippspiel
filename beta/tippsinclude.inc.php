<?php
	 	
      $cachefile = "cache/tipps.html";
      $cachetime = 1 * 60; // 5 minutes
	  
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
      echo '<table class="bordered striped" style="font-size:70%"><tbody>';
	  echo '<tr><th>Spiel</th><th>Franz</th><th>Hans</th><th>Mario</th><th>Max</th><th>Final</th></tr>';
	  // Parsing this spreadsheet: 
	  $url = 'https://spreadsheets.google.com/feeds/list/1_k0XrSfns-WnukwEubctqHUcA1RafVWjAnFhPDiDNOc/o6eizxz/public/values?alt=json';
	  $file= file_get_contents($url);
	  $i = 0;
	  $json = json_decode($file);
	  $rows = $json->{'feed'}->{'entry'};
	  foreach($rows as $row) {
		$datum = $row->{'updated'}->{'$t'};
		$spiel = $row->{'gsx$spiel'}->{'$t'};
		$franz = $row->{'gsx$franz'}->{'$t'};
		$hans = $row->{'gsx$hans'}->{'$t'};
		$mario = $row->{'gsx$mario'}->{'$t'};
		$max = $row->{'gsx$max'}->{'$t'};
		$final = $row->{'gsx$final'}->{'$t'};
		$hover = $row->{'gsx$hover'}->{'$t'};
		$datum = $row->{'gsx$datum'}->{'$t'};
		
		echo '<tr><td><a class="tooltipped" data-position="right" data-delay="50" style="font-weight:inherit; color: rgba(0,0,0,0.87); text-transform:none" data-tooltip="' . $hover . '">' . $spiel . '</a></td><td>' . $franz . '</td><td>' . $hans . '</td><td>' . $mario . '</td><td>' . $max . '</td><td>' . $final . '</td>';	
		
		};
		echo '<script>console.log("' . $datum . '")</script>';
		echo '</tbody></table>';
	    echo '<b id="stand" style="font-weight:inherit; color:#999; text-transform:none; font-size:10px;"></b></a><script>var wochentag = new Array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");var monat = new Array("Januar", "Februar", "M&auml;rz", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");var strDateTime = "' . $datum . '";var myDate = new Date(strDateTime);var stunden = myDate.getHours();minuten = ("0"+myDate.getMinutes()).slice(-2);var tag = myDate.getDate();var monatDesJahres = myDate.getMonth();var tagInWoche = myDate.getDay();var datum = "Stand vom " + tag + ". " + monat[monatDesJahres] + " um " + stunden + ":" + minuten + " Uhr";document.getElementById("stand").innerHTML = datum;</script></p>';
      
	  ?>
    </div>
  </div>
  <div class="fixed-action-btn hide-on-med-and-up" style="bottom: 24px; right: 24px;">
  	<a class="btn-floating btn-large orange" href="tipps-zoom.php"><i class="large mdi-navigation-fullscreen center-align"></i></a>
  </div>
  <script>
      $('#loading').hide();
	  jQuery(document).ready(function() {
	 $('.tooltipped').tooltip({delay: 50});
   });
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