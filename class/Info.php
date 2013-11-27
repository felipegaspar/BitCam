<?php

class Info {
	public static function get($local){
		if($local){
			$info = $GLOBALS["config"];
			$local = explode("/",$local);
			foreach($local as $parte){
				if(isset($info[$parte])){
					$info = $info[$parte];
				}
			}
			return $info;
		}
		return false;
	}

}