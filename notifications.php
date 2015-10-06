<!DOCTYPE html>

<head>
<meta charset="UTF-8">
<title>Notifications - Panicotippspiel</title>
<meta name="description" content="Fragen, Antworten und Spielregeln des Panicotippspiels. Detaillierte Erklärungen dessen, wie man zu tippen hat und wie man Punkte bekommen kann." />
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
<main>
  <div class="container"> </br>
    <!--Erklärung-->
    <ul class="collapsible" data-collapsible="accordion">
      <li>
        <div class="collapsible-header active"><i class="material-icons">notifications</i>Wie bekomme ich Notifications?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p>Um Notifications zu erhalten, muss man sich Pushbullet herunterladen und dann den entsprechenden Channel abonnieren.</p>
        </div>
      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">help_outline</i>Was ist Pushbullet? (Download)</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p>Pushbullet ist eine App, mit der man Notifications empfangen kann. Diese gibt es für fast jede Plattform und man logged sich entweder mit einem Google- oder einem Facebookaccount ein. Pushbullet ist weit über das Tippspiel hinaus eine sehr interessante App, die einem etliche Vorteile bieten kann.<br>
          Ladet echt die App für all die Geräte herunter, auf denen ihr die Notification erhalten wollt.<br>
          <a href="http://www.pushbullet.com" target="_blank">Hier geht's zur Webseite</a><br>
          Oder direkt zum Download:<br>
          <a href="https://play.google.com/store/apps/details?id=com.pushbullet.android" target="_blank">für Android</a><br>
          <a href="https://itunes.apple.com/us/app/pushbullet/id810352052?ls=1&mt=8" target="_blank">für iOS</a><br>
          <a href="https://chrome.google.com/webstore/detail/chlffgpmiacpedhhbkiomidkjlcfhogd" target="_blank">für Chrome</a><br>
          <a href="https://addons.mozilla.org/en-US/firefox/addon/pushbullet/versions/" target="_blank">für Firefox</a><br>
          <a href="http://update.pushbullet.com/extension.safariextz" target="_blank">für Safari</a><br>
          <a href="https://update.pushbullet.com/pushbullet_installer.exe" target="_blank">für Windows</a><br>
          <a href="https://itunes.apple.com/us/app/pushbullet-from-pushbullet/id948415170?ls=1&mt=12" target="_blank">für Mac</a><br></p>
        </div>
      </li>
      <li>
        <div class="collapsible-header active"><i class="material-icons">notifications_active</i>Ich habe Pushbullet, was jetzt?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p>Jetzt abonnierst du deinen persönlichen Channel: <br>
          <a class="pushbullet-subscribe-widget" data-channel="panicofranz" data-widget="button" data-size="small"></a>
<script type="text/javascript">(function(){var a=document.createElement('script');a.type='text/javascript';a.async=true;a.src='https://widget.pushbullet.com/embed.js';var b=document.getElementsByTagName('script')[0];b.parentNode.insertBefore(a,b);})();</script>
<a class="pushbullet-subscribe-widget" data-channel="panicohans" data-widget="button" data-size="small"></a>
<script type="text/javascript">(function(){var a=document.createElement('script');a.type='text/javascript';a.async=true;a.src='https://widget.pushbullet.com/embed.js';var b=document.getElementsByTagName('script')[0];b.parentNode.insertBefore(a,b);})();</script>
<a class="pushbullet-subscribe-widget" data-channel="panicomario" data-widget="button" data-size="small"></a>
<script type="text/javascript">(function(){var a=document.createElement('script');a.type='text/javascript';a.async=true;a.src='https://widget.pushbullet.com/embed.js';var b=document.getElementsByTagName('script')[0];b.parentNode.insertBefore(a,b);})();</script>
<a class="pushbullet-subscribe-widget" data-channel="panicomax" data-widget="button" data-size="small"></a>
<script type="text/javascript">(function(){var a=document.createElement('script');a.type='text/javascript';a.async=true;a.src='https://widget.pushbullet.com/embed.js';var b=document.getElementsByTagName('script')[0];b.parentNode.insertBefore(a,b);})();</script></p>
        </div>
      </li>
      <li>
        <div class="collapsible-header active"><i class="material-icons">inbox</i>Was wird mir da geschickt?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p>Du bekommst eine Benachrichtigung, wenn du entweder am gleichen Tag, oder am darauffolgenden Tag noch Spiele hast, die du nicht getippt hast.<br><br>
          Natürlich bekommst du keine Notification, wenn du keine Spiele zu tippen hast.</p>
        </div>
      </li>
      <li>
        <div class="collapsible-header active"><i class="material-icons">access_time</i>Wann bekomme ich die Notification?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p>Solltest du noch zu tippenede Spiele haben, bekommst du die Notification zwischen 14 und 15 Uhr deutscher Zeit.<br><br>
          Natürlich bekommst du keine Notification, wenn du keine Spiele zu tippen hast.</p>
        </div>
      </li>
      <li>
        <div class="collapsible-header active"><i class="material-icons">notifications_off</i>Ich will keine Notifications mehr.</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p>Du kannst jederzeit den Channel in Pushbullet deaktivieren und schon bekommst du keine Notifications mehr. Zu Risiken und Nebenwirkungen, siehe die Auswirkungen von Non-Tipps ;-)</p>
        </div>
      </li>
    </ul>
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
