<div class="content">
	<h3><?php echo unserialize(urldecode($msg));?></h3>
	<?php if(isset($data) && !empty($data)){ ?>
	<table class="cat_table">
		<tr>
			<th>Serial</th>
			<th>User</th>
			<th>User Name</th>
			<th>Role</th>
			<th>Action</th>
		</tr>
		<?php
			$i=1;
			foreach($data as $val){
		?>
		<tr>
			<td><?php echo $i++;?></td>
			<td><?php echo $val['name'];?></td>
			<td><?php echo $val['username'];?></td>
			<td><?php 
					switch ($val['role']) {
					 	case 1:
					 		echo 'Admin';
					 		break;
					 	case 2:
					 		echo 'Author';
					 		break;
					 	
					 }
				?>
			</td>
			<td><a onclick="return confirm('Are You Sure !');" href="/mini/admin/deluser/<?php echo $val['id'];?>">Delete</a></td>
		</tr>
		<?php
			}
		?>
	</table>
	<?php }else{ ?>
			<h3>No Data Available To Show!</h3>
	<?php }
	?>
</div>