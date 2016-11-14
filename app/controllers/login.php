<?php
/**
* admin class for admin work
*/
class login extends Main
{
	public function index(){
		session::init();
		if(session::get('login') == true){
			header('location:/mini/admin/index');
		}
		$this->home();
	}
	public function home(){
		$this->view('login/login');
	}
	public function auth(){
		$user = $_POST['username'];
		$pass = md5($_POST['password']);
		$data = $this->model('loginmodel','userauth',$user,$pass);
		if(empty($data)){
			$msg = "Invalid Username Or Password";
			$this->view('login/login',NULL,NULL,$msg);
		}else{
			session::init();
			session::set('login',true);
			session::set('id',$data[0]['id']);
			session::set('name',$data[0]['name']);
			header('location: /mini/admin/index');
		}
	}
	public function logout(){
		session::init();
		session::destroy();
		header('location:/mini/login/index');
	}
}
?>