
<div class="content">
	<table class="table_class">
		<form action="" method="POST">
			<tr>
				<td>Title</td>
				<td><input type="text" name="title" placeholder="Title of the post" style="width:545px;padding:5px;" required="1"></td>
			</tr>
			<tr>
				<td>Category</td>
				<td>
					<select name="cat" style="width:200px;padding:2px;" required="1">
						<option>SELECT ONE</option>
						<?php foreach($data as $val){?>	
						<option value="<?php echo $val['id'];?>"><?php echo $val['category'];?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Content</td>
				<td>
					<textarea name="content" id="content" required="1">
					</textarea>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Add Post"></td>
			</tr>
		</form>
	</table>
</div>
<!--
<script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
-->
<script src="/mini/ckeditor/ckeditor.js"></script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'content' );
</script>