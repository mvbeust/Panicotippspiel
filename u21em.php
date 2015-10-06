<!DOCTYPE html>

<head>
<meta charset="UTF-8">
<title>U21 EM - News - Panicotippspiel</title>

<!--Meta Tags-->
<meta name="description" content="Ein Panicotippspiel Spezial zur U21 Europameisterschaft 2015." />
<?php
include 'metamobile.inc.php';
?>
</head>

<body>
<header> 
  <!--Navigation-->
  
  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="tabelle">Tabelle anzeigen</a></li>
    <li><a href="tipps">Tipps anzeigen</a></li>
  </ul>
  <div class="navbar-fixed">
    <nav class="white" style="overflow:visible">
      <div class="nav-wrapper">
        <div class="container"> <a href="news" class="brand-logo"  style="font-weight:300; top:0px; color:#3f51b5">Panico<i class="hide-on-small-only" style="font-style:normal; color:#3f51b5">tippspiel </i><i class="animated flipInX" style="font-weight:500; font-style:normal; color:#3f51b5">U21</i></a> </div>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"  style="color:#3f51b5"></i></a>
        <div class="container">
          <ul class="right hide-on-med-and-down">
            <li  class="waves-effect waves-indigo"><a href="/" style="color:#3f51b5">Tippspiel</a></li>
            <li class="waves-effect waves-indigo"><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="dropdown1"  style="color:#3f51b5">Tabelle und Tipps<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
            <li class="waves-effect waves-indigo" style="height:64px"><a href="stats"  style="color:#3f51b5"><i class="mdi-editor-insert-chart"></i></a></li>
            <li class="waves-effect waves-indigo" style="height:64px"><a href="new"  style="color:#3f51b5"><i class="mdi-content-add-circle-outline"></i></a></li>
            <li class="waves-effect waves-indigo" style="height:64px"><a href="javascript:history.go(0)"  style="color:#3f51b5"><i class="mdi-navigation-refresh"></i></a></li>
          </ul>
        </div>
        <ul class="side-nav" id="mobile-demo" style="overflow-y:auto">
          <li class="bold" style="border-bottom:solid; border-bottom-color:#D0D0D0; border-bottom-width:1px; background: #D0D0D0"><a href="javascript:history.go(0)" style="padding-left:75px; padding-top:24px"><img height="50px" src="logo.png" /></a></li>
          <div class="waves-effect"><a href="/" style="padding:0px">
            <li style="font-weight: bold; width:240px; padding-left:30px">Tippspiel</li>
            </a></div>
          <div class="waves-effect"><a href="tabelle" style="padding:0px">
            <li style="font-weight: bold; width:240px; padding-left:30px">Tabelle anzeigen</li>
            </a></div>
          <div class="waves-effect"><a href="tipps" style="padding:0px">
            <li style="font-weight: bold; width:240px; padding-left:30px">Tipps anzeigen</li>
            </a></div>
          <div class="waves-effect"><a href="news" style="padding:0px">
            <li style="font-weight: bold; width:240px; padding-left:30px">News</li>
            </a></div>
          <div class="waves-effect"><a href="stats" style="padding:0px">
            <li style="font-weight: bold; border-bottom:solid; border-bottom-color:#D0D0D0; border-bottom-width:1px; width:240px; padding-left:30px">Statistiken</li>
            </a></div>
          <div class="waves-effect"><a style="color:#D0D0D0; padding:0px" href="faq">
            <li style="font-weight: bold; width:240px; padding-left:30px">FAQ</li>
            </a></div>
          <div class="waves-effect"><a style="color:#D0D0D0; padding:0px" href="ergebnis">
            <li style="font-weight: bold; width:240px; padding-left:30px">Ergebniseingabe</li>
            </a></div>
        </ul>
        </ul>
      </div>
    </nav>
  </div>
</header>
<main>
  <div class="container" id="container">
    <div class="row">
      <div class="col s12 m6"> 
        <!--Teams-->
        <div class="card">
          <div class="card-content">
            <p style="font-weight:500; font-style:normal; color:#3f51b5; font-size: 24px;">Teams</p>
          </div>
        </div>
        <ul class="collapsible" data-collapsible="accordion">
          <!--Länder eintragen-->
          <?php include 'u21/danemark_info.inc.php'; 
		  include 'u21/deutschland_info.inc.php';
		  include 'u21/england_info.inc.php';
		  include 'u21/italien_info.inc.php';
		  include 'u21/portugal_info.inc.php';
		  include 'u21/schweden_info.inc.php';
		  include 'u21/serbien_info.inc.php';
		  include 'u21/tschechien_info.inc.php'; ?>
        </ul>
        <!--Teams ENDE-->
         <div class="card">
          <div class="card-content">
            <p>Es dürfen Spieler teilnehmen, die am oder nach dem 1. Januar 1992 geboren sind. Das Turnier dient auch als europäische Qualifikation für das Fußballturnier der Männer bei den Olympischen Spielen 2016 in Rio de Janeiro.</br>
            Spielstätten sind Prag (2 Stadien), Olmütz und Uherské Hradiště <i>(Gesundheit!)</i>.</p>
          </div>
        </div>
        <small class="hide-on-small-only">Quellen: uefa.de & ran.de & sportsmole.co.uk</small>
      </div>
      <div class="col s12 m6">
        <div class="card">
          <div class="card-content">
            <p style="font-weight:500; font-style:normal; color:#3f51b5; font-size: 24px;">Verlauf</p>
          </div>
        </div>
        <!--Verlauf eintragen-->
        <div id="verlauf"> 
          <script>
$(document).ready(function() {
    $("#verlauf").load("u21/verlauf.inc.php");
});

</script> 
        </div>
        <!--Tabelle ENDE--> 
      </div>
    </div>
    <div class="row">
      <div class="col s12 m12"> 
        <!--News-->
        <div class="card">
          <div class="card-content">
            <p style="font-weight:500; font-style:normal; color:#3f51b5; font-size: 24px;">News</p>
          </div>
        </div>
      </div>
    </div>
    <div id="news"> 
      <script>
$(document).ready(function() {
    $("#news").load("cache/newsu21.html");
});

</script> 
    </div>
    <small class="hide-on-med-and-up">Quellen: uefa.de & ran.de & sportsmole.co.uk</small>
  </div>
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