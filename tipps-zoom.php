<!DOCTYPE html>

<head>
<meta charset="UTF-8">

<title>Zoom - Panicotippspiel</title>

<meta name="description" content="Zoom - Tipps aller Spieler für ausgewählte aktuelle Spiele finden sich hier." />
<?php
include 'metamobile.inc.php';
?>
</head>


<body>
<header>
  <?php
include 'nav.inc.php';
?>
</header>

<main>
    	<?php
      echo '<table class="bordered striped" style="font-size:75%"><tbody>';
	  echo '<tr><th>Spiel</th><th>Franz</th><th>Hans</th><th>Mario</th><th>Max</th><th>Final</th></tr>';
	  // Parsing this spreadsheet: 
	  $url = 'https://spreadsheets.google.com/feeds/list/1_k0XrSfns-WnukwEubctqHUcA1RafVWjAnFhPDiDNOc/o6eizxz/public/values?alt=json';
	  $file= file_get_contents($url);
	  
	  $json = json_decode($file);
	  $rows = $json->{'feed'}->{'entry'};
	  foreach($rows as $row) {
		$spiel = $row->{'gsx$spiel'}->{'$t'};
		$franz = $row->{'gsx$franz'}->{'$t'};
		$hans = $row->{'gsx$hans'}->{'$t'};
		$mario = $row->{'gsx$mario'}->{'$t'};
		$max = $row->{'gsx$max'}->{'$t'};
		$final = $row->{'gsx$final'}->{'$t'};
		
		echo '<tr><td>' . $spiel . '</td><td>' . $franz . '</td><td>' . $hans . '</td><td>' . $mario . '</td><td>' . $max . '</td><td>' . $final . '</td>';
		
	  };
      echo '</tbody></table>';
	  ?>
    </div>
  </div>
  <div class="fixed-action-btn hide-on-med-and-up" style="bottom: 24px; right: 24px;">
  	<a class="btn-floating btn-large orange" href="tipps-anzeigen.php"><i class="large mdi-navigation-fullscreen-exit center-align"></i></a>
  </div>
</main>

<!--Skripte--> 
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> 
<script type="text/javascript">if (!window.jQuery) { document.write('<script src="bin/jquery-2.1.1.min.js"><\/script>'); }</script> 
<script type="text/javascript" src="js/materialize.min.js"></script> 
<script src="js/init.js"></script> 

  <?php
include 'footer.inc.php';
?>
</body>