<?php
$config = array(
    'site_title' => 'Panicotippspiel News',
    'site_url'   => 'http://www.panicotippspiel.com/news',
    'feed_url'   => 'http://www.panicotippspiel.com/feed',
    'hub_endpoint' => 'http://panicomax.superfeedr.com/'
);
/**
 * pubSubHubbub()
 */
function pubSubHubbub() {
    global $config;
    $data = array(
        'hub.mode' => "publish",
        'hub.url' => $config['feed_url']
    );
    $fields_string = http_build_query($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $config['hub_endpoint']);
    curl_setopt($ch, CURLOPT_POST, count($data));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
/* ENTRY POINT */
if (pubSubHubbub()) {
  echo "<p>Pinged {$config['hub_endpoint']} &mdash; Woot!</p>";
} else {
    echo "<p><b>Error:</b> Could not ping {$config['hub_endpoint']}</p>";
}
?>
