<?php
	/**
	* Index Controller
	*/
	class Index extends Main
	{
		
		function __construct(){
		}
		function home(){
			$this->view('Home',NULL);	
		}
		function addcatlist(){
			$data = array();
			$data = $this->model('catlist');
			$this->view('Home',$data);
		}
		function adddata(){
			if(isset($_POST['username']) && isset($_POST['first'])){
				$name  = $_POST['username'];
				$first  = $_POST['first'];
				$data = array(
				'username' => $name,
				'first'    => $first
				);
				$table = 'user';
				if($this->model('catlist','add',$data,$table)>0){
				 	$msg = '<span style="color:green"> Data added SuccessFully</span>';
				}else{
				 	$msg = '<span style="color:green"> Unable To add Data</span>';
				}
				 $this->view('input','adddata',NULL,$msg);
			}else{
				$data = array(array(
				'id'	   =>NULL,	
				'username' => NULL,
				'first'    => NULL
				));
				$this->view('input','adddata',$data);
			}
		}
		function updatedata(){
			if(isset($_POST['username']) && isset($_POST['first'])){
				$name  = $_POST['username'];
				$first  = $_POST['first'];
				$data = array(
				'username' => $name,
				'first'    => $first
				);
				$table = 'user';
				$cond  = 'id=:id';
				$bind  = array(
					':id' => $_POST['id']
					);
				if($this->model('catlist','updatebyid',$table,$data,$cond,$bind)>0){
				 	$msg = '<span style="color:green"> Data Updated SuccessFully</span>';
				}else{
				 	$msg = '<span style="color:green"> Unable To Update Data</span>';
				}
				 $this->view('input','updatedata',NULL,$msg);
			}else{
				$table = 'user';
				$cond  = 'id=:id';
				$bind  = array(
					':id' => 1
					);
				$data = array();
				$data = $this->model('catlist','getbyid',$table,$cond,$bind);
				$this->view('input','updatedata',$data,NULL);
			}
		}
		function deldata(){
			$table = 'user';
			$cond  = 'id=:id';
			$bind  = array(
				':id' => 7
				);
			if($this->model('catlist','delbyid',$table,$cond,$bind)>0){
				$msg = '<span style="color:green"> Successfully Delete Data</span>';
			}else{
				$msg = '<span style="color:green"> Unable To Delete Data</span>';
			}
			$this->view('input','deldata',NULL,$msg);
		}
	}
?>