<?php
/**
* validation class for form validation
*/
class validation
{
	public $value  = array();
	public $errors = array();
	public $current_key;
	function __construct(){}
	public function init($key){
		if(isset($_POST[$key]))
			$data = $_POST[$key];
		else
			$data = NULL;
		$data			    = trim($data);
		$this->value[$key]  = $data;
		$this->current_key  = $key;
		return $this;
	}
	public function textfield_valid(){
		$data  								= $this->value[$this->current_key];
		$data			    				= htmlspecialchars($data);
		$data 								= filter_var($data,FILTER_SANITIZE_STRING);
		$this->value[$this->current_key]    = $data;
		return $this;
	}
	public function isempty(){
		if(empty($this->value[$this->current_key])){
			$this->errors['empty'] = "<span style="color:red;font-size:20px;padding:5px;">Field Should Not Be Empty.</span>";
			return true;
		}
		return false;
	}
	public function length($min=10,$max=250){
		if(strlen($this->value[$this->current_key])<$min || strlen($this->value[$this->current_key])>$max){
			$this->errors['length'] = "<span style="color:red;font-size:20px;padding:5px;">Minimum lenth should be $min And maximum length should be $max.</span>";
			return true;
		}
		return false;
	}
	public function checkvalid(){
		if(!$this->isempty()){
			if(!$this->length())
				return true;
			return false;
		}
		return false;
	} 
}
?>