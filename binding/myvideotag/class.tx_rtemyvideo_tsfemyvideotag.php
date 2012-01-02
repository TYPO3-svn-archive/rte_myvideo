<?php

class tx_rtemyvideo_tsfemyvideotag {

	function main($content,$conf) {
		$params = $this->cObj->parameters;
		$ratio = $params['width'] / $params['height'];
		if( isset($conf['maxW']) && ($params['width'] > $conf['maxW']) ) {
			$params['width'] = $conf['maxW'];
			$params['height'] = intval($params['width'] / $ratio);
		}
		if( isset($conf['maxH']) && ($params['height'] > $conf['maxH']) ) {
			$params['height'] = $params['maxH'];
			$params['width'] = intval($params['height'] * $ratio);
		}
		switch($params['type']) {
			case 'youtube':
				$query_parts = explode("&", parse_url($params['ref'], PHP_URL_QUERY));
				foreach($query_parts as $query) {
					list($key, $value) = explode("=", $query);
					if(strcmp($key,"v")==0) {
						$extId = $value;
						break;
					} 
				}
				$content = '<iframe src="http://www.youtube.com/embed/'.$extId.'" width="'.$params['width'].'" height="'.$params['height'].'"></iframe>';
			break;
			
			case 'vimeo':
				$path_parts = array_filter(explode("/", parse_url($params['ref'], PHP_URL_PATH)));
				$extId = end($path_parts);
				$content = '<iframe src="http://player.vimeo.com/video/'.$extId.'" width="'.$params['width'].'" height="'.$params['height'].'" frameborder="0"></iframe>';
			break;
			
			case 'jwplayer':
			/* JWPLAYER
				$GLOBALS['TSFE']->additionalHeaderData['rte_myvideo'] = '<script type="text/javascript" src="'.t3lib_extMgm::siteRelpath('rte_myvideo').'jwplayer/jwplayer.js"></script>';
				$content = '<div id="mediaplayer"  width="'.$params['width'].'" height="'.$params['height'].'"></div>';
				$content .= '<script type="text/javascript">jwplayer(\'mediaplayer\').setup({flashplayer: \''.t3lib_extMgm::siteRelpath('rte_myvideo').'jwplayer/player.swf\',file: \'' . $params['ref'] . '\'});</script>';
			/* END JWPLAYER */
			/* FLOWPLAYER */
				$GLOBALS['TSFE']->additionalHeaderData['rte_myvideo'] = '<script type="text/javascript" src="'.t3lib_extMgm::siteRelpath('rte_myvideo').'/flowplayer/flowplayer.js"></script>';
				$content = '<a href="' . $params['ref'] . '" style="display:block;width:' . $params['width'] . 'px;height:' . $params['height'] . 'px" id="player"></a>';
				$content .= '<script>flowplayer(\'player\', \''.t3lib_extMgm::siteRelpath('rte_myvideo').'flowplayer/flowplayer.swf\');</script>';
			/* END FLOWPLAYER */
			break;
		}
		return $content;
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rte_myvideo/binding/myvideotag/class.tx_rtemyvideo_tsfemyvideotag.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rte_myvideo/binding/myvideotag/class.tx_rtemyvideo_tsfemyvideotag.php']);
}

?>