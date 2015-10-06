<?php
	 	
      $cachefile = "cache/news.html";
      $cachetime = 60 * 60; // 60 minutes
	  
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
<div class="row animated slideInUp">
      <?php 
	  $aufgerufen = 0;
	  function fetch_og($url)
	  {
		  //Funktion ruft die og-Werte eine Webseite ab. Wird gebraucht, um Bild für die Cards zu bestimmen
		  //$data = file_get_contents($url);
		  $ch = curl_init();
	  	  curl_setopt($ch, CURLOPT_URL, $url);
		  curl_setopt($ch, CURLOPT_HEADER, true);
	  	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);
	  	  $data = curl_exec($ch);
		  $dom = new DomDocument;
		  @$dom->loadHTML($data);
		   
		  $xpath = new DOMXPath($dom);
		  # query metatags with og prefix
		  $metas = $xpath->query('//*/meta[starts-with(@property, \'og:\')]');
	  
		  $og = array();
	  
		  foreach($metas as $meta){
			  # get property name without og: prefix
			  $property = str_replace('og:', '', $meta->getAttribute('property'));
			  # get content
			  $content = $meta->getAttribute('content');
			  $og[$property] = $content;
		  }
	  	  
		  return $og['image'];
	  };
	  
	  // Parsing this spreadsheet: 
	  $url = 'https://spreadsheets.google.com/feeds/list/1DfqbxCNBjXuTiCujaSa-Ze4xYDA5VpHQ1LSvFmPFuD0/o5n7ih9/public/values?alt=json';
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

		//Überprüft, ob eine gültige URL für ein Bild angegeben worden ist
		if((filter_var($images, FILTER_VALIDATE_URL) === FALSE) and $i < 8){
		  $images = fetch_og($link);
		  $aufgerufen = $aufgerufen + 1;
		};
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
		if($i == 8){
			$ausgabe .=  '<div class="row"><div class="col s12 m6"><div class="card"> <div class="card-image"><img src="twitternews.png" ></div><div class="card-content center-align"> <a class="twitter-timeline" data-chrome="noheader noborders noscrollbar nofooter transparent" href="https://twitter.com/panicotippspiel/lists/sportsnews" data-widget-id="589907574532767746">Tweets von https://twitter.com/panicotippspiel/lists/sportsnews</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>  </div></div> </div>';
		$i = $i +1;
		};
	  };
	  $ausgabe .= '<script type="text/javascript"> console.log('.$aufgerufen .')</script>';
	  print($ausgabe);
	  ?>
      <script>
      $('#loading').hide();
	  </script>
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