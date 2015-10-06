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
    <?php
include 'navnews.inc.php';
?>
</header>
<main>
  <div class="container" id="container">
  <div id="news">
    <script>
$(document).ready(function() {
    $("#news").load("cache/news.html");
});

</script>
</div> 
  </div>
</main>
<!--Skripte--> 
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> 
<script>if (!window.jQuery) { document.write('<script src="bin/jquery-2.1.1.min.js"><\/script>'); }</script> 
<script type="text/javascript" src="js/materialize.min.js"></script> 
<script src="js/init.js"></script>
<script src="js/masonry.pkgd.min.js"></script> 
<script>
    //masonry start
    var $container = $('#masonry-grid');
    // initialize
$container.imagesLoaded( function() {
    $container.masonry({
      columnWidth: '.col',
      itemSelector: '.col',
    });
});
</script>

<!-- Footer beginnt hier-->
<?php
include 'footer.inc.php';
?>
</body>
</html>