<?php
spl_autoload_register(function($class){
	include_once 'system/libs/'.$class.'.php';
});
include_once 'app/lib/supportfile.php';

if(isset($_GET['url'])){
	$url = $_GET['url'];
	$url = filter_var($url,FILTER_SANITIZE_URL);
	$url = trim($url,'/');
	$url = explode('/', $url);
	include_once 'app/controllers/'.$url[0].'.php';
	$obj = new $url[0];
	if(isset($url[1])){
		if(isset($url[2])){
			$obj->$url[1]($url[2]);
		}else{
			$obj->$url[1]();		
		}
	}
	
}else{
	include_once 'app/controllers/Postcontroller.php';
	$obj = new Postcontroller();
	$obj->home();
}

?>