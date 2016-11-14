<article class="postcontent">
	<div class="post">
	<h3><?php echo $data[0]['title'];?></h3>
	<h4>Category: <a href="<?php echo BASE_URL.'/Postcontroller/cathome/'.$data[0]['cat'];?>"><?php echo $data[0]['category'];?></a></h4>
	<?php echo $data[0]['content'];?>
	</div>
</article>