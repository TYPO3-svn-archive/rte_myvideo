<?php

// Exit, if script is called directly (must be included via eID in index_ts.php)
if (!defined ('PATH_typo3conf')) 	die ('Could not access this script directly!');


$TYPO3_AJAX = true;
 

$id = t3lib_div::_GP('id');
$type = t3lib_div::_GP('type');

switch($type) {
	case 'vimeo':
		vimeoInfo($id);
	break;
	
	case 'youtube':
		youtubeInfo($id);
	break;
}

function youtubeInfo($id) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'http://gdata.youtube.com/feeds/api/videos/' . $id . '?alt=json');
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_USERAGENT, getRandomUserAgent());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$content = curl_exec($ch);
	header('X-JSON: '. $content);
	
}

function vimeoInfo($id) {
	$ch = curl_init();
	// Imposta l'URL e altre opzioni
	curl_setopt($ch, CURLOPT_URL, 'http://vimeo.com/api/v2/video/' . $id . '.json');
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_USERAGENT, getRandomUserAgent());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$content = curl_exec($ch);
	header('X-JSON: '. $content);
}

$someUA = array (
"Mozilla/5.0 (Windows; U; Windows NT 6.0; fr; rv:1.9.1b1) Gecko/20081007 Firefox/3.1b1",
"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1) Gecko/2008070208 Firefox/3.0.0",
"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.2.149.27 Safari/525.13",
"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)",
"Mozilla/4.0 (compatible; MSIE 7.0b; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.40607)",
"Mozilla/4.0 (compatible; MSIE 7.0b; Windows NT 5.1; .NET CLR 1.1.4322)",
"Mozilla/4.0 (compatible; MSIE 7.0b; Windows NT 5.1; .NET CLR 1.0.3705; Media Center PC 3.1; Alexa Toolbar; .NET CLR 1.1.4322; .NET CLR 2.0.50727)",
"Mozilla/45.0 (compatible; MSIE 6.0; Windows NT 5.1)",
"Mozilla/4.08 (compatible; MSIE 6.0; Windows NT 5.1)",
"Mozilla/4.01 (compatible; MSIE 6.0; Windows NT 5.1)");

function getRandomUserAgent ( ) {
    srand((double)microtime()*1000000);
    return $someUA[rand(0,count($someUA)-1)];
}

?>