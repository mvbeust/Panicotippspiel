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
          <p>Tipps und Tabellen wurden upgedated</p>
        </div>
      </div>
    </div>
  </div>
  <?php
include 'f5collection.inc.php';
include 'tabellerefresh.php';
include 'tippsrefresh.php';
?>

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
