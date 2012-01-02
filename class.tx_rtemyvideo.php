<?php

require_once(t3lib_extMgm::extPath('rtehtmlarea').'class.tx_rtehtmlareaapi.php');

class tx_rtemyvideo extends tx_rtehtmlareaapi {

	protected $extensionKey = 'rte_myvideo';	// The key of the extension that is extending htmlArea RTE
	protected $pluginName = 'insertMyVideo';		// The name of the plugin registered by the extension
	protected $relativePathToLocallangFile = '';	// Path to this main locallang file of the extension relative to the extension dir.
	protected $htmlAreaRTE;				// Reference to the invoking object
	protected $relativePathToSkin = 'htmlarea/plugins/insertMyVideo/skin/htmlarea.css';
	protected $thisConfig;				// Reference to RTE PageTSConfig
	protected $toolbar;				// Reference to RTE toolbar array
	protected $LOCAL_LANG; 				// Frontend language array

	protected $pluginButtons = 'myvideo'; 
	protected $convertToolbarForHtmlAreaArray = array (
		'myvideo'	=> 'insertMyVideo',
	);

	public function buildJavascriptConfiguration($RTEcounter) {
		global $TSFE, $LANG;

		$registerRTEinJavascriptString = '';
		
		return $registerRTEinJavascriptString;
	}
	
	public function getPathToPluginDirectory() {
		return "http://" . t3lib_div::getIndpEnv("TYPO3_HOST_ONLY") . "/typo3conf/ext/rte_myvideo/htmlarea/plugins/insertMyVideo/";
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rte_myvideo/class.tx_rtemyvideo.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rte_myvideo/class.tx_rtemyvideo.php']);
}
?>