<?php
/**
* Admin Model For admin
*/
class adminmodel extends modelsupport
{
	
	function __construct(){
		$db_soft 	= 'mysql';
		$host    	= 'localhost';
		$dbname  	= 'mini';
		$username	= 'root';
		$password	= '';
		parent::__construct($db_soft,$host,$dbname,$username,$password);
	}
	public function categoryadd($data){
		$table = 'table2';
		return $this->insert($table,$data);
	}
	public function categorylist(){
		$sql ="SELECT * FROM table2";
		return $this->sqlquery($sql,NULL);
	}
	public function editcatbyid($id){
		$sql ="SELECT * FROM table2 WHERE id=:id";
		$bind = array(':id'=>$id);
		return $this->sqlquery($sql,$bind);	
	}
	public function updatecat($id,$cat){
		$table = "table2";
		$data  = array('category'=>$cat);
		$cond  = 'id=:id';
		$bind  = array(':id'=>$id);
		return $this->update($table,$data,$cond,$bind);
	}
	public function delcat($id){
		$table = 'table2';
		$cond  = 'id=:id';
		$bind  = array(':id' =>$id);
		return $this->delete($table,$cond,$bind);
	}
	public function postlist(){
		$sql = "SELECT table1.*,table2.category FROM table1 INNER JOIN table2 ON table1.cat=table2.id ORDER BY table1.id DESC";
		return $this->sqlquery($sql);
	}
	public function postadd($data){
		$table = 'table1';
		return $this->insert($table,$data);
	}
	public function delpost($id){
		$table = 'table1';
		$cond  = 'id=:id';
		$bind  = array(':id' =>$id);
		return $this->delete($table,$cond,$bind);
	}
	public function editpostbyid($id){
		$table = 'table1';
		$sql   = "SELECT * FROM $table WHERE id=:id";
		$bind  = array(':id'=>$id);
		return $this->sqlquery($sql,$bind);
	}
	public function updatepost($id,$data){
		$table = "table1";
		$cond  = "id=:id";
		$bind  = array(':id'=>$id);
		return $this->update($table,$data,$cond,$bind);
	}
}
?>