<!DOCTYPE html>

<head>
<meta charset="UTF-8">
<title>Regeln & FAQ - Panicotippspiel</title>
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
    <!--PanicoFAQ-->
    <ul class="collapsible" data-collapsible="accordion">
      <li>
        <div class="collapsible-header active"><i class="material-icons">explore</i>Wie funktionieren die Tabellen?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p>Es gibt zwei Arten von Tabellen:<br>
            - die Panicotabelle<br>
            - die Monatstabelle<br>
            <br>
            Die Monatstabelle gilt immer nur für einen Monat, die Panicotabelle gilt über das ganze Spiel hinweg und ist entscheidend dafür, wer gewinnt und wer nicht. </p>
        </div>
      </li>
      <li>
        <div class="collapsible-header"><i class="mdi-content-add-circle-outline"></i>Wie werden die Panico vergeben?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p>Panico bekommt man, wenn man in einer Monatswertung entweder Erster oder Zweiter geworden ist. Der Zweite bekommt immer halb so viele Panico, die der Erste.</br>
            Die Anzahl der Panico steigt mit Fortschreiten des Spiels:<br>
            +1 im August (0,5 für den Zweiten)</br>
            +2 im September </br>
            +3 im Oktober </br>
            +4 im November </br>
            +5 im Dezember</br>
            +6 im Januar</br>
            +7 im Februar</br>
            +8 im März</br>
            +9 im April</br>
            +10 im Mai</br>
            +11 im Juni </br>
            +12 im Juli</p>
        </div>
      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">people_outline</i>Was passiert bei Panicogleichheit?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p>Es erhalten beide Spieler Panico. Es kann mehr als einen ersten Platz geben und folglich auch mehr als einen zweiten Platz geben.</p>
        </div>
      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">access_time</i>Wann werden Panico vergeben?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p>Immer am Ende des Monats.</p>
        </div>
      </li>
    </ul>
    <!--Erste FAQ-->
    <ul class="collapsible" data-collapsible="expandable">
      <li>
        <div class="collapsible-header"><i class="mdi-content-add-circle-outline"></i>Wie werden die Monatspunkte vergeben?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p> +2 f&#252;r richtiges Ergebnis</br>
            +1 f&#252;r richtige Tendenz vor dem 11er-Schie&#223;en</br>
            </br>
            bei ko-Spielen zus&#228;tzlich als Bonus:</br>
            +1 f&#252;r die richtige Spiell&#228;nge</br>
            +Bonus f&#252;r richtigen Sieger</br>
            =Summe ergibt Gesamtpunktzahl f&#252;r den Monat<br>
            <br>
            Zum Anfang eines jeden Monats wird eine neue Monatstabelle gestartet.</p>
        </div>
      </li>
      <li>
        <div class="collapsible-header"><i class="mdi-action-grade"></i>Wie sieht der Bonus aus?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p> +0,5 f&#252;r Normale Ko-Spiele und Achtelfinals</br>
            +1 f&#252;r Viertelfinals</br>
            +1,5 für Bonusspiele<br>
            +2 f&#252;r Halbfinals</br>
            +3 f&#252;r Finals</p>
        </div>
      </li>
      <li>
        <div class="collapsible-header" ><i class="mdi-av-repeat"></i>Besonderheiten bei ko-Spielen mit Hin- und R&#252;ckspiel</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p> Das Hinspiel wird als normales Spiel gewertet (ohne Bonus).</br>
            </br>
            Das R&uuml;ckspiel hingegen wird als ko-Spiel mit entsprechendem Bonus gewertet. Hier gibt es drei grunds&auml;tzliche Regeln:</br>
            <i class="mdi-action-done tiny"></i> Das Spiel hat einen eindeutigen Sieger: Man tr&auml;gt diesen Sieger als Sieger ein.</br>
            <i class="mdi-action-done tiny"></i> Das Spiel geht Unentschieden aus: Man tr&auml;gt als Sieger die Mannschaft ein, die weiterkommt.</br>
            <i class="mdi-action-done tiny"></i> Das Spiel geht ins 11er Schie&szlig;en: Man tr&auml;gt die Mannschaft als Sieger ein, die weiterkommt. </p>
          <div class="divider"></div>
          <p style="background:#FBFBFB"> Beispiel 1:<br />
            Hinspiel: SV Ried vs. Real Madrid 0:8<br />
            R&uuml;ckspiel: Real Madrid vs. SV Ried 0:1 (90 mins - Sieger: SV Ried)</p>
          <div class="divider"></div>
          <p style="background:#FBFBFB">Beispiel 2:<br />
            Hinspiel: SV Rief vs. Real Madrid 0:8<br />
            R&uuml;ckspiel: Real Madrid vs. SV Ried 2:0 (90 mins - Sieger: Real Madrid)</p>
          <div class="divider"></div>
          <p style="background:#FBFBFB">Beispiel 3:<br />
            Hinspiel: SV Ried vs. Real Madrid 0:0<br />
            R&uuml;ckspiel: Real Madrid vs. SV Ried 1:1 (90 mins - Sieger: SV Ried)&nbsp;<em>Ausw&auml;rtstorregel!</em></p>
          <div class="divider"></div>
          <p style="background:#FBFBFB">Beispiel 4:<br />
            Hinspiel SV Ried vs. Real Madrid 2:1<br />
            R&uuml;ckspiel: Real Madrid vs. SV Ried 2:1 (11er - Sieger, der 11er gewinnt)</p>
        </div>
      </li>
    </ul>
    
    <!--Zweite FAQ-->
    
    <ul class="collapsible" data-collapsible="accordion">
      <li>
        <div class="collapsible-header"><i class="material-icons">timelapse</i>Ab wann und bis wann kann ich tippen?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p> Man kann 9 Tage vor Spieltag tippen (angenommen, es sind maximal acht Spiele in den n&#228;chsten 8 Tagen) und kann bis zwei Minuten vor Anpfiff tippen. Alle Uhrzeiten beziehen sich auf die aktuelle Zeit in Rom.</br>
            Es gilt immer nur der erste Tipp. Tipps k&#246;nnen auch vor Anpfiff nicht ver&#228;ndert werden.<br>
            <br>Das Tippspiel zeigt an, wie lange man noch tippen kann. Diese Angabe ist abhängig von der Zeitzone in der man sich befindet. Die Angabe wann das Spiel stattfindet, bezieht sich immer auf die Zeit in Zentraleuropa, damit klar ist, in welche Monatswertung das Spiel eingeht.</p>
        </div>
      </li>
       <li>
        <div class="collapsible-header"><i class="material-icons">language</i>Ich bin in einer anderen Zeitzone. Was jetzt?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p>Es ändert sich nichts. Ausschlaggebend für die Zuordnung der Punkte zu den Monaten ist Zeit in Deutschland/Italien. <br>
          Das Tippspiel ist so nett und zeigt dir die Spiele aber für deine Zeitzone an. Wenn du auf diese Zeit klickst, siehst du die Anpfiffzeit in deutscher Zeit und erhälst Auskunft darüber, für welchen Monat das Spiel zählt.</p>
        </div>
      </li>
      <li>
        <div class="collapsible-header"><i class="mdi-av-snooze"></i>Was passiert, wenn ich einen Tipp vergesse?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p> Das ist nat&#252;rlich &#228;rgerlich. Erstmal wird dir ein Punkt abgezogen, dann tippt das Spiel automatisch ein 0:0 f&#252;r dich. Das Spiel wird in ko-Spielen automatisch einen Sieger f&#252;r einen tippen. Man kann sich also den Bonus f&#252;r den Sieger, wenn das Spiel l&#228;nger als 90mins ist, ergaunern. Wenn jemand einen Tipp vergessen hat f&#252;hrt dies dazu, dass die Tipps der anderen erst nach Spielende angezeigt werden. Wenn jemand keinen Tipp abgegeben hat, steht 0:0 (NT) als eingegebener Tipp in der Anzeige. NT = Non-Tipp. Bei nicht getippten ko-Spielen nat&#252;rlich 0:0 und in Klammern der jeweilige zuf&#228;llig getippte Sieger.</p>
        </div>
      </li>
      <li>
        <div class="collapsible-header"><i class="mdi-action-subject"></i>Wie funktioniert das Formular?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
          <p> Ein Tipp wird nur dann gewertet, wenn man f&#252;r beide Mannschaften die Anzahl der Tore eingetragen hat. Man kann also auch nur ein Spiel tippen, wenn f&#252;nf angezeigt werden.</p>
        </div>
      </li>
      <li>
        <div class="collapsible-header"><i class="mdi-image-filter-9-plus"></i>Wie viele Spiele wird es maximal geben?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
        <p> 449 Spiele - das sind potentiell 1347 Punkte (ohne ko Spiele). </p>
      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">event_note</i>Von wann bis wann geht das Tippspiel?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
        <p> Normal wird eine ganze Saison getippt. Das hieße vom 1.8. bis zum 31.7. des Folgejahres. Es kann sein, dass sich diese Daten aufgrund von Turnieren verändern kann. </p>
      </li>
    </ul>
    
    <!--Dritte FAQ-->
    
    <ul class="collapsible" data-collapsible="accordion">
      <li>
        <div class="collapsible-header" id="webapp"><i class="material-icons">devices</i>Kann ich das Tippspiel als App installieren?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
        <p> Nein, installieren kann man das Tippspiel nicht. </br>
          Allerdings kann man das Tippspiel als Webapp herunterladen, was den großen Vorteil hat, dass weniger mobile Daten verbraucht werden. Dies geht sowohl auf iOS (in Safari die Seite zum Homescreen hinzufügen), als auch auf Android (in Chrome zu Homescreen hinzufügen). </p>
      </li>
      <li>
        <div class="collapsible-header" id="notifications"><i class="material-icons">notifications</i>Gibt es Notifications für das Tippspiel?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
        <p>Ja. <br>
        Nachdem das ein bisschen komplizierter ist, gibt es hierfür eine extra Seite: <a href="notifications">Notifications</a></p>
      </li>
      <li>
        <div class="collapsible-header" id="kalender"><i class="material-icons">event</i>Kann ich das Tippspiel zu meinem Kalender hinzufügen?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
        <p> Ja, sicher kann man das. </br>
          Auch wenn es keine Gewähr gibt, dass immer alles up-to-date ist, so kann man doch den Kalender des Tippspiels abonnieren. Heißt, man kann ihn zu seinem Google Kalender oder zu seinem lokalen Kalender (auf dem PC, Android, iPhone, usw) hinzufügen.<br>
          <a href="https://www.google.com/calendar/ical/tm0ujohsggl3bv4q5l9eipmjk4%40group.calendar.google.com/public/basic.ics">Kalender jetzt hinzufügen</a> </p>
      </li>
      <li>
        <div class="collapsible-header" id="notifications"><i class="material-icons">collections_bookmark</i>Gibt es einen RSS-Feed für das Tippspiel?</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
        <p>Ja. <br>
        Der RSS-Feed befindet sich hier: <a href="feed">RSS</a> oder auf <a href="http://google.com/newsstand/s/editions/CAowl-qgCQ/Panicotippspiel" target="_blank">Play Newsstand</a>.<br>
        <a href='http://cloud.feedly.com/#subscription%2Ffeed%2Fhttp%3A%2F%2Fwww.panicotippspiel.com%2Ffeed'  target='blank'><img id='feedlyFollow' src='http://s3.feedly.com/img/follows/feedly-follow-rectangle-volume-medium_2x.png' alt='follow us in feedly' width='71' height='28'></a> </p>
      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">error_outline</i>Meine Tipps werden nicht angenommen.</div>
        <div class="collapsible-body" style="background-color:#F5F5F5">
        <p> Das ist extrem doof, aber sogar im Panicotippspiel wird die Perfektion nur näherungsweise erreicht.</br>
          Bitte in einem solchen Fall nach einiger Zeit die Seite neu aufrufen, die Tipps nochmal abgeben und in der Zwischenzeit im News Bereich gut informieren. </p>
      </li>
    </ul>
    
    <!--Card-->
    
    <div class="col s12 m12">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text"> <span class="card-title">Und verloren!</span>
          <p>&#171;Etiam nunc regredi possumus; quod si ponticulum transierimus, omnia armis agenda erunt.&#187; </br>
            Plutarch: Leben des Pompejus, Kap. 60</p>
        </div>
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
