<?php
	 	
      $cachefile = "cache/tipps.html";
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

<div id="masonry-grid" class="row">
<?php
	 function diff($date1, $date2) {
        $diff = abs(strtotime($date2) - strtotime($date1));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
        return $days;
	 };
	  // Parsing this spreadsheet: 
	  $url = 'https://spreadsheets.google.com/feeds/list/1_k0XrSfns-WnukwEubctqHUcA1RafVWjAnFhPDiDNOc/o6eizxz/public/values?alt=json';
	  $file= file_get_contents($url);
	  $i = 0;
	  $upcoming = 0;
	  $today = 0;
	  $past = 0;
	  $stern = '<i class="material-icons" style="color: #3f51b5; font-size: 11px">cake</i>';
	  $json = json_decode($file);
	  $rows = $json->{'feed'}->{'entry'};
	  foreach($rows as $row) {
		$franzstern = "";
		$hansstern = "";
		$mariostern = "";
		$maxstern = "";  
		$spiel = $row->{'gsx$spiel'}->{'$t'};
		$franz = $row->{'gsx$franz'}->{'$t'};
		$hans = $row->{'gsx$hans'}->{'$t'};
		$mario = $row->{'gsx$mario'}->{'$t'};
		$max = $row->{'gsx$max'}->{'$t'};
		$final = $row->{'gsx$final'}->{'$t'};
		$hover = $row->{'gsx$hover'}->{'$t'};
		$datum = $row->{'gsx$datum'}->{'$t'};
		//Wenn es ein Ergebnis gibt, dann werden Punkte abgerufen
		if($final == "?"){
		}else{
		$punktefranz = $row->{'gsx$punktefranz'}->{'$t'};
		$punktehans = $row->{'gsx$punktehans'}->{'$t'};
		$punktemario = $row->{'gsx$punktemario'}->{'$t'};
		$punktemax = $row->{'gsx$punktemax'}->{'$t'};
		if($final == $franz){
			$franzstern = $stern;
		};
		if($final == $hans){
			$hansstern = $stern;
		};
		if($final == $mario){
			$mariostern = $stern;
		};
		if($final == $max){
			$maxstern = $stern;
		};
					 
		};
		
		//START Datumsunterschied zu heute wird berechnet
		    $d1 = date('Y-m-d', strtotime($datum));
            $d2 = date("Y-m-d");
            $diffdays = diff($d1, $d2);
		//END Datumsunterschied
		
		if($diffdays == 0){
			//Spiele am gleichen Tag
			if($today == 0){
			 echo '<div class="col s12 m12" id="heute"><div class="card"><div class="card-content"> <span class="card-title" style="color:black">Heute</span></div></div></div>';
			 $today =+ 1;
			};
			 echo '<div class="col s12 m6 niemals"><div class="card"><div class="card-content"><p style="font-size:larger; font-weight:bold">' . $spiel . '</p><p style="font-size:smaller; font-weight:inherit; color:#999"><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="' . $hover . '"><b id="anpfiff' . $i . '" style="font-weight:inherit; color:#999; text-transform:none"></b></a><script>var wochentag = new Array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");var monat = new Array("Januar", "Februar", "M&auml;rz", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");var strDateTime = "' . $datum . '";var myDate = new Date(strDateTime);var stunden = myDate.getHours();minuten = ("0"+myDate.getMinutes()).slice(-2);var tag = myDate.getDate();var monatDesJahres = myDate.getMonth();var tagInWoche = myDate.getDay();var datum = "Spiel um " + stunden + ":" + minuten + " Uhr";document.getElementById("anpfiff' . $i . '").innerHTML = datum;</script></p>';
			 if($final == "?"){
				 $ergebnis = "";
				 $final = "";
			 }else{
			     $ergebnis = "Ergebnis";
			 };
			 //Table Head
			 echo '<table><thead></th><th>' .  $ergebnis . '</th><th>Franz</th><th>Hans</th><th>Mario</th><th>Max</th></tr></thead>';
			 //Table Line 1
			 echo '<tbody><tr><td>' .  $final . '</td><td>' . $franz . '</td><td>' . $hans . '</td><td>' . $mario . '</td><td>' . $max . '</td></tr>';
			 //Table Line 2
			 if($final != ""){
			 echo '<tr><td></td><td>'. $franzstern . $punktefranz . '</td><td>' . $hansstern . $punktehans . '</td><td>' . $mariostern . $punktemario . '</td><td>' . $maxstern . $punktemax . '</td></tr>';
			 };
			 //Table Ende
			 echo '</tbody></table>';
			 echo '</div></div></div>';
			 
			 
			 
			 
		}elseif($final != "?"){
			//Spiele Vergangenheit
			if($past == 0){
			 echo '<div class="col s12 m12"><div class="card col s12 m12"><div class="card-content"> <span class="card-title" style="color:black">Vergangen</span></div></div></div>';
			 $past =+ 1;
			};
			echo '<div class="col s12 m6 niemals"><div class="card" style="background-color:#F6F6FF"><div class="card-content"><p style="font-size:larger; font-weight:bold">' . $spiel . '</p><p style="font-size:smaller; font-weight:inherit; color:#999"><b style="font-weight:inherit; color:#999; text-transform:none">' . $hover .'</b></p>';
			 if($final == "?"){
				 $ergebnis = "";
				 $final = "";
			 }else{
			     $ergebnis = "Ergebnis";
			 };
			 //Table Head
			 echo '<table><thead><tr><th>' .  $ergebnis . '</th><th>Franz</th><th>Hans</th><th>Mario</th><th>Max</th></tr></thead>';
			 //Table Line 1
			 echo '<tbody><tr><td>' .  $final . '</td><td>' . $franz . '</td><td>' . $hans . '</td><td>' . $mario . '</td><td>' . $max . '</td></tr>';
			 //Table Line 2
			 if($final != ""){
			 echo '<tr><td></td><td>'. $franzstern . $punktefranz . '</td><td>' . $hansstern . $punktehans . '</td><td>' . $mariostern . $punktemario . '</td><td>' . $maxstern . $punktemax . '</td></tr>';
			 };
			 //Table Ende
			 echo '</tbody></table>';
			 echo '</div></div></div>';
			 
			 
			 
			 
			 
		}else{
			//Spiele in der Zukunft
			if($upcoming == 0){
			 echo '<div class="col s12 m12"><div class="card"><div class="card-content"> <span class="card-title" style="color:black">Upcoming</span></div></div></div>';
			 $upcoming =+ 1;
			};
			 echo '<div class="col s12 m6 niemals"><div class="card"><div class="card-content"><p style="font-size:larger; font-weight:bold">' . $spiel . '</p><p style="font-size:smaller; font-weight:inherit; color:#999"><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="' . $hover . '"><b id="anpfiff' . $i . '" style="font-weight:inherit; color:#999; text-transform:none"></b></a><script>var wochentag = new Array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");var monat = new Array("Januar", "Februar", "M&auml;rz", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");var strDateTime = "' . $datum . '";var myDate = new Date(strDateTime);var stunden = myDate.getHours();minuten = ("0"+myDate.getMinutes()).slice(-2);var tag = myDate.getDate();var monatDesJahres = myDate.getMonth();var tagInWoche = myDate.getDay();var datum =  "Spiel am " + wochentag[tagInWoche] + ", den " + tag + ". " + monat[monatDesJahres] + " um " + stunden + ":" + minuten + " Uhr";document.getElementById("anpfiff' . $i . '").innerHTML = datum;</script></p>';
			 if($final == "?"){
				 $ergebnis = "";
				 $final = "";
			 }else{
			     $ergebnis = "Ergebnis";
			 };
			 //Table Head
			 echo '<table><thead></th><th>' .  $ergebnis . '</th><th>Franz</th><th>Hans</th><th>Mario</th><th>Max</th></tr></thead>';
			 //Table Line 1
			 echo '<tbody><tr><td>' .  $final . '</td><td>' . $franz . '</td><td>' . $hans . '</td><td>' . $mario . '</td><td>' . $max . '</td></tr>';
			 //Table Line 2
			 if($final != ""){
			 echo '<tr><td></td><td>'. $franzstern . $punktefranz . '</td><td>' . $hansstern . $punktehans . '</td><td>' . $mariostern . $punktemario . '</td><td>' . $maxstern . $punktemax . '</td></tr>';
			 };
			 //Table Ende
			 echo '</tbody></table>';
			 echo '</div></div></div>';
		};
		$i = $i+1;
	  };
?>
<div class="fixed-action-btn hide-on-med-and-up" style="bottom: 24px; right: 24px;"> <a class="btn-floating btn-large orange" href="tipps-zoom.php"><i class="material-icons">view_module</i></a> </div>
<script type="text/javascript" src="/js/materialize.min.js"></script> 
<script src="/js/init.js"></script> 
<!--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> --> 
<script src="/js/jquery.timeago.js" type="text/javascript"></script> 
<script src="/js/masonry.pkgd.min.js"></script> 
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
