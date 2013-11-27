<?php

require_once("load.php");

if(isset($_GET["code"])){

	$code = $_GET["code"];
	$fotos = $Instagram->getFromLocation($code);


	foreach($fotos as $foto){
		$info = explode("|",$foto);
		echo '<a href="'.$info[0].'""><img src="'.$info[1].'" width="150" height="150" ></img>';
	}
	
}



?>