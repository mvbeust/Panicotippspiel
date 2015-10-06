<ul class="collapsible" data-collapsible="accordion">
<li>
  <div class="collapsible-header active" style="height:47px">Spielplan Gruppe A</div>
  <div class="collapsible-body">
  <?php
      echo '<table class="bordered striped"><tbody>';
	  
	  // Parsing this spreadsheet: 
	  $url = 'https://spreadsheets.google.com/feeds/list/1Bp5zqq3Hd4RgJd2lVlXgaqG4AjfVJLa4jgYfNmJVuDA/2/public/values?alt=json';
	  $file= file_get_contents($url);
	  
	  $json = json_decode($file);
	  $rows = $json->{'feed'}->{'entry'};
	  $i = 0;
	  foreach($rows as $row) {
		$datum = $row->{'gsx$datum'}->{'$t'};
		$uhrzeit = $row->{'gsx$uhrzeit'}->{'$t'};
		$M1 = $row->{'gsx$m1'}->{'$t'};
		$ergebnis = $row->{'gsx$ergebnis'}->{'$t'};
		$M2 = $row->{'gsx$m2'}->{'$t'};
		if($i < 15){
		echo '<tr height="47px"><td class="grey-text" height="47px" style="padding-top:0px; padding-bottom:0px">' . $datum . '</td><td  class="grey-text hide-on-med-and-down" height="47px" style="padding-top:0px; padding-bottom:0px">' . $uhrzeit . '</td><td height="47px" style="padding-top:0px; padding-bottom:0px">' . $M1 . '</td><td height="47px" style="padding-top:0px; padding-bottom:0px" align="center"><b>' . $ergebnis . '</b></td><td height="47px" style="padding-top:0px; padding-bottom:0px">' . $M2 . '</td>';
		};
		$i = $i + 1;
		if($i === 6){
			echo '</tbody></table></div></li>';
			echo '<li><div class="collapsible-header" style="height:47px">Spielplan Gruppe B</div><div class="collapsible-body"><table class="bordered striped"><tbody>';
		};
		if($i === 12){
			echo '</tbody></table></div></li>';
			echo '<li><div class="collapsible-header" style="height:47px">Spielplan Halbfinale</div><div class="collapsible-body"><table class="bordered striped"><tbody>';
		};
		if($i === 14){
			echo '</tbody></table></div></li>';
			echo '<li><div class="collapsible-header" style="height:47px">Finale</div><div class="collapsible-body"><table class="bordered striped"><tbody>';
		};
		if($i === 15){
			echo '</tbody></table></div></li></ul>';
			echo '<ul class="collapsible" data-collapsible="accordion"><li><div class="collapsible-header" style="height:47px">Tabelle Gruppe A</div><div class="collapsible-body">';
			echo '<table class="bordered striped"><tbody>';
			echo '<tr height="47px"><td height="47px" style="padding-top:0px; padding-bottom:0px">Platz</td><td height="47px" style="padding-top:0px; padding-bottom:0px">Land</td><td height="47px" style="padding-top:0px; padding-bottom:0px" class="hide-on-small-only grey-text">S:U:N</td><td height="47px" style="padding-top:0px; padding-bottom:0px" class="grey-text hide-on-med-and-down">Diff.</td><td height="47px" style="padding-top:0px; padding-bottom:0px">Punkte</td>';
		};
		if($i > 15 & $i < 20){
			echo '<tr height="47px"><td height="47px" style="padding-top:0px; padding-bottom:0px">' .  $datum .'</td><td height="47px" style="padding-top:0px; padding-bottom:0px">' . $uhrzeit . '</td><td height="47px" style="padding-top:0px; padding-bottom:0px" class="hide-on-small-only grey-text">' . $M1 . '</td><td height="47px" style="padding-top:0px; padding-bottom:0px" class="grey-text hide-on-med-and-down">' . $ergebnis . '</td><td height="47px" style="padding-top:0px; padding-bottom:0px">' . $M2 . '</td>';
		};
		if($i === 20){
			echo '</tbody></table>';
			echo '<li><div class="collapsible-header" style="height:47px">Tabelle Gruppe B</div><div class="collapsible-body">';
			echo '<table class="bordered striped"><tbody>';
			echo '<tr height="47px"><td height="47px" style="padding-top:0px; padding-bottom:0px">Platz</td><td height="47px" style="padding-top:0px; padding-bottom:0px">Land</td><td height="47px" style="padding-top:0px; padding-bottom:0px" class="hide-on-small-only grey-text">S:U:N</td><td height="47px" style="padding-top:0px; padding-bottom:0px" class="grey-text hide-on-med-and-down">Diff.</td><td height="47px" style="padding-top:0px; padding-bottom:0px">Punkte</td>';
		};
		if($i > 19 & $i < 24){
			echo '<tr height="47px"><td height="47px" style="padding-top:0px; padding-bottom:0px">' .  $datum .'</td><td height="47px" style="padding-top:0px; padding-bottom:0px">' . $uhrzeit . '</td><td height="47px" style="padding-top:0px; padding-bottom:0px" class="hide-on-small-only grey-text">' . $M1 . '</td><td height="47px" style="padding-top:0px; padding-bottom:0px" class="grey-text hide-on-med-and-down">' . $ergebnis . '</td><td height="47px" style="padding-top:0px; padding-bottom:0px">' . $M2 . '</td>';	
		};
		if($i === 23){
			echo '</tbody></table>';
		};
	  };
      
	  ?>
</div>
</li>
</ul>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> 
<script>if (!window.jQuery) { document.write('<script src="bin/jquery-2.1.1.min.js"><\/script>'); }</script> 
<script type="text/javascript" src="js/materialize.min.js"></script> 
<script src="js/init.js"></script> 