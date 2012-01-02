<?php

t3lib_extMgm::addTypoScript($_EXTKEY,'setup','

	plugin.tx_rtemyvideo_tsfemyvideotag {
		maxW = 400
		maxH = 400
	}
	
	lib.parseFunc.allowTags := addToList(myvideo)
	lib.parseFunc.tags.myvideo = < plugin.tx_rtemyvideo_tsfemyvideotag
	lib.parseFunc_RTE.allowTags := addToList(myvideo)
	lib.parseFunc_RTE.tags.myvideo = < plugin.tx_rtemyvideo_tsfemyvideotag
',43);

t3lib_extMgm::addPItoST43($_EXTKEY,'binding/myvideotag/class.tx_rtemyvideo_tsfemyvideotag.php','_tsfemyvideotag','',1); 

$TYPO3_CONF_VARS['FE']['eID_include']['rte_myvideo'] = 'EXT:rte_myvideo/proxy-ajax.php';

$TYPO3_CONF_VARS['EXTCONF']['rtehtmlarea']['plugins']['insertMyVideo'] = array();
$TYPO3_CONF_VARS['EXTCONF']['rtehtmlarea']['plugins']['insertMyVideo']['objectReference'] = 'EXT:'.$_EXTKEY.'/class.tx_rtemyvideo.php:&tx_rtemyvideo';
$TYPO3_CONF_VARS['EXTCONF']['rtehtmlarea']['plugins']['insertMyVideo']['addIconsToSkin'] = 1;

$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_parsehtml_proc.php']['transformation']['ts_images'] = 'EXT:'.$_EXTKEY.'/binding/myvideotag/class.tx_rtemyvideo_rtetransform.php:&tx_rtemyvideo_rtetransform'; 
?>