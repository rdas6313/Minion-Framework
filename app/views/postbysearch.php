		<article class="postcontent">
	<?php
	if(isset($data) && !empty($data)){
		foreach($data as $val){
	?>	
			<div class="post">
				<h3><a href="<?php echo BASE_URL.'/Postcontroller/post/'.$val['id'];?>"><?php echo $val['title'];?></a></h3>
				<?php
				$text = $val['content'];
				if(strlen($text)>250){
					$text=substr($text, 0,250).'</p>';
				}
				echo $text;
				 ?>
				
				<div class="readmore"><a href="<?php echo BASE_URL.'/Postcontroller/post/'.$val['id'];?>">Read More...</a></div>
			</div>
	<?php 
}
	}else{?>
		<div class="post">
			<h3>No Search Result Found !</h3>
		</div>
	<?php	} ?>
		</article>
		
