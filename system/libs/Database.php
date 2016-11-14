<?php
/**
* DataBase class for database handel
*/
class Database extends PDO
{
	
	function __construct($db_soft,$host,$dbname,$username,$password){
		$db 		= $db_soft.':host='.$host.';dbname='.$dbname;
		try{
			parent::__construct($db,$username,$password);
		}catch(Exception $e){
			echo '<span style="color:Red">Please Check Your DataBase Software Or Host Or Database Name or Username Or password !</span>';
			die();
		}
	}
}
?>