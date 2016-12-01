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
		$this->view('admin/header');
		$this->view('admin/sidebar');

		$this->view('admin/makeuser');
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
			$count = $this->model('adminmodel','deluser',$id);
			if($count>0){
				$msg = 'User Deleted Successfully';
				$msg = urlencode(serialize($msg));
				header('location:/mini/admin/userlist?msg='.$msg);

			}else{
				header('location:/mini/admin/Error');
			}
		}else{
			header('location:/mini/admin/Error');
		}		
	}
}
?>