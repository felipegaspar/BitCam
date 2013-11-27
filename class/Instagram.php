<?php 

class Instagram {

		private $_valid = false,
				$_token;

		public function __construct($token){
			$this->_token = $token;
		}

		public function getUsername(){
			$url = 'https://api.instagram.com/v1/users/self/?access_token='.$this->_token;
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			$result = curl_exec($curl);
			curl_close($curl); 
			$arr = json_decode($result,true);
			return $arr["data"]["username"];
		}

		public function getLocation($cood = array()){
			$url = 'https://api.instagram.com/v1/locations/search?lat='.$cood["latitude"].'&lng='.$cood["longitude"].'&access_token='.$this->_token;
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			$result = curl_exec($curl);
			curl_close($curl); 
			$arr = json_decode($result,true);
			$lugares = array();
			$s = 1;
			for($k=0;$k<count($arr["data"]);$k++){
				$lugares[$k] = $arr["data"][$k]["name"].'|'.$arr["data"][$k]["latitude"].'|'.$arr["data"][$k]["longitude"].'|'.$arr["data"][$k]["id"];  
			}	

			//die(var_dump($lugares));
			return $lugares;
		}

		public function getFromLocation($code){
			$url = 'https://api.instagram.com/v1/locations/'.$code.'/media/recent?access_token='.$this->_token;
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			$result = curl_exec($curl);
			curl_close($curl); 
			$info = array();
			$local = json_decode($result,true);
			$totaldata = count($local["data"]);
			$d = 0;
			for($k=0;$k<$totaldata;$k++){
				$info[$d++] = $local["data"][$k]["link"].'|'.$local["data"][$k]["images"]["standard_resolution"]["url"];
			}
			return $info;
		}

}