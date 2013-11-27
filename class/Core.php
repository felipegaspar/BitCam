<?php

class Core {

	private $_token,
			$_url = "https://api.instagram.com/oauth/access_token";

	public function setToken($code){
		$info = array(
			'client_id' => Info::get('config/client_id'),
			'client_secret' => Info::get('config/client_secret'),
			'grant_type' => 'authorization_code',
			'redirect_uri' => Info::get('config/redirect_uri'),
			'code' => $code
		);
		$curl = curl_init($this->_url);
		curl_setopt($curl, CURLOPT_POST,true); 
		curl_setopt($curl, CURLOPT_POSTFIELDS,$info); 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($curl);
		curl_close($curl); 
		$arr = json_decode($result,true);
		$_SESSION['token'] = $this->_token = $arr['access_token']; 
	}

	public function getToken(){
		return $this->_token;
	}

}

?>