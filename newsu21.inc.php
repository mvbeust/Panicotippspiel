<?php
	 	
      $cachefile = "cache/newsu21.html";
      $cachetime = 0 * 60; // 120 minutes
	  
      // Serve from the cache if it is younger than $cachetime
      if (file_exists($cachefile) && (time() - $cachetime
         < filemtime($cachefile))) 
      {
         include($cachefile);
         echo "<!-- Cached ".date('jS F Y H:i', filemtime($cachefile))."-->";
         exit;
      }
      ob_start(); // start the output buffer
?>
<div class="row">
      <?php 
	  $aufgerufen = 0;
	  
	  // Parsing this spreadsheet: 
	  $url = 'https://spreadsheets.google.com/feeds/list/1Bp5zqq3Hd4RgJd2lVlXgaqG4AjfVJLa4jgYfNmJVuDA/4/public/values?alt=json';
	  //$file= file_get_contents($url);
	  $ch = curl_init();
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);
	  $file = curl_exec($ch);
	  $json = json_decode($file);
	  $rows = $json->{'feed'}->{'entry'};
	  $i = 2;
	  //Jede Zeile wird ausgelesen und in eine Card umgewandelt
	  foreach($rows as $row) {
		$images = $row->{'gsx$images'}->{'$t'};
		$title = $row->{'gsx$title'}->{'$t'};
		$autor = $row->{'gsx$author'}->{'$t'};
		$datum = $row->{'gsx$datum'}->{'$t'};
		$text = $row->{'gsx$text'}->{'$t'};
		$link = $row->{'gsx$link'}->{'$t'};
		$seite = $row->{'gsx$seite'}->{'$t'};

		//Erstelle für alle zwei Cards eine neue Reihe
		if($i % 2 == 0){
		  $ausgabe .= '<div class="row">';
		};
		//Card wird erstellt
		$ausgabe .= '<div class="col s12 m6"><div class="card">';
		//Prüfung, ob ein Bild vorhanden ist
		if($images == '' or $images == 'Wird geladen...' or $images == '#N/A'){
		}else{	
		  $images = mb_convert_encoding($images,"HTML-ENTITIES","UTF-8");
		  $ausgabe .= '<div class="card-image"  style="max-height: 250px; overflow: hidden"><img src="' . $images . '" ></div>';
		};
		//Card Inhalt wird zusammengetragen
		$ausgabe .= '<div class="card-content"><p style="font-size:larger; font-weight:bold">' . $title	 . '</p><p style="font-size:smaller; font-weight:inherit; color:#999">' . $autor . ' am ' . $datum . '</p></div><div class="card-action"><p style="font-size:14px; font-weight:inherit">' . $text . '</p></div><div class="card-action"> <a href="' . $link . '" target="_blank">Weiterlesen' . $seite . '</a></div></div></div>';
	    //Abschluss einer neuen Zeile für alle zwei Cards
	    if(($i+3) % 2 == 0){
		  $ausgabe .= '</div>';
	    };
	    $i = $i +1;
	  };
	  $ausgabe .= '<script type="text/javascript"> console.log('.$aufgerufen .')</script>';
	  print($ausgabe);
	  ?>
    </div>
    

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