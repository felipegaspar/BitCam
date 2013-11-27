<?php

session_start();

$GLOBALS["config"] = array(
	'client_id' => '',
	'client_secret' => '',
	'redirect_uri' => '',
	'token' => ''
);

require_once("class/Info.php");
require_once("class/Curl.php");
require_once("class/Core.php");
require_once("class/Instagram.php");
require_once("function/refresh.php");


if(Info::get('config/token')) {
	$_SESSION["token"] = Info::get('config/token');
	$Instagram = new Instagram(Info::get('config/token'));
} else {
	$Core = new Core();
	if(isset($_SESSION["token"])) {
		$Instagram = new Instagram($_SESSION["token"]);
		echo $Core->getToken();
	} else {
		if(isset($_GET['code'])) {
			$code = $_GET['code'];
			$Core->setToken($code);
			RefreshPage();
		} else {
			RefreshCode();
		}
	}
}




