<?php

class tx_rtemyvideo_rtetransform {
	var $transformationKey;
	
	function transform_db($value, &$pObj) {
		$imgSplit = $pObj->splitTags('img',$value);
		foreach($imgSplit as $k => $v)	{
			$error = '';
			if ($k%2)	{	// block:
				$attribArray = $pObj->get_tag_attributes_classic($v,1);
				$myVideoTag = '<myvideo type="'.$attribArray['type'].'" thumb="'.$attribArray['src'].'" ref="'.$attribArray['ref'].'" width="'.$attribArray['width'].'" height="'.$attribArray['height'].'"></myvideo>';
				$imgSplit[$k] = $myVideoTag;
			}
		}
		$value = implode('',$imgSplit);
		return $value;
	}
	
	function transform_rte($value, &$pObj) {
		
		$tagSplit = $pObj->splitIntoBlock('myvideo',$value,1);
		foreach($tagSplit as $k => $v)	{
			$error = '';
			if ($k%2)	{	// block:
				$tag = $pObj->getFirstTag($v);
				$attr = $pObj->get_tag_attributes($tag);
				$convertedTag = '<img src="'.$attr[0]['thumb'].'" type="'.$attr[0]['type'].'" ref="'.$attr[0]['ref'].'" width="'.$attr[0]['width'].'" height="'.$attr[0]['height'].'" />';
				$tagSplit[$k] = $convertedTag;	
			}
		}
		$value = implode('',$tagSplit);
		return $value;
	}
}
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rte_myvideo/binding/myvideotag/class.tx_rtemyvideo_rtetransform.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rte_myvideo/binding/myvideotag/class.tx_rtemyvideo_rtetransform.php']);
}
?>