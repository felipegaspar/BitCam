<?php


function RefreshCode(){
	$link = 'https://api.instagram.com/oauth/authorize/?client_id='.Info::get('config/client_id').'&amp;redirect_uri='.Info::get('config/redirect_uri').'&amp;response_type=code';
	header("location: $link");
}