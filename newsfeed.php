<?php

      $cachefile = "newsfeed.xml";
      $cachetime = 0 * 60; // 60 minutes

      // Serve from the cache if it is younger than $cachetime
      if (file_exists($cachefile) && (time() - $cachetime
         < filemtime($cachefile)))
      {
         include($cachefile);
         exit;
      }
      ob_start(); // start the output buffer
?>
<?php
header("Content-Type: application/rss+xml; charset=UTF-8");
//Header für den RSS-Feed wird geschaffen
$rssfeed = '<?xml version="1.0" encoding="UTF-8"?>';
$rssfeed .= '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/">';
$rssfeed .= '<channel>';
$rssfeed .= '<title>Panicotippspiel News</title>';
$rssfeed .= '<link>http://www.panicotippspiel.com/news</link>';
$rssfeed .= '<description>News aus der internationalen Welt des Fussballs zusammengetragen aus den verschiedensten Quellen.</description><category>sports</category>';
$rssfeed .= '<image><url>http://www.panicotippspiel.com/logo.png</url><title>Panicotippspiel News</title><link>http://www.panicotippspiel.com/news</link></image>';
$rssfeed .= '<lastBuildDate>' . date('D, d M Y H:i:s T')  . '</lastBuildDate><language>de</language>';
$rssfeed .= '<link rel="self" href="http://www.panicotippspiel.com/feed" type="application/rss+xml" xmlns="http://www.w3.org/2005/Atom" />';
$rssfeed .= '<link rel="hub" href="https://panicomax.superfeedr.com/" xmlns="http://www.w3.org/2005/Atom"/>';

//Abrufen der Daten aus Google Sheets
$url = 'https://spreadsheets.google.com/feeds/list/1DfqbxCNBjXuTiCujaSa-Ze4xYDA5VpHQ1LSvFmPFuD0/o5n7ih9/public/values?alt=json';

	  $ch = curl_init();
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
	  $file = curl_exec($ch);
	  $json = json_decode($file);
	  $rows = $json->{'feed'}->{'entry'};
	  $i = 2;
	  //Jede Zeile wird ausgelesen und in ein Item umgewandelt
	  foreach($rows as $row) {
		  //Variablen werden zugewiesen
		  $title = $row->{'gsx$title'}->{'$t'};
		  $datum = $row->{'gsx$datum'}->{'$t'};
		  $text = $row->{'gsx$text'}->{'$t'};
		  $autor = $row->{'gsx$author'}->{'$t'};
		  $link = $row->{'gsx$link'}->{'$t'};
		  $seite = $row->{'gsx$seite'}->{'$t'};
		  $images = $row->{'gsx$images'}->{'$t'};

		  //Testen, ob das Item in den Feed darf
		  if($title === "" Or substr($title,0,1) === "<" ){
		  }else{
		  $rssfeed .= '<item>';
		  $rssfeed .= '<title>' . $title . '</title>';
		  $rssfeed .= '<description>' . $text;
			//Testen, ob ein Bild eine URL hat, wenn ja, wird ein image im RSS eingefügt
		  if($images == '' or $images == 'Wird geladen...' or $images == '#N/A'){
		}else{
		  $images = mb_convert_encoding($images,"HTML-ENTITIES","UTF-8");
		  $rssfeed .= '<![CDATA[<img src="' . $images . '" />]]>';
		};
		  $rssfeed .= '</description>';
		  $rssfeed .= '<link>' . $link . '</link>';
		  $rssfeed .= '<guid>' . $link . '</guid>';
		  $rssfeed .= '<source url="' . $link . '">' . $seite . '</source>';
		  $rssfeed .= '<pubDate>' . date("D, d M Y H:i:s O", strtotime($datum)) . '</pubDate>';
		  $rssfeed .= '<dc:creator>' . $autor . '</dc:creator>';

		  $rssfeed .= '</item>';
		  };
	  };

//Abschlusstags des RSS-Feeds
$rssfeed .= '</channel>';
$rssfeed .= '</rss>';
echo $rssfeed;

$url = 'http://www.panicotippspiel.com/ping.php';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
$response = curl_exec($ch);

?>
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
