
<div class="content">
	<span style="color:red;font-size:20px;margin-left: 200px;"><?php echo $msg; ?></span>
	<table class="table_class">

		<form action="" method="POST">
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" placeholder="Name of the User" style="width:300px;padding:5px;" required="1"></td>
			</tr>
			<tr>
				<td>User Name</td>
				<td><input type="text" name="username" placeholder="Username of the User" style="width:300px;padding:5px;" required="1"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="pwd" style="width:300px;padding:5px;" required="1"></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<select name="cat" style="width:200px;padding:2px;" required="1">
						<option>SELECT ROLE</option>
						<option value="1">Admin</option>
						<option value="2">Author</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" value="Add User"></td>
			</tr>
		</form>
	</table>
</div>
