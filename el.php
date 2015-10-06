<!DOCTYPE html>

<head>
<meta charset="UTF-8">
<title>Europa League - News - Panicotippspiel</title>

<!--Meta Tags-->
<meta name="description" content="Details zur Europa League. Tabelle, Spiele und vieles mehr." />
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
  <div class="row"> 
    <!--Table-->
    <div class="card">
      <div class="card-content">
        <p style="font-weight:500; font-style:normal; color:#3f51b5; font-size: 24px;">EL Tabellen</p>
      </div>
    </div>
  </div>
  <div class="row">
    <ul class="collapsible" data-collapsible="accordion">
      <div id="loading" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
      <div id="tabelle"></div>
    </ul>
  </div>
  <div class="row"> 
    <!--Games-->
    <div class="card">
      <div class="card-content">
        <p style="font-weight:500; font-style:normal; color:#3f51b5; font-size: 24px;">EL Spielplan</p>
      </div>
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
    $("#tabelle").load("eltable.inc.php");
	$("#games").load("elgames.inc.php");
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