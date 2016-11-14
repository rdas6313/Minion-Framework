<?php
/**
* 
*/
class loginmodel extends modelsupport
{
	
	function __construct(){
		$db_soft 	= 'mysql';
		$host    	= 'localhost';
		$dbname  	= 'mini';
		$username	= 'root';
		$password	= '';
		parent::__construct($db_soft,$host,$dbname,$username,$password);
	}
	public function userauth($user,$pass){
		$sql 	= "SELECT * FROM user_table WHERE username=:user AND password=:pass";
		$bind 	= array(':user'=>$user,':pass'=>$pass);
		return $this->sqlquery($sql,$bind);
	}
}
?>