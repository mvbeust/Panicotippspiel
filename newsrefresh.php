
<?php

      $cachefile = "cache/news.html";
      $cachetime = 0 * 60; // 60 minutes

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

<div id="masonry-grid" class="row">
      <?php
	  $aufgerufen = 0;
	  function fetch_og($link)
	  {
		  //Funktion ruft die og-Werte eine Webseite ab. Wird gebraucht, um Bild für die Cards zu bestimmen
		  //$data = file_get_contents($link);
		  $ch = curl_init();
	  	  curl_setopt($ch, CURLOPT_URL, $link);
		  curl_setopt($ch, CURLOPT_HEADER, true);
	  	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
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
		$title = $row->{'gsx$title'}->{'$t'};
		$autor = $row->{'gsx$author'}->{'$t'};
		$datum = $row->{'gsx$datum'}->{'$t'};
		$text = $row->{'gsx$text'}->{'$t'};
		$link = $row->{'gsx$link'}->{'$t'};
		$seite = $row->{'gsx$seite'}->{'$t'};
		$images = $row->{'gsx$images'}->{'$t'};

		//Überprüft, ob eine gültige URL für ein Bild angegeben worden ist
		if((filter_var($images, FILTER_VALIDATE_URL) == FALSE) and $i < 8){
		  $images = fetch_og($link);
		  $ausgabe .= '<script type="text/javascript"> console.log('.$images .')</script>';
		  $aufgerufen = $aufgerufen + 1;
		};

		if($title != ""){
		//Card wird erstellt
		$ausgabe .= '<div class="col s12 m6"><div class="card">';
		//Prüfung, ob ein Bild vorhanden ist
		if($images == '' or $images == 'Wird geladen...' or $images == '#N/A' or $images == 'Loading...'  or $images == '#Error!'){
		}else{
		  $images = mb_convert_encoding($images,"HTML-ENTITIES","UTF-8");
		  $ausgabe .= '<div class="card-image"  style="max-height: 250px; overflow: hidden"><img src="' . $images . '" ></div>';
		};
		//Card Inhalt wird zusammengetragen

		$ausgabe .= '<div class="card-content"><p style="font-size:larger; font-weight:bold">' . $title	 . '</p><p style="font-size:smaller; font-weight:inherit; color:#999">' . $autor . ' am  <b id="stand' . $i .'" style="font-weight:inherit; color:#999; text-transform:none;"></b></a><script>var wochentag = new Array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");var monat = new Array("Januar", "Februar", "M&auml;rz", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");var strDateTime = "' . $datum . '";var myDate = new Date(strDateTime);var stunden = myDate.getHours();minuten = ("0"+myDate.getMinutes()).slice(-2);var tag = myDate.getDate();var monatDesJahres = myDate.getMonth();var tagInWoche = myDate.getDay();var datum =  tag + ". " + monat[monatDesJahres];document.getElementById("stand'. $i .'").innerHTML = datum;</script> </p></div><div class="card-action"><p style="font-size:14px; font-weight:inherit">' . $text . '</p></div><div class="card-action"> <a href="' . $link . '" target="_blank">Weiterlesen' . $seite . '</a></div></div></div>';
		};
	    $i = $i +1;
		if($i == 8){
			$ausgabe .=  '<div class="col s12 m6"><div class="card" style="height: 631px"> <div class="card-image"><a href="https://twitter.com/panicotippspiel" target="_blank"><img src="twitternews.png" ></a></div><div class="card-content center-align"> <a class="twitter-timeline" data-chrome="noheader noborders noscrollbar nofooter transparent" href="https://twitter.com/panicotippspiel/lists/sportsnews" data-widget-id="589907574532767746">Tweets von https://twitter.com/panicotippspiel/lists/sportsnews</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>  </div></div></div>';
		$i = $i +1;
		};
	  };
	  $ausgabe .= '<script type="text/javascript"> console.log('.$aufgerufen .')</script>';
	  print($ausgabe);
	  ?>
    </div>
<script>
    //masonry start
    var $container = $('#masonry-grid');
    // initialize
$container.imagesLoaded( function() {
    $container.masonry({
      columnWidth: '.col',
      itemSelector: '.col',
    });
});
</script>
<script src="js/masonry.pkgd.min.js"></script>
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
