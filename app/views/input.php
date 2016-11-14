<?php

include_once 'inc/header.php';
if(isset($msg) && !empty($msg)){
	echo $msg;
}
?>
<h4>Input</h4>
<hr>
<table>

	<form action="http://localhost/mini/Index/<?php echo $call_method; ?>" method="POST">
	<?php if(isset($data)){
			foreach($data as $val){
	 ?>
	 	<input type="hidden" name="id" value="<?php echo $val['id'];?>">
		<tr><td>Username :</td><td>
			<input type="text" name="username" required="required" value="<?php echo $val['username'];?>">
		</td></tr><tr>
		<td>First Name :</td><td>
			<input type="text" name="first" required="required" value="<?php echo $val['first'];?>">
		</td></tr><tr>
		<td></td>
		<td>
			<input type="submit" name="submit" value="Enter">
		</td>	
		</tr>
<?php
		}
	}
?>
	</form>
</table>
 



<?php
include_once 'inc/footer.php';
?>