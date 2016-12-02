<?php
/**
* admin class for admin work
*/
class admin extends Main
{
	public function __construct(){
		session::init();
		if(session::get('login') == false){
			header('location:/mini/login/index');
		}
	}
	public function index(){
		$this->view('admin/header');
		$this->view('admin/sidebar');
		$this->view('admin/home');
		$this->view('admin/footer');
	}
	public function addcategory(){
		if(isset($_POST['category']) && !empty($_POST['category'])){
			$cat   = validation::valid($_POST['category']);
			$data  = array('category' => $cat);
			$count = $this->model('adminmodel','categoryadd',$data);
			if($count>0){
				$msg = 'Category Added Successfully';
				$msg = urlencode(serialize($msg));
				header('location:/mini/admin/categorylist?msg='.$msg);
			}
		}
		$this->view('admin/header');
		$this->view('admin/sidebar');
		$this->view('admin/addcategory');
		$this->view('admin/footer');
	}
	public function categorylist(){
		$msg = NULL;
		if(isset($_GET['msg']) && !empty($_GET['msg']))
			$msg = $_GET['msg'];
		$this->view('admin/header');
		$this->view('admin/sidebar');
		$data = $this->model('adminmodel','categorylist');
		$this->view('admin/categorylist',NULL,$data,$msg);
		$this->view('admin/footer');
	}
	public function editcategory($id=NULL){
		if(isset($_POST['category']) && !empty($_POST['category'])){
			$id  	= $_POST['id'];
			$cat 	= validation::valid($_POST['category']);
			$count  = $this->model('adminmodel','updatecat',$id,$cat);
			if($count>0){
				$msg = 'Category updated Successfully';
				$msg = urlencode(serialize($msg));
				header('location:/mini/admin/categorylist?msg='.$msg);
			}else
				$id = NULL;
		}
		$this->view('admin/header');
		$this->view('admin/sidebar');
		$data = $this->model('adminmodel','editcatbyid',$id);
		if(!empty($data))
			$this->view('admin/editcategory',NULL,$data);
		else
			$this->view('admin/404');
		
		$this->view('admin/footer');
	}
	public function delcategory($id=NULL){
		if($id!=NULL){
			$count = $this->model('adminmodel','delcat',$id);
			if($count>0){
				$msg = 'Category Deleted Successfully';
				$msg = urlencode(serialize($msg));
				header('location:/mini/admin/categorylist?msg='.$msg);	
			}else{
				header('location:/mini/admin/Error');
			}
		}else{
			header('location:/mini/admin/Error');
		}
			
		
	}
	public function addpost(){
		if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['cat']) && !empty($_POST['cat']) && isset($_POST['content']) && !empty($_POST['content'])){
			$title 		= validation::valid($_POST['title']);
			$cat   		= $_POST['cat'];
			$content 	= validation::valid($_POST['content'],false);
			$data 		= array('title'=>$title,'cat'=>$cat,'content'=>$content);
			$count 		= $this->model('adminmodel','postadd',$data);
			if($count > 0){
				$msg = 'Post Added Successfully';
				$msg = urlencode(serialize($msg));
				header('location:/mini/admin/postlist?msg='.$msg);	
			}
		}
		$this->view('admin/header');
		$this->view('admin/sidebar');
		$data = $this->model('adminmodel','categorylist');
		$this->view('admin/addpost',NULL,$data);
		$this->view('admin/footer');
	}
	public function postlist($msg = NULL){
		if($msg!=NULL)
			header('location: /mini/admin/Error');
		if(isset($_GET['msg']) && !empty($_GET['msg']))
			$msg = $_GET['msg'];
		$this->view('admin/header');
		$this->view('admin/sidebar');
		$data = $this->model('adminmodel','postlist');
		$this->view('admin/postlist',NULL,$data,$msg);
		$this->view('admin/footer');	
	}
	public function Error($msg=NULL){
		if($msg!=NULL)
			header('location: /mini/admin/Error');
		$this->view('admin/header');
		$this->view('admin/sidebar');
		$this->view('admin/404');
		$this->view('admin/footer');
		
	}
	public function delpost($id=NULL){
		if($id!=NULL){
			$count = $this->model('adminmodel','delpost',$id);
			if($count>0){
				$msg = 'Post Deleted Successfully';
				$msg = urlencode(serialize($msg));
				header('location:/mini/admin/postlist?msg='.$msg);

			}else{
				header('location:/mini/admin/Error');
			}
		}else{
			header('location:/mini/admin/Error');
		}		
	}
	public function editpost($id=NULL){ 
		if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['cat']) && !empty($_POST['cat']) && isset($_POST['content']) && !empty($_POST['content'])){
			$id         = $_POST['id'];
			$title 		= validation::valid($_POST['title']);
			$cat   		= $_POST['cat'];
			$content 	= $_POST['content'];
			$data 		= array('title'=>$title,'cat'=>$cat,'content'=>$content);
			$count  	= $this->model('adminmodel','updatepost',$id,$data);
			if($count>0){
				$msg = 'Post updated Successfully';
				$msg = urlencode(serialize($msg));
				header('location:/mini/admin/postlist?msg='.$msg);
			}else{
				$msg = 'Post Already updated';
				$msg = urlencode(serialize($msg));
				header('location:/mini/admin/postlist?msg='.$msg);
			}
		}else{
			$this->view('admin/header');
			$this->view('admin/sidebar');
			$data = array();
			$data['post_details'] = $this->model('adminmodel','editpostbyid',$id);
			$data['cat_details'] = $this->model('adminmodel','categorylist');
			if(!empty($data['post_details']))
				$this->view('admin/editpost',NULL,$data);
			else
				$this->view('admin/404');
			
			$this->view('admin/footer');
		}
	}
	public function makeuser(){
		$msg = NULL;
		if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['pwd']) && isset($_POST['cat'])){
			if(!empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['pwd']) && $_POST['cat']>0){
				$name 		= validation::valid($_POST['name']);
				$uname 		= validation::valid($_POST['username']);
				$pwd		= validation::valid($_POST['pwd'],false);
				$role 		= validation::valid($_POST['cat'],false);
				$pwd 		= md5($pwd);
				$data 		= array('username'=>$uname,'password'=>$pwd,'name'=>$name,'role'=>$role);
				$count 		= $this->model('adminmodel','makeuser',$data);
				if($count > 0){
					$msg = 'User Added Successfully';
					$msg = urlencode(serialize($msg));
					header('location:/mini/admin/userlist?msg='.$msg);	
				}

			}else{
				$msg = "You Must Fill all the Field";
			}
			
		}
		$this->view('admin/header');
		$this->view('admin/sidebar');

		$this->view('admin/makeuser',NULL,NULL,$msg);
		$this->view('admin/footer');
	}
	public function userlist(){
		$msg=NULL;
		if(isset($_GET['msg']) && !empty($_GET['msg']))
			$msg = $_GET['msg'];
		$this->view('admin/header');
		$this->view('admin/sidebar');
		$data = $this->model('adminmodel','userlist');
		$this->view('admin/userlist',NULL,$data,$msg);
		$this->view('admin/footer');
	}
	public function deluser($id=NULL){
		if($id!=NULL){
			session::init();
			if($id==session::get('id')){
				$msg = 'Can\'t Delete The Active User.';
				$msg = urlencode(serialize($msg));
				header('location:/mini/admin/userlist?msg='.$msg);
			}else{
				$count = $this->model('adminmodel','deluser',$id);
				if($count>0){
					$msg = 'User Deleted Successfully';
					$msg = urlencode(serialize($msg));
					header('location:/mini/admin/userlist?msg='.$msg);

				}else{
					header('location:/mini/admin/Error');
				}
			}
		}else{
			header('location:/mini/admin/Error');
		}		
	}
	public function changepassword(){
		$msg = NULL;
		if(isset($_POST['old_pwd']) && isset($_POST['new_pwd'])){
			$old  		= md5($_POST['old_pwd']);
			$old_msg 	= validation::length($_POST['old_pwd']); 
			$new  		= md5($_POST['new_pwd']);
			$new_msg 	= validation::length($_POST['new_pwd']);
			$data = $this->model('adminmodel','mypassword');
			if($old_msg!=NULL || $new_msg!=NULL){
				if($old_msg)
					$msg 	= urlencode(serialize("Old Password ".$old_msg));
				else
					$msg 	= urlencode(serialize("New Password ".$new_msg));
			}
			else if($old==$data[0]['password']){
				if($old!=$new){
					$count = $this->model('adminmodel','newpassword',$new);
					if($count>0){
						$msg = "<span style=\"color:green;font-size:20px\">Password Changed Successfully</span>";
						$msg = urlencode(serialize($msg));
					}else{
						$msg = "Unable To Change Password";
						$msg = urlencode(serialize($msg));
					}
				}else{
					$msg = "Same Password Not <span style=\"color:red;font-size:20px\">Allowed</span>";
					$msg = urlencode(serialize($msg));
				}
			}else{
				$msg = "<span style=\"color:red;font-size:20px;\">Invalid Current Account Password</span>";
				$msg = urlencode(serialize($msg));
			}
		}
		$this->view('admin/header');
		$this->view('admin/sidebar');
		$this->view('admin/changepassword',NULL,NULL,$msg);
		$this->view('admin/footer');
	}
}
?>