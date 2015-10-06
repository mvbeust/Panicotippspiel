<!DOCTYPE html>

<head>
<meta charset="UTF-8">
<title>Bundesliga DE - News - Panicotippspiel</title>

<!--Meta Tags-->
<meta name="description" content="Details zur deutschen Bundesliga. Tabelle, Spiele und vieles mehr." />
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
  <div class="card">
    <div class="card-content"> <span class="card-title" style="color:black">Bundesliga DE</span>
      <div id="loading" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
      <div id="tabelle"></div>
    </div>
  </div>
  <div class="row">
    <ul class="collapsible" data-collapsible="accordion">
      <div id="loading2" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
      <div id="games"></div>
    </ul>
  </div>
<script>
$(document).ready(function() {
    $("#tabelle").load("bundesligatable.inc.php");
	$("#games").load("blgames.inc.php");
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