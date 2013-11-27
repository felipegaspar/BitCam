<?php

class Curl {

	private static $_instance = null;
	private $_error = false,
			$_errorcode,
			$_result;
	
	public static function getInstance(){
		if(!isset(self::$_instance)) {
			self::$_instance = new Curl();
		}
		return self::$_instance;
	}

	public function set($link) {

		$curl = curl_init($link);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($curl);
		curl_close($curl); 
		$arr = json_decode($result,true);
	
		if($arr["meta"]["code"] != '200') {
			$this->_errorcode = $arr["meta"]["code"];
			$this->_error = true;
		} else {
			$this->_result = $arr;
		}
		
		return $this;

	}

	public function getError(){
		return $this->_error;
	}

	public function getErrorCode(){
		return $this->_errorcode;
	}

	public function getResult(){
		return $this->_result;
	}


}