<?php
	 	
      $cachefile = "cache/info.html";
      $cachetime = 5 * 60; // 5 minutes
	  
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
<?php
 $url = 'https://spreadsheets.google.com/feeds/list/1_k0XrSfns-WnukwEubctqHUcA1RafVWjAnFhPDiDNOc/ok5y6gc/public/values?alt=json';
	  $file= file_get_contents($url);
	  $i = 1;
	  $json = json_decode($file);
	  $rows = $json->{'feed'}->{'entry'};
	  foreach($rows as $row) {
		$art = $row->{'gsx$art'}->{'$t'};
		$m1 = $row->{'gsx$m1'}->{'$t'};
		$m2 = $row->{'gsx$m2'}->{'$t'};
		
		if($art == "Kein"){
			echo "<div class='card-content grey' style='padding:5px; font-weight:inherit; color:#FFF; text-transform:none; font-size:smaller; text-align:left'>Keine aktuellen Spiele :-(";
		}else{
			if($i === 1){
			echo "<div class='card-content grey' style='padding:5px; font-weight:inherit; color:#FFF; text-transform:none; font-size:smaller; text-align:left'><b>Aktuelle Spiele:</b>";
			};
			if($i < 9){
			echo "</br>" . $m1 . " vs. " . $m2;
			};
			
		};
		$i = $i+1;
	  };
	  
echo "</div>"
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