<?php 
include_once 'inc/header.php';


if(isset($data) && !empty($data)){ 
	/*foreach($data as $key=>$val){
		echo '<h3 style="color:black">'.$key.'-----'.$val.'</h3>';
	}*/
	foreach($data as $key=>$val){
		foreach($val as $k=>$v){
			echo $k.'------'.$v.'</br>';
		}
		if($key==2)
			break;
	}

}else{?>

	<h3 style="color:black">Hello Minion Users.</h3>

<?php	
}

include_once 'inc/footer.php';
?>