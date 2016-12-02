<div class="content">
	<h3><?php echo unserialize(urldecode($msg));?></h3>
	<table class="table_class">
		<form action="" method="POST">
			<tr>
				<td>Old Password</td>
				<td><input type="password" name="old_pwd" style="padding:5px;width:200px" required="1"></td>
			</tr>
			<tr>
				<td>New Password</td>
				<td><input type="password" name="new_pwd" style="padding:5px;width:200px" required="1"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Change"></td>
			</tr>
		</form>
	</table>
</div>