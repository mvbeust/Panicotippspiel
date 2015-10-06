<!DOCTYPE html>

<head>
<meta charset="UTF-8">
<title>News - Panicotippspiel</title>

<!--Meta Tags-->
<meta name="description" content="Interessante und fundierte Nachrichten über den Fußball in Europa und der Welt. Zusammensetzung erstklassiger Artikel aus verschiedenen außergewöhnlichen Quellen und Blogs." />
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
    <nav class="indigo" style="overflow:visible">
      <div class="nav-wrapper">
        <div class="container"> <a href="/" class="brand-logo"  style="font-weight:300; top:0px">Panicotippspiel <i class="hide-on-med-and-down" style="font-weight:500; font-style:normal;">News</i></a> </div>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
        <div class="container">
          <ul class="right hide-on-med-and-down">
            <li  class="waves-effect waves-indigo"><a href="/">Tippspiel</a></li>
            <li class="waves-effect waves-indigo"><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="dropdown1">Tabelle und Tipps<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
            <li class="waves-effect waves-indigo" style="height:64px"><a href="stats"><i class="mdi-editor-insert-chart"></i></a></li>
            <li class="waves-effect waves-indigo" style="height:64px"><a href="new"><i class="mdi-content-add-circle-outline"></i></a></li>
            <li class="waves-effect waves-indigo" style="height:64px"><a href="javascript:history.go(0)"><i class="mdi-navigation-refresh"></i></a></li>
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
    <div id="loading" class="animated pulse infinite center-align" style="padding-top:50px">  <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
    <script>
$(document).ready(function() {
    $("#container").load("newsinclude.inc.php");
});

</script> 
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