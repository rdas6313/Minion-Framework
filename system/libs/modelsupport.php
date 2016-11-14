<?php
/**
* model support Class for Main model handel
*/
class modelsupport
{	protected $db_obj;
	function __construct($db_soft,$host,$dbname,$username,$password){
		$this->db_obj = new Database($db_soft,$host,$dbname,$username,$password);
		
	}
	public function sqlquery($sql,$bind=NULL){
		$statement_obj = $this->db_obj->prepare($sql);
		$statement_obj->execute($bind);
		$statement_obj->setFetchMode(PDO::FETCH_ASSOC);
		return $statement_obj->fetchAll();
	}
	/*public function select($table,$cond='1=1',$bind=NULL,$limit=NULL){// This function is for query.
		if(isset($limit)){
			$sql 	= "SELECT * FROM $table WHERE $cond LIMIT $limit";
		}else{
			$sql 	= "SELECT * FROM $table WHERE $cond";	
		}
					
		$statement_obj = $this->db_obj->prepare($sql);
		$statement_obj->execute($bind);
		$statement_obj->setFetchMode(PDO::FETCH_ASSOC);
		return $statement_obj->fetchAll();

	}*/
	public function insert($table,$data){
		$keys 			= array_keys($data);
		$cols 			= implode(',', $keys);
		$vals 			= ':'.implode(',:',$keys);
		$sql  			= "INSERT INTO $table ($cols) VALUES($vals)";
		$statement_obj  = $this->db_obj->prepare($sql);
		$bind 			= array();
		foreach($data as $key => $val){
			$bind[$key]	= $val;
		}
		$statement_obj->execute($bind);
		return $statement_obj->rowCount();
	}
	public function update($table,$data,$cond='1=1',$bind=NULL){ //$table = table name
		$vals='';												 //$data  = data as array
		foreach($data as $key=>$val){							// $cond  = condition of sql
			$vals 	   .= "$key=:$key,";						// $bind = condition binding array like :id=>2
			$bind[$key] = $val;
		}
		$vals= rtrim($vals,',');
		$sql = "UPDATE $table SET $vals WHERE $cond";
		$statement_obj  = $this->db_obj->prepare($sql);
		$statement_obj->execute($bind);
		return $statement_obj->rowCount();
	}
	public function delete($table,$cond='1=1',$bind=NULL,$limit=0){
		$sql = "DELETE FROM $table WHERE $cond";
		if($limit>0)
			 $sql.= " LIMIT $limit";
		$statement_obj  = $this->db_obj->prepare($sql);
		$statement_obj->execute($bind);
		return $statement_obj->rowCount();
	}

}
?>