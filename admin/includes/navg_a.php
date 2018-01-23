<?php
$db = mysqli_connect('127.0.0.1','root','9849','boutique');
$pquery = $db ->query("SELECT * FROM categories WHERE parent = 0");

?>


<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
		<a href = "index.php" class="navbar-brand"> adhitya's boutique admin</a>
		<ul class= "nav navbar-nav">
			<li><a href = "brand.php"> Brands</a>
		
		
		
		
		
		
		
		
		<?php while ($parent =  mysqli_fetch_assoc($pquery)) :?>
		<?php 
		          $parent_id = $parent['id'];
		          $sql = "SELECT * FROM categories WHERE parent ='$parent_id'";
		          $cquery = $db -> query($sql);
		?>
		<!-- Men's clothes 
			<li class= "dropdown">
				<a href = "#" class="dropdown-toggle" data-toggle = "dropdown"> <?php echo $parent['category'];?><span class = "caret"></span></a>
					<ul class ="dropdown-menu" role="menu">
					<?php while($child = mysqli_fetch_assoc($cquery)) : ?>
					
						<li><a href="#"><?php echo $child['category'];?></a></li>
						<?php endwhile;?>
					</ul>
				</li>
			    <?php endwhile; ?>-->
			</ul>
	</div>
</nav>
