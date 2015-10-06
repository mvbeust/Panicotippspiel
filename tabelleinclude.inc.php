<?php
	 	
      $cachefile = "cache/tabelle.html";
      $cachetime = 720 * 60; // 5 minutes
	  
      // Serve from the cache if it is younger than $cachetime
      if (file_exists($cachefile) && (time() - $cachetime
         < filemtime($cachefile))) 
      {
         include($cachefile);
         echo "<!-- Cached ".date('jS F Y H:i', filemtime($cachefile))." -->";
         exit;
      }
      ob_start(); // start the output buffer
?>
<div class="card">
    <div class="card-content">
       <span class="card-title" style="color:black">Panicotabelle</span>
    	<?php

	  // Parsing this spreadsheet: 
	  $url = 'https://spreadsheets.google.com/feeds/list/1_k0XrSfns-WnukwEubctqHUcA1RafVWjAnFhPDiDNOc/oofr89u/public/values?alt=json';
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
		//Panicotabelle beginnt
		if($i === 0){
		  echo '<table class="bordered hoverable"><tbody>';
	  echo '<tr><th>Platz</th><th>Name</th><th>Panico</th><th class="grey-text">1.<small class="hide-on-small-only">Plätze</small><small class="hide-on-med-and-up">P</small></th><th class="grey-text">2.<small class="hide-on-small-only">Plätze</small><small class="hide-on-med-and-up">P</small></th><th class="grey-text hide-on-med-and-down">Punkte</th></tr>';
  		};
		//Panicotabelle Inhalt
		if($i < 4){
		echo '<tr><td>' . $erste . '</td><td>' . $zweite . '</td><td><b>' . $dritte . '</b></td><td class="grey-text">' . $vierte . '</td><td class="grey-text">' . $funfte . '</td><td class="grey-text  hide-on-med-and-down">' . $sechste . '</td>';
		};
		//Panicotabelle Ende
	   if($i === 3){
		   echo '</tbody></table>';
	   };
	   if($i === 4){
		   $anzahl = $erste;
		   echo '<b id="stand" style="font-weight:inherit; color:#999; text-transform:none; font-size:10px;"></b></a><script>var wochentag = new Array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");var monat = new Array("Januar", "Februar", "M&auml;rz", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");var strDateTime = "' . $zweite . '";var myDate = new Date(strDateTime);var stunden = myDate.getHours();minuten = ("0"+myDate.getMinutes()).slice(-2);var tag = myDate.getDate();var monatDesJahres = myDate.getMonth();var tagInWoche = myDate.getDay();var datum = "Stand vom " + tag + ". " + monat[monatDesJahres] + " um " + stunden + ":" + minuten + " Uhr";document.getElementById("stand").innerHTML = datum;</script></p>';
	   };
	   if($anzahl > 0){
	   if($i === 4){
		   echo '</div></div>';
		   echo'<ul class="collapsible" data-collapsible="expandable" style="background-color:#eeeeee">';
	   };
	   if($i === 5){
		   echo '<li><div class="collapsible-header active" style="font-weight: bold"><i class="material-icons">today</i>' . $erste . '</div>';
		   echo '<div class="collapsible-body" style="padding: 20px;  margin: 0; style="background-color:#F5F5F5">';
		   echo '<table class="bordered hoverable"><tbody>';
	       echo '<tr><th>Platz</th><th>Name</th><th>Punkte</th><th class="grey-text hide-on-small-only">1<small>Tag</small></th><th class="grey-text">2<small class="hide-on-small-only">Tage</small><small class="hide-on-med-and-up">d</small></th><th class="grey-text hide-on-med-and-down">7<small class="hide-on-small-only">Tage</small><small class="hide-on-med-and-up">d</small></th></tr>';
		    };
	   if($i > 4 && $i < 9){
		   echo '<tr><td>' . $zweite . '</td><td>' . $dritte . '</td><td><b>' . $vierte . '</b></td><td class="grey-text hide-on-small-only">' . $funfte . '</td><td class="grey-text">' . $sechste . '</td><td class="grey-text  hide-on-med-and-down">' . $siebte . '</td>';
	   };
	   if($i === 8){
		   echo '</tbody></table>';
		   echo '</div></li>';
		   };
	   //Ende 1. Monat
	   if($i === 9){
		   echo '<li><div class="collapsible-header" style="font-weight: bold"><i class="material-icons">history</i>'. $erste . '</div>';
		   echo '<div class="collapsible-body" style="padding: 20px;  margin: 0; style="background-color:#F5F5F5">';
		   echo '<table class="bordered hoverable"><tbody>';
	       echo '<tr><th>Platz</th><th>Name</th><th>Punkte</th></tr>';
		    };
	   if($i > 8 && $i < 13){
		   echo '<tr><td>' . $zweite . '</td><td>' . $dritte . '</td><td><b>' . $vierte . '</b></td>';
	   };
	   if($i === 12){
		   echo '</tbody></table>';
		   echo '</div></li>';
		   if($anzahl > 1){
			   $i = 8;
		   };   
	   };
    
	   };
	   //Zählvariable um 1 erhöhen
	   $i = $i + 1;
	  };
	  
      
	  ?>
      </ul>
  <script>
      $('#loading').hide();
	  	$('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
	 jQuery(document).ready(function() {
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