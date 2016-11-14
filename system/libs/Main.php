<?php

/**
* Main controller
*/
class Main
{	public $load;
	
	function __construct(){
	}
	function view($name,$call_method=NULL,$data=NULL,$msg=NULL){
		include_once 'app/views/'.$name.'.php';
	}
	function model($name,$method=NULL,$para1=NULL,$para2=NULL,$para3=NULL,$para4=NULL){
		include_once 'app/models/'.$name.'.php';
		$obj = new $name;
		return $obj->$method($para1,$para2,$para3,$para4);
	}
	function validation($name){
		include_once 'app/validation/'.$name.'.php';
		$obj = new $name;
		return $obj;	
	}
}
?>