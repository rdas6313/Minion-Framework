<?php
/**
* validation class
*/
class validation
{
	
	public static function valid($data,$s_valid=true){
		$data = trim($data);
		if($s_valid){
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			$data = filter_var($data,FILTER_SANITIZE_STRING);
		}
		return $data;
	}
}
?>