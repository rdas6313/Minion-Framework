<?php
/**
* Catlist Model
*/
class postmodel extends modelsupport
{
	
	function __construct(){
		$db_soft 	= 'mysql';
		$host    	= 'localhost';
		$dbname  	= 'mini';
		$username	= 'root';
		$password	= '';
		parent::__construct($db_soft,$host,$dbname,$username,$password);
	}
	public function getpostbycat($id){
		$table1 = 'table1';
		$table2 = 'table2';
		$sql 	= "SELECT $table1.*,$table2.category FROM $table1 INNER JOIN $table2 ON $table1.cat = $table2.id WHERE $table1.cat = :id";
		$bind   = array(':id'=>$id);
		return $this->sqlquery($sql,$bind);
	}
	public function getallpost(){
		$table1 = 'table1';
		$table2 = 'table2';
		$sql    = "SELECT $table1.*,$table2.category FROM $table1 INNER JOIN $table2 ON $table1.cat=$table2.id";
		return $this->sqlquery($sql);			   //$bind 		   = array(':i'=>'1');
	}
	public function getpostbyid($id){			//Always Bind The Condition value With bind variable..
		$table1 = 'table1';
		$table2 = 'table2';
		$sql 	= "SELECT $table1.*,$table2.category FROM $table1 INNER JOIN $table2 ON $table1.cat = $table2.id WHERE $table1.id = :id";
		$bind   = array(':id'=>$id);
		return $this->sqlquery($sql,$bind);				// like $cond = 'id=:id';
	}
	public function sidebarcat(){
		$table = 'table2';
		$sql   = "SELECT * FROM $table";
		return $this->sqlquery($sql,NULL);	
	}
	public function sidebarlatestpost(){
		$table = 'table1';
		$sql   = "SELECT * FROM $table ORDER BY id DESC LIMIT 4";
		return $this->sqlquery($sql,NULL);	
	}
	public function searchresult($keyword){
		$table1 = 'table1';
		$table2 = 'table2';
		$keyword = "%$keyword%";
		$bind 	= array(':keyword'=>$keyword);
		$sql 	= "SELECT $table1.*,$table2.category FROM $table1 INNER JOIN $table2 ON $table1.cat=$table2.id WHERE $table1.title LIKE :keyword OR $table1.content LIKE :keyword OR $table2.category LIKE :keyword ";
		return $this->sqlquery($sql,$bind);
	}	
}														// $bind = array(':id'=> 2) like that...always do this..but you 

?>