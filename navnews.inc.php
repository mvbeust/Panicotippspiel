<!--Navigation News-->

<ul id='dropdown1' class='dropdown-content'>
  <li><a href="/">Tippen</a></li>
  <li><a href="/tabelle">Tabelle</a></li>
  <li><a href="/tipps">Tipps</a></li>
  <li><a href="/stats">Statistiken</a></li>
</ul>
<ul id='dropdown2' class='dropdown-content'>
  <li><a href="bundesliga">Bundesliga DE</a></li>
  <li><a href="premierleague">Premier League</a></li>
  <li><a href="seriea">Serie A</a></li>
  <li><a href="primeradivision">Primera División</a></li>
  <li><a href="ligue1">Ligue 1</a></li>
  <li><a href="bundesligaat">Bundesliga AT</a></li>
</ul>
<div class="navbar-fixed">
<nav class="white" style="overflow:visible">
  <div class="nav-wrapper">
    <div class="container"> <a href="news" class="brand-logo"  style="font-weight:300; top:0px; color:#3f51b5">Panico<i class="hide-on-small-only" style="font-style:normal; color:#3f51b5">tippspiel </i><i class="animated flipInX" style="font-weight:500; font-style:normal; color:#3f51b5">News</i></a> </div>
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"  style="color:#3f51b5"></i></a>
    <div class="container">
      <ul class="right hide-on-med-and-down">
        <li class="waves-effect waves-indigo"><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="dropdown2"  style="color:#3f51b5">Intern. Ligen<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
        <li class="waves-effect waves-indigo"><a href="CL"  style="color:#3f51b5">CL</a></li>
        <li class="waves-effect waves-indigo"><a href="EL"  style="color:#3f51b5">EL</a></li>
        <li class="waves-effect waves-indigo"><a href="EM"  style="color:#3f51b5">EM Quali</a></li>
        <li class="waves-effect waves-indigo"><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="dropdown1"  style="background-color:#3f51b5; color:#fff"">Tippspiel<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
      </ul>
    </div>
    <ul class="side-nav" id="mobile-demo" style="overflow-y:auto">
      <li class="bold" style="border-bottom:solid; border-bottom-color:#D0D0D0; border-bottom-width:1px; background: #D0D0D0"><a href="javascript:history.go(0)" style="padding-left:75px; padding-top:24px"><img height="50px" src="logonav.png" /></a></li>
      <div class="waves-effect"><a href="/index.php" style="padding:0px">
        <li style="font-weight: bold; border-bottom:solid; border-bottom-color:#D0D0D0; border-bottom-width:1px; width:240px; padding-left:30px">Tippspiel</li>
        </a></div>
      <div class="waves-effect"><a href="news.php" style="padding:0px">
        <li style="font-weight: bold; width:240px; padding-left:30px">News</li>
        </a></div>
      <div class="waves-effect"><a style="padding:0px" href="ligen.php">
        <li style="font-weight: bold; width:240px; padding-left:30px">Ligen</li>
        </a></div>
      <div class="waves-effect"><a href="cl.php" style="padding:0px">
        <li style="font-weight: bold; width:240px; padding-left:30px">CL</li>
        </a></div>
      <div class="waves-effect"><a href="el.php" style="padding:0px">
        <li style="font-weight: bold; width:240px; padding-left:30px">EL</li>
        </a></div>
      <div class="waves-effect"><a href="emquali.php" style="padding:0px">
        <li style="font-weight: bold; border-bottom:solid; border-bottom-color:#D0D0D0; border-bottom-width:1px; width:240px; padding-left:30px">EM Quali</li>
        </a></div>
      <div class="waves-effect"><a style="color:#D0D0D0; padding:0px" href="faq.php">
        <li style="font-weight: bold; width:240px; padding-left:30px">FAQ</li>
        </a></div>
      <div class="waves-effect"><a style="color:#D0D0D0; padding:0px" href="ergebnis">
        <li style="font-weight: bold; width:240px; padding-left:30px">Ergebniseingabe</li>
        </a></div>
      <div class="waves-effect"><a style="color:#D0D0D0; padding:0px" href="archiv.php">
        <li style="font-weight: bold; width:240px; padding-left:30px">Archiv</li>
        </a></div>
    </ul>
    </ul>
  </div>
</nav>
<div class="fixed-action-btn" style="bottom: 24px; right: 24px; text-align:right; width:250px"> <a class="btn-floating grey"> <i class="material-icons">info_outline</i> </a>
  <ul>
    <li>
      <div class="card-floating card">
        <div id="info"></div>
      </div>
    </li>
  </ul>
</div>
<script>
$(document).ready(function() {
    $("#info").load("info.inc.php");
});
</script>
