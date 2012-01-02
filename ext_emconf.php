<?php

########################################################################
# Extension Manager/Repository config file for ext "rte_myvideo".
#
# Auto generated 02-01-2012 18:26
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'MyVideo RTE',
	'description' => 'Rich Text Editor Plugin that add inline video support.',
	'category' => 'be',
	'shy' => 0,
	'dependencies' => 'cms',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => 0,
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'doNotLoadInFE' => 1,
	'lockType' => '',
	'author' => 'Mauro Parente',
	'author_email' => 'mauro.parente@innovationconsulting.it',
	'author_company' => 'IC',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'version' => '0.8.0',
	'_md5_values_when_last_written' => 'a:22:{s:23:"class.tx_rtemyvideo.php";s:4:"59d9";s:17:"ext_localconf.php";s:4:"c383";s:14:"proxy-ajax.php";s:4:"c279";s:55:"binding/myvideotag/class.tx_rtemyvideo_rtetransform.php";s:4:"8751";s:57:"binding/myvideotag/class.tx_rtemyvideo_tsfemyvideotag.php";s:4:"4477";s:34:"flowplayer/flowplayer.controls.swf";s:4:"bff1";s:24:"flowplayer/flowplayer.js";s:4:"e7c2";s:25:"flowplayer/flowplayer.swf";s:4:"b3af";s:48:"htmlarea/plugins/insertMyVideo/insert-myvideo.js";s:4:"2134";s:44:"htmlarea/plugins/insertMyVideo/locallang.xml";s:4:"2f53";s:57:"htmlarea/plugins/insertMyVideo/popups/insert_myvideo.html";s:4:"da98";s:76:"htmlarea/plugins/insertMyVideo/popups/sysext/t3skin/rtehtmlarea/htmlarea.css";s:4:"6860";s:48:"htmlarea/plugins/insertMyVideo/skin/htmlarea.css";s:4:"0886";s:54:"htmlarea/plugins/insertMyVideo/skin/images/myvideo.gif";s:4:"66c5";s:52:"htmlarea/plugins/insertMyVideo/skin/images/video.png";s:4:"b1e2";s:57:"htmlarea/plugins/insertMyVideo/skin/images/video_icon.png";s:4:"d3b2";s:54:"htmlarea/plugins/insertMyVideo/skin/images/youtube.gif";s:4:"5589";s:20:"jwplayer/jwplayer.js";s:4:"efbf";s:19:"jwplayer/player.swf";s:4:"f81c";s:23:"jwplayer/player.swf.old";s:4:"81df";s:20:"jwplayer/preview.jpg";s:4:"31d7";s:21:"jwplayer/swfobject.js";s:4:"6990";}',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
			'php' => '5.0.0-0.0.0',
			'typo3' => '4.1.0-4.5.999',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'suggests' => array(
	),
);

?>