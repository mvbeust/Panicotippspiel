<!DOCTYPE html>

<head>
<meta charset="UTF-8">

<title>404 - Panicotippspiel</title>

<meta name="description" content="The true place for monkeys on Panicotippspiel." />
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

<main class="container">
 <div class="row">
 <div class="col s12 m6 l6">
      <div class="card orange">
      <div class="card-image"><img src="/img/placeholder.GIF"></div>
        <div class="card-content"> <span class="card-title"><i class="mdi-alert-warning"></i> 404</span>
          <p class="white-text">Diese Seite ist leider nicht verfügbar. Vielleicht rufst du noch eine URL der alten Seite auf.</p>
        </div>
        <div class="card-action"> <a href="http://www.panicotippspiel.com" target="_self" class="white-text">Zur&#252;ck zu Home</a>  </div>
      </div>
      </div>
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