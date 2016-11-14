<?php
/**
* Session class for session handeling.
*/
class session
{
	public static function init(){
		if(self::get('login') == false)
			session_start();
	}
	public static function set($key,$val){
		$_SESSION[$key]=$val;
	}
	public static function get($key){
		if(isset($_SESSION[$key]))
			return $_SESSION[$key];
		return false;
	}
	public static function destroy(){
		session_destroy();
	}
}