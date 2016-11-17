<div class="content">
	<h3><?php echo unserialize(urldecode($msg));?></h3>
	<table id="datatable" class="display" data-order='[[ 0, "asc" ]]' data-page-length='2'>
		<thead>
			<tr>
				<th>Serial</th>
				<th>Title</th>
				<th>Content</th>
				<th>Category</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i = 1; 
				foreach($data as $val){
			?>
				<tr>
					<td width="5%" style="text-align: center;"><?php echo $i++; ?></td>
					<td width="30%" style="text-align: center;"><?php echo $val['title']; ?></td>
					<td width="20%" style="text-align: center;"><?php
					 	$text = $val['content']; 
					 	if(strlen($text) > 50){
					 		$stop = strpos($text, ' ',20);
					 		$text = substr($text, 0,$stop);
					 	}
					 	echo $text;
					 ?></td>
					<td width="15%" style="text-align: center;"><?php echo $val['category']; ?></td>
					<td width="25%" style="text-align: center;"><a href="/mini/admin/editpost/<?php echo $val['id'];?>" style="text-decoration: none;">Edit</a> || <a onclick="return confirm('Are You Sure!');"href="/mini/admin/delpost/<?php echo $val['id'];?>" style="text-decoration: none;">Delete</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
<script>
	$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
