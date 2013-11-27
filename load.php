<?php

session_start();

$GLOBALS["config"] = array(
	'client_id' => '',
	'client_secret' => '',
	'redirect_uri' => '',
);

require_once("class/Info.php");
require_once("class/Curl.php");
require_once("class/Core.php");
require_once("class/Instagram.php");
require_once("function/refresh.php");


$Core = new Core();
if(isset($_SESSION["token"])) 
	$Instagram = new Instagram($_SESSION["token"]);
else { 
	if(isset($_GET["code"])) {
		$code = $_GET['code'];
		$Core->setToken($code);
	} else 
		RefreshCode();
}
