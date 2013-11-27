<?php 

class Instagram {

		private $_valid = false,
				$_error = false,
				$_token;

		public function __construct($token) {

			$this->_token = $token;
		}

		public function getUsername() {

			$url = 'https://api.instagram.com/v1/users/self/?access_token='.$this->_token;
			$curl = Curl::getInstance()->set($url);
			if(!$curl->getError()) {
				$info = $curl->getResult();
			} else {
				die('Erro '.$curl->getErrorCode());
			}
			return $info["data"]["username"];
		}

		public function getLocation($cood = array()) {

			$url = 'https://api.instagram.com/v1/locations/search?lat='.$cood["latitude"].'&lng='.$cood["longitude"].'&access_token='.$this->_token;
			$curl = Curl::getInstance()->set($url);
			if(!$curl->getError()) {
				$arr = $curl->getResult();
			} else {
				die('Erro '.$curl->getErrorCode());
			}
			$lugares = array();
			for($k=0;$k<count($arr["data"]);$k++){
				$lugares[$k] = $arr["data"][$k]["name"].'|'.$arr["data"][$k]["latitude"].'|'.$arr["data"][$k]["longitude"].'|'.$arr["data"][$k]["id"];  
			}	
			return $lugares;
		}

		public function getFromLocation($code) {

			$url = 'https://api.instagram.com/v1/locations/'.$code.'/media/recent?access_token='.$this->_token;
			$curl = Curl::getInstance()->set($url);
			if(!$curl->getError()) {
				$local = $curl->getResult();
			} else {
				die('Erro '.$curl->getErrorCode());
			}
			$info = array();
			for($k=0;$k<count($local["data"]);$k++){
				$info[$k] = $local["data"][$k]["link"].'|'.$local["data"][$k]["images"]["standard_resolution"]["url"];
			}
			return $info;
		}

	
}