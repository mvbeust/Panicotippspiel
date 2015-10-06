<!DOCTYPE html>

<head>
<meta charset="UTF-8">
<title>F5 - Panicotippspiel</title>
<meta name="description" content="Refresh für alle möglichen Bestandteile des News Bereichs" />
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
  <div class="row"> 
    <!--Banner-->
    <div class="col s12 m12">
      <div class="card animated fadeInDown">
        <div class="card-content">
          <p>Ligen wurden upgedated</p>
        </div>
      </div>
    </div>
  </div>
    <?php
include 'f5collection.inc.php';
?>
  <div class="card">
    <div class="card-content"> <span class="card-title" style="color:black">Bundesliga DE</span>
      <div id="loading" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
      <div id="tabelleBL"></div>
    </div>
  </div>
  <div class="row">
    <ul class="collapsible" data-collapsible="accordion">
      <div id="loading2" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
      <div id="gamesBL"></div>
    </ul>
  </div>
  <script>
$(document).ready(function() {
    $("#tabelleBL").load("bundesligarefresh.php");
	$("#gamesBL").load("blgamesrefresh.php");
});
</script>
 <div class="card">
    <div class="card-content"> <span class="card-title" style="color:black">Bundesliga AT</span>
      <div id="loading" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
      <div id="tabelleAT"></div>
    </div>
  </div>
  <div class="row">
    <ul class="collapsible" data-collapsible="accordion">
      <div id="loading2" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
      <div id="gamesAT"></div>
    </ul>
  </div>
  <script>
$(document).ready(function() {
    $("#tabelleAT").load("bundesligaatrefresh.php");
	$("#gamesAT").load("blatgamesrefresh.php");
});
</script>
 <div class="card">
    <div class="card-content"> <span class="card-title" style="color:black">Ligue 1</span>
      <div id="loading" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
      <div id="tabelleL1"></div>
    </div>
  </div>
  <div class="row">
    <ul class="collapsible" data-collapsible="accordion">
      <div id="loading2" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
      <div id="gamesL1"></div>
    </ul>
  </div>
  <script>
$(document).ready(function() {
    $("#tabelleL1").load("ligue1refresh.php");
	$("#gamesL1").load("l1refesh.php");
});
</script>
 <div class="card">
    <div class="card-content"> <span class="card-title" style="color:black">Primera Division</span>
      <div id="loading" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
      <div id="tabellePD"></div>
    </div>
  </div>
  <div class="row">
    <ul class="collapsible" data-collapsible="accordion">
      <div id="loading2" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
      <div id="gamesPD"></div>
    </ul>
  </div>
  <script>
$(document).ready(function() {
    $("#tabellePD").load("primeradivisionrefresh.php");
	$("#gamesPD").load("pdgamesrefresh.php");
});
</script>
 <div class="card">
    <div class="card-content"> <span class="card-title" style="color:black">Premier League</span>
      <div id="loading" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
      <div id="tabellePL"></div>
    </div>
  </div>
  <div class="row">
    <ul class="collapsible" data-collapsible="accordion">
      <div id="loading2" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
      <div id="gamesPL"></div>
    </ul>
  </div>
  <script>
$(document).ready(function() {
    $("#tabellePL").load("premierleaguerefresh.php");
	$("#gamesPL").load("plgamesrefresh.php");
});
</script>
 <div class="card">
    <div class="card-content"> <span class="card-title" style="color:black">Serie A</span>
      <div id="loading" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
      <div id="tabelleSA"></div>
    </div>
  </div>
  <div class="row">
    <ul class="collapsible" data-collapsible="accordion">
      <div id="loading2" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
      <div id="gamesSA"></div>
    </ul>
  </div>
  <script>
$(document).ready(function() {
    $("#tabelleSA").load("seriearefresh.php");
	$("#gamesSA").load("sagamesrefresh.php");
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
