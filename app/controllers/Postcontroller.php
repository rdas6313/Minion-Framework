<?php
/**
* Post controller for Post example
*/
class Postcontroller extends Main
{
	
	public function home(){
		$this->view('header');
		$this->view('navbar');
		$data = $this->model('postmodel','getallpost');
		$this->view('Post',NULL,$data);

		$sidebardata['catdata']    = $this->model('postmodel','sidebarcat');
		$sidebardata['latestdata'] = $this->model('postmodel','sidebarlatestpost');
		$this->view('sidebar',NULL,$sidebardata);

		$this->view('footer');
	}
	public function post($id=NULL){
		if(!isset($id) || empty($id))
			header('location: /mini/Postcontroller/home');
		else{
			$this->view('header');
			$this->view('navbar');
			$data = $this->model('postmodel','getpostbyid',$id);
			$this->view('postbyid',NULL,$data);
			$sidebardata['catdata']    = $this->model('postmodel','sidebarcat');
			$sidebardata['latestdata'] = $this->model('postmodel','sidebarlatestpost');
			$this->view('sidebar',NULL,$sidebardata);
			$this->view('footer');
		}
	}
	public function cathome($id=NULL){
		if(!isset($id) || empty($id)){
			header('location: /mini/Postcontroller/home');
		}else{
			$this->view('header');
			$this->view('navbar');
			$data = $this->model('postmodel','getpostbycat',$id);
			//print_r($data);
			$this->view('postbycat',NULL,$data);
			$sidebardata['catdata']    = $this->model('postmodel','sidebarcat');
			$sidebardata['latestdata'] = $this->model('postmodel','sidebarlatestpost');
			$this->view('sidebar',NULL,$sidebardata);
			$this->view('footer');	
		}
	}
	public function search(){
		$keyword = $_POST['search'];
		if(!isset($keyword) || empty($keyword)){
			header('location: /mini/Postcontroller/home');
		}else{
			$this->view('header');
			$this->view('navbar');

			$data = $this->model('postmodel','searchresult',$keyword);
			$this->view('postbysearch',NULL,$data);

			$sidebardata['catdata']    = $this->model('postmodel','sidebarcat');
			$sidebardata['latestdata'] = $this->model('postmodel','sidebarlatestpost');
			$this->view('sidebar',NULL,$sidebardata);

			$this->view('footer');
		}
	}

}
?>