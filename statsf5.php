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
          <p>Statistiken wurden upgedated</p>
        </div>
      </div>
    </div>
  </div>
  <?php
include 'f5collection.inc.php';
?>
  <div class="row">
    <div class="card large" style="padding:20px; width:auto" id="chart_div"></div>
    <div id="statstable">
      <div id="loading" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
    </div>
    <script>
$(document).ready(function() {
    $("#statstable").load("statstablerefresh.php");
});

</script> 
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
