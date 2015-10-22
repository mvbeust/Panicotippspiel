<!DOCTYPE html>
<html manifest="manifest.appcache">

<head>
<meta charset="UTF-8">
<title>Panicotippspiel</title>

<!--Meta Tags-->
<meta name="description" content="Das wohl epischste Tippspiel das das Internet je gesehen hat. Private Tipp für verschiedene Ligen und Länder: Deutschland, Österreich, England, Italien, Spanien, Frankreich und europäische Wettbewerbe. Alles nach eigenem Geschmack." />
<?php
include 'metamobile.inc.php';
?>
<script type="text/javascript">
   jQuery(document).ready(function() {
     $("abbr.timeago").timeago();
	 $("time.timeago").timeago();
   });
</script>
</head>
<body>
<header>
  <?php
if (isset($_POST['aaa'])){
echo '<script type="text/javascript">location.reload();</script>';
};
?>
  <?php
include 'nav.inc.php';
?>
</header>
<main class="container">
  <?php include 'banner.inc.php'; ?>
  <form id="foo">
    <div class="row">
      <div class="col s12 m12">
        <div class="card">
          <div class="card-content">
            <p>
              <label>Name</label>
              <select class="select_class" name="wer" required>
                <option value="" disabled selected>bitte ausw&#228;hlen</option>
                <option value="Francesco">Francesco</option>
                <option value="Hans">Hans</option>
                <option value="Mario">Mario</option>
                <option value="Max">Max</option>
              </select>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div id="test">
      <div id="loading" class="animated pulse infinite center-align" style="padding-top:50px"> <a href="javascript:history.go(0)"><img src="logo.png" height="70px"></a>
        <!-- Möglichkeit zur Einbindung eines beliebigen Spruchs-->
        <?php /*?>  <?php
  $zu = mt_rand(0,30);
include $zu.'.inc.php';
?><?php */?>
      </div>
    </div>
  </form>
</main>
<script type="text/javascript" data-cfasync="false">

jQuery( document ).ready(function( $ ) {

	// variable to hold request
	var request;
	// bind to the submit event of our form
	$("#foo").submit(function(event){

		// abort any pending request
		if (request) {
			request.abort();
		}
		// setup some local variables
		var $form = $(this);
		$('#result').attr("class", "btn grey white-text inactive");
		$('#result').text('Senden...');


		// let's select and cache all the fields
		var $inputs = $form.find("button, input, select, button, textarea");
		// serialize the data in the form
		var serializedData = $form.serialize();

		// let's disable the inputs for the duration of the ajax request
		// Note: we disable elements AFTER the form data has been serialized.
		// Disabled form elements will not be serialized.
		$inputs.prop("disabled", true);

		// fire off the request to /form.php
		request = $.ajax({
			url: "https://script.google.com/macros/s/AKfycbwk7feBHdJEWoYAEfobUktDmX6J4HCmPlD3toUD-Loxs_AMK1Vz/exec",
			type: "post",
			data: serializedData
		});


		// callback handler that will be called on success
		request.done(function (response, textStatus, jqXHR){
			// log a message to the console
			$('#result').text('Angenommen');
			$('#result').parent(this).hide();
			toast('Tipps sind angenommen', 9000);
			console.log("Jap, diese Tipps sind angekommen");
		});

		// callback handler that will be called on failure
		request.fail(function (jqXHR, textStatus, errorThrown){
			// log the error to the console
			console.error(
				"The following error occured: "+
				textStatus, errorThrown
			);
		});

		// callback handler that will be called regardless
		// if the request failed or succeeded
		request.always(function () {
			// reenable the inputs
			$('#result').text('Tipps wohl angenommen');
			$_POST = array();
		});

		// prevent default posting of form
		event.preventDefault();
	});
});

</script>

<!--Skripte-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/jquery.timeago.js" type="text/javascript"></script>
<script type="text/javascript">if (!window.jQuery) { document.write('<script src="bin/jquery-2.1.1.min.js"><\/script>'); }</script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script src="js/init.js"></script>
<script type="text/javascript">
//Hier werden mobile und desktop in sync gebracht
jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};
/* Here's the actual code. */
if($.cookie('remember_select') != null) {
    $('.select_class option[value="' + $.cookie('remember_select') + '"]').attr('selected', 'selected');
}
$('.select_class').change(function() {
    $.cookie('remember_select', $('.select_class option:selected').val(), { expires: 90, path: '/'});
});
</script>
<?php
include 'footer.inc.php';
?>
<div class="hiddendiv">
  <!--<iframe height="0px" width="0px" src="offline.html"> </iframe>-->
</div>
<script>
$(document).ready(function() {
    $("#test").load("indexinclude.inc.php");
});

</script>
</body>
