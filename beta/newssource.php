<?php
	 	
      $cachefile = "cache/values?alt=json";
      $cachetime = 10 * 60; // 10 minutes
	  
      // Serve from the cache if it is younger than $cachetime
      if (file_exists($cachefile) && (time() - $cachetime
         < filemtime($cachefile))) 
      {
         include($cachefile);
         echo "<!-- Cached ".date('jS F Y H:i', filemtime($cachefile))." 
         --> from cache";
         exit;
      }
      ob_start(); // start the output buffer

 $url = 'https://spreadsheets.google.com/feeds/list/1DfqbxCNBjXuTiCujaSa-Ze4xYDA5VpHQ1LSvFmPFuD0/o5n7ih9/public/values?alt=json';
	  //$file= file_get_contents($url);
	  $ch = curl_init();
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);
	  $file = curl_exec($ch);
	  print($file);
	  
	   // open the cache file for writing
       $fp = fopen($cachefile, 'w'); 
       // save the contents of output buffer to the file
	    fwrite($fp, ob_get_contents());
		// close the file
        fclose($fp); 
		// Send the output to the browser
        ob_end_flush(); 
?>