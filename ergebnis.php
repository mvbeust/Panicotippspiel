<!DOCTYPE html>

<head>
<meta charset="UTF-8">
<title>Ergebnis - Panicotippspiel</title>
<meta name="description" content="Die Ergebniseingabe des Panicotippspiels. Hier kann man Ergebnisse eintragen, sollte das noch nicht durch magische Hand geschehen sein." />
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
<main class="container" id="container">
 <div id="ergebnis">
  <div id="loading" class="animated pulse infinite center-align" style="padding-top:50px">
   <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a>
  </div>
<script>
$(document).ready(function() {
    $("#ergebnis").load("ergebnisinclude.inc.php");
});

</script>
</div>
<div class="fixed-action-btn" style="bottom: 24px; right: 24px;"><div class="hide-on-large-only"><a class="btn-floating btn-large waves-effect waves-light orange" href="f5"><i class="material-icons">refresh</i></a></div></div>
<div class="hide-on-med-and-down"><a class="waves-effect waves-light btn orange" href="f5"><i class="mdi-navigation-refresh right"></i>Refresh</a></div>
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
