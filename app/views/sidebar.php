<aside class="sidebar">
			<div class="widget">
				<h3>Category</h3>
					<hr>
				<ul>
			<?php
					foreach($data['catdata'] as $val){
			?>
						<li><a href="<?php echo BASE_URL.'/Postcontroller/cathome/'.$val['id'];?>"><?php echo $val['category'];?></a></li>
			<?php
				}
			?>
				</ul>
			</div>

			<div class="widget">
				<h3>Latest Post</h3>
					<hr>
				<ul>
			<?php
					foreach($data['latestdata'] as $val){
			?>
				<li><a href="<?php echo BASE_URL.'/Postcontroller/post/'.$val['id'];?>"><?php echo $val['title'];?></a></li>
			<?php
				}
			?>
				</ul>
			</div>
		</aside>