<?php
	 	
      $cachefile = "natgeo.xml";
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
$rssfeed .= '<title>Natgeo Image for every day</title>';
$rssfeed .= '<link>http://www.panicotippspiel.com/natgeo.xml</link>';
$rssfeed .= '<description>Natgeo Image for every day</description>';
$rssfeed .= '<image><url>http://www.panicotippspiel.com/logo.png</url><title>NatGeo</title><link>http://www.panicotippspiel.com/natgeo.xml</link></image>';
$rssfeed .= '<lastBuildDate>' . date('D, d M Y H:i:s T')  . '</lastBuildDate><language>de</language>';
$rssfeed .= '<atom:link href="http://www.panicotippspiel.com/natgeo.xml" rel="self" type="application/rss+xml" />';
$rssfeed .= '<atom:link rel="hub" href="https://pubsubhubbub.superfeedr.com/" xmlns="http://www.w3.org/2005/Atom"/>';


          $url = "http://travel.nationalgeographic.com/photo-contest-2015/gallery/week-1-all/2";
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
	  	  
		  $bild = $og['image'];
		  		  
			  
		  //Variablen werden zugewiesen
		  $title = 'Picture';
		  $datum = date("D, d M Y H:i:s O", strtotime(time));
		  $autor = 'National Geographic';
		  $link = $bild;
		  $seite = 'National Geographic';
		  $images = $bild;
		  
		  $rssfeed .= '<item>';
		  $rssfeed .= '<title>' . $title . '</title>';
		  $rssfeed .= '<description>' . $text;
		  if($images == '' or $images == 'Wird geladen...' or $images == '#N/A'){
		}else{	
		  //$images = mb_convert_encoding($images,"HTML-ENTITIES","UTF-8");
		  $rssfeed .= '<![CDATA[<img src="' . $images . '" />]]>';
		};	
		  $rssfeed .= '</description>';
		  $rssfeed .= '<link>' . $link . '</link>';
		  $rssfeed .= '<guid>' . $datum . '</guid>';
		  $rssfeed .= '<source url="' . $link . '">' . $seite . '</source>';
		  $rssfeed .= '<pubDate>' . date("D, d M Y H:i:s O", strtotime($datum)) . '</pubDate>';
		  $rssfeed .= '<dc:creator>' . $autor . '</dc:creator>';
		    
		  $rssfeed .= '</item>'; 

//Abschlusstags des RSS-Feeds
$rssfeed .= '</channel>';
$rssfeed .= '</rss>';
echo $rssfeed;
$url = 'http://www.panicotippspiel.com/natping.php';
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);
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
