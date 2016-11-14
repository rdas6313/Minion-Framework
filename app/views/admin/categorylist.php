<div class="content">
	<h3><?php echo unserialize(urldecode($msg));?></h3>
	<?php if(isset($data) && !empty($data)){ ?>
	<table class="cat_table">
		<tr>
			<th>Serial</th>
			<th>Category</th>
			<th>Action</th>
		</tr>
		<?php
			$i=1;
			foreach($data as $val){
		?>
		<tr>
			<td><?php echo $i++;?></td>
			<td><?php echo $val['category'];?></td>
			<td><a href="/mini/admin/editcategory/<?php echo $val['id'];?>">Edit</a> || <a onclick="return confirm('Are You Sure !');" href="/mini/admin/delcategory/<?php echo $val['id'];?>">Delete</a></td>
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