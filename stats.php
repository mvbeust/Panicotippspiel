<!DOCTYPE html>

<head>
<meta charset="UTF-8">
<title>Statistiken - Panicotippspiel</title>
<meta name="description" content="Detaillierte Statistiken über den bisherigen Verlauf des Panicotippspiels. Hierbei finden sich Zeitverläufe und weitere Kennzahlen über die einzelnen Spieler." />
<?php
include 'metamobile.inc.php';
?>

<!--Google Spreadsheet-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<!--Punkteübersicht Verlauf-->
<script type="text/javascript">
      google.load('visualization', '1', {'packages': ['line']});
      google.setOnLoadCallback(initialize);

      function initialize() {
        // The URL of the spreadsheet to source data from.
        var query = new google.visualization.Query(
            'https://spreadsheets.google.com/pub?key=1_k0XrSfns-WnukwEubctqHUcA1RafVWjAnFhPDiDNOc&gid=777511279');
        query.send(draw);
      }

      function draw(response) {
        if (response.isError()) {
          alert('Error in query');
        }
		var options = {

        		  animation: {duration: 10000, startup: true},
		chart: {
          title: 'Punkteverlauf',
          subtitle: 'addiert nach Datum',
		},
		
		legend: {position: 'in', textStyle: {fontSize: 12}},
		
        axes: {
          x: {
            0: {side: 'bottom'}
          }
        },
		enableInteractivity: true,
		focusTarget: 'category',
		pointSize: '50',
      };
		var ticketsData = response.getDataTable();
        var chart = new google.charts.Line(
            document.getElementById('chart_div'));
        chart.draw(ticketsData, google.charts.Line.convertOptions(options));
	  };
	  $(window).resize(function(){
  draw(response);
});
	  </script>

<!--Länderverteilung-->
<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
</script>
</head>

<body>
<header>
  <?php
include 'nav.inc.php';
?>
</header>
<main class="container">
  <div class="row">
    <div class="card large" style="padding:20px; width:auto" id="chart_div"></div>
    <div id="statstable">
      <div id="loading" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a> </div>
    </div>
    <script>
$(document).ready(function() {
    $("#statstable").load("statstable.inc.php");
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
