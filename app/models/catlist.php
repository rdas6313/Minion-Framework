<?php
/**
* Catlist Model
*/
class catlist extends modelsupport
{
	
	function __construct(){
		$db_soft 	= 'mysql';
		$host    	= 'localhost';
		$dbname  	= 'mini';
		$username	= 'root';
		$password	= '';
		parent::__construct($db_soft,$host,$dbname,$username,$password);
	}
	public function postcat($id){
		$table1 = 'table1';
		$table2 = 'table2';
		$sql 	= "SELECT $table1.*,$table2.category FROM $table1 INNER JOIN $table2 ON $table1.cat = $table2.id WHERE $table1.cat = :id";
		$bind   = array(':id'=>$id);
		return $this->sqlquery($sql,$bind);
	}
	public function getall($table){
		return $this->select($table);			   //$bind 		   = array(':i'=>'1');
	}
	public function getbyid($table,$cond,$bind=NULL){			//Always Bind The Condition value With bind variable..
		return $this->select($table,$cond,$bind);				// like $cond = 'id=:id';
	}															// $bind = array(':id'=> 2) like that...always do this..but you 
	public function add($data,$table){							//	dont have to bind your data.modulesupport function will 																//	automatically do that...so dont worry..keep using minion.
		return $this->insert($table,$data);
	}
	public function updatebyid($table,$data,$cond,$bind){
		return $this->update($table,$data,$cond,$bind);

	}
	public function delall($table,$cond,$bind,$limit){
		return $this->delete($table);
	}
	public function delbyid($table,$cond,$bind,$limit=1){
		return $this->delete($table,$cond,$bind,$limit);
	}
}

?>