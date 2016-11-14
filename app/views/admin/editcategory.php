<div class="content">
<?php if(isset($data) && !empty($data)){?>
	<table class="table_class">
		<form action="" method="POST">
			<tr>
				<td><input type="text" name="id" value="<?php echo $data[0]['id'];?>" hidden></input></td>
			</tr>
			<tr>
				<td>Category</td>
				<td><input type="text" name="category" value="<?php echo $data[0]['category'];?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Update"></td>
			</tr>
		</form>
	</table>
<?php } ?>
</div>