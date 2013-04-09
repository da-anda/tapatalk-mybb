<?php
require_once MYBB_ROOT.$mybb->settings['tapatalk_directory'].'/emoji/emoji.php';
class tapatalkEmoji
{
	static public function covertEmojiToName($data) {   	
    	$data = emoji_docomo_to_unified($data);   # DoCoMo devices
    	$data = emoji_kddi_to_unified($data);     # KDDI & Au devices
    	$data = emoji_softbank_to_unified($data); # Softbank & (iPhone) Apple devices
    	$data = emoji_google_to_unified($data);   # Google Android devices
    	error_log(print_r($data,true),3,"emoji.log");
		$data = emoji_unified_to_name($data);
		$data = emoji_unified_to_key($data);
		//$data = preg_replace('/😀/', "[SMILING FACE WITH OPEN MOUTH]", $data);
		error_log(print_r($data,true),3,"emoji.log");
		return $data;
    }
	static public function covertNameToEmoji($data) {
		$data = emoji_name_to_unified($data);
		//$data = emoji_unified_to_google($data);
		return $data;
	}
	static public function covertNameToEmpty($data) {
		$data = emoji_name_to_empty($data);
		return $data;
	}
	static public function covertUnifiedToEmpty($data) {
		$data = emoji_unified_to_empty($data);
		return $data;
	}	
	static public function covertHtmlToEmoji($data) {
		$data = emoji_html_to_unified($data);
		return $data;
	}
}