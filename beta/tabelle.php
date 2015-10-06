<!DOCTYPE html>

<head>
<meta charset="UTF-8">

<title>Tabelle - Panicotippspiel</title>

<meta name="description" content="Der aktuelle Tabellenstand des Panicotippspiels findet sich hier." />
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
    <div id="loading" class="animated pulse infinite center-align" style="padding-top:50px">
   <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a>
  </div>
<script>
$(document).ready(function() {
    $("#container").load("tabelleinclude.inc.php");
});

</script>
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