<?php
	 	
      $cachefile = "cache/statstable.html";
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
       <span class="card-title" style="color:black">Punkte</span>
    	<?php

	  // Parsing this spreadsheet: 
	  $url = 'https://spreadsheets.google.com/feeds/list/1_k0XrSfns-WnukwEubctqHUcA1RafVWjAnFhPDiDNOc/opo6rdb/public/values?alt=json';
	  $file= file_get_contents($url);
	  $i = 0;
	  $grun = ' style="background-color:#C8E6C9;"';
	  $rot = ' style="background-color:#FFCDD2;"';
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
		//Panicotabelle beginnt
		if($erste === "Punkte"){
		   echo '<table class="bordered hoverable"><tbody>';
	       echo '<tr><th></th><th>Franz</th><th>Hans</th><th>Mario</th><th>Max</th></tr>';
  		};
		//Panicotabelle Inhalt
		if($i > 0 && $i < 7){
		   echo '<tr><td><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="' . $sechste . '" style="font-weight: normal; color: rgba(0,0,0,0.87); text-transform: none;">' . $erste . '</a></td><td>' . $zweite . '</td><td>' . $dritte . '</td><td>' . $vierte . '</td><td>' . $funfte . '</td></tr>';
		};
		if($i === 6){
			$uhrzeit = $siebte;
		}
	   if($i === 7){
		   echo '</tbody></table>';
		   echo '<b id="stand" style="font-weight:inherit; color:#999; text-transform:none; font-size:10px;"></b></a><script>var wochentag = new Array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");var monat = new Array("Januar", "Februar", "M&auml;rz", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");var strDateTime = "' . $uhrzeit . '";var myDate = new Date(strDateTime);var stunden = myDate.getHours();minuten = ("0"+myDate.getMinutes()).slice(-2);var tag = myDate.getDate();var monatDesJahres = myDate.getMonth();var tagInWoche = myDate.getDay();var datum = "Stand vom " + tag + ". " + monat[monatDesJahres] + " um " + stunden + ":" + minuten + " Uhr";document.getElementById("stand").innerHTML = datum;</script></p>';
	   };
	   if($erste === "Lander"){
		   echo '</div></div>';
		   echo '<div class="card"><div class="card-content"><span class="card-title" style="color:black">Ligen (Punkte/Spiel)</span>';
	   };
	   if($i === 8){
		   echo '<table class="bordered hoverable"><tbody>';
	       echo '<tr><th>Liga</th><th>Franz</th><th>Hans</th><th>Mario</th><th>Max</th><th class="hide-on-med-and-down">Anteil</th></tr>';    
	   };
	   if($i > 7 && $erste != ""){
		   echo '<tr><td>' . $erste . '</td><td'; 
		   if($zweite === $sechste){echo $grun;}elseif($zweite === $siebte){echo $rot;}else{};
		   echo '>' . $zweite . '</td>';
		   echo '<td'; 
		   if($dritte === $sechste){echo $grun;}elseif($dritte === $siebte){echo $rot;}else{};
		   echo '>' . $dritte . '</td>';
		   echo '<td'; 
		   if($vierte === $sechste){echo $grun;}elseif($vierte === $siebte){echo $rot;}else{};
		   echo '>' . $vierte . '</td>';
		   echo '<td'; 
		   if($funfte === $sechste){echo $grun;}elseif($funfte === $siebte){echo $rot;}else{};
		   echo '>' . $funfte . '</td>';
		   echo '<td class="hide-on-med-and-down">' . $achte . '</td>';
		   echo '</tr>';
	   };
	   //Zählvariable um 1 erhöhen
	   $i = $i + 1;
	  };    
	  ?>
      </tbody></table>
      </div></div>
  <script>
      $('#loading').hide();
	   jQuery(document).ready(function() {
	 $('.tooltipped').tooltip({delay: 50});
	 $("abbr.timeago").timeago();
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