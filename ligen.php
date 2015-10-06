<!DOCTYPE html>

<head>
<meta charset="UTF-8">
<title>Ligen - News - Panicotippspiel</title>

<!--Meta Tags-->
<meta name="description" content="Details zu verschiedenen europäischen Ligen. Tabelle, Spiele und vieles mehr." />
<?php
include 'metamobile.inc.php';
?>
</head>

<body>
<header>
  <?php
include 'navnews.inc.php';
?>
</header>
<main class="container" id="container">
  <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header" style="font-weight: bold; vertical-align:middle"><img src="http://www.nationalflaggen.de/images/flaggen/flagge-deutschland-flagge-rechteckig-50x83.gif" class="circle" style="width:15px; height:15px; vertical-align: top; margin-top: 0.95rem; margin-right: 0.5rem;">Bundesliga DE</div>
      <div class="collapsible-body" style="padding: 20px;  margin: 0; background-color:#F5F5F5"><a href="bundesliga#games">zur Detailansicht</a><div id="bundesliga"></div></div>
    </li>
    <li>
      <div class="collapsible-header" style="font-weight: bold"><img src="http://www.nationalflaggen.de/images/flaggen/flagge-england-flagge-rechteckig-50x83.gif" class="circle" style="width:15px; height:15px; vertical-align: top; margin-top: 0.95rem; margin-right: 0.5rem;">Premier League</div>
      <div class="collapsible-body" style="padding: 20px;  margin: 0; background-color:#F5F5F5"><a href="premierleague#games">zur Detailansicht</a><div id="premierleague"></div></div>
    </li>
    <li>
      <div class="collapsible-header" style="font-weight: bold"><img src="http://www.nationalflaggen.de/images/flaggen/flagge-italien-flagge-rechteckig-50x86.gif" class="circle" style="width:15px; height:15px; vertical-align: top; margin-top: 0.95rem; margin-right: 0.5rem;">Serie A</div>
      <div class="collapsible-body" style="padding: 20px;  margin: 0; background-color:#F5F5F5"><a href="seriea#games">zur Detailansicht</a><div id="seriea"></div></div>
    </li>
    <li>
      <div class="collapsible-header" style="font-weight: bold"><img src="http://www.nationalflaggen.de/images/flaggen/flagge-spanien-flagge-rechteckig-50x72.gif" class="circle" style="width:15px; height:15px; vertical-align: top; margin-top: 0.95rem; margin-right: 0.5rem;">Primera División</div>
      <div class="collapsible-body" style="padding: 20px;  margin: 0; background-color:#F5F5F5"><a href="primeradivision#games">zur Detailansicht</a><div id="primeradivision"></div></div>
    </li>
    <li>
      <div class="collapsible-header" style="font-weight: bold"><img src="http://www.nationalflaggen.de/images/flaggen/flagge-frankreich-flagge-rechteckig-50x75.gif" class="circle" style="width:15px; height:15px; vertical-align: top; margin-top: 0.95rem; margin-right: 0.5rem;">Ligue 1</div>
      <div class="collapsible-body" style="padding: 20px;  margin: 0; background-color:#F5F5F5"><a href="ligue1#games">zur Detailansicht</a><div id="ligue1"></div></div>
    </li>
    <li>
      <div class="collapsible-header" style="font-weight: bold"><img src="http://www.nationalflaggen.de/images/flaggen/flagge-oesterreich-flagge-rechteckig-50x86.gif" class="circle" style="width:15px; height:15px; vertical-align: top; margin-top: 0.95rem; margin-right: 0.5rem;">Bundesliga AT</div>
      <div class="collapsible-body" style="padding: 20px;  margin: 0; background-color:#F5F5F5"><a href="bundesligaat#games">zur Detailansicht</a><div id="bundesligaat"></div></div>
    </li>
  </ul>
<script>
$(document).ready(function() {
    $("#bundesliga").load("bundesligatable.inc.php");
	$("#premierleague").load("premierleaguetable.inc.php");
	$("#seriea").load("serieatable.inc.php");
	$("#primeradivision").load("primeradivisiontable.inc.php");
	$("#ligue1").load("ligue1table.inc.php");
	$("#bundesligaat").load("bundesligaattable.inc.php");
});
</script> 
</main>
<!--Skripte--> 
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> 
<script>if (!window.jQuery) { document.write('<script src="bin/jquery-2.1.1.min.js"><\/script>'); }</script> 
<script type="text/javascript" src="js/materialize.min.js"></script> 
<script src="js/init.js"></script> 

<!-- Footer beginnt hier-->
<?php
include 'footer.inc.php';
?>
</body>
</html>