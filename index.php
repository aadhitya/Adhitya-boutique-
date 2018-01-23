<?php include 'Webpages/head.php'?>
<?php include 'Webpages/navg.php'?>
<?php include  'Webpages/init.php';?> <?php 
 $db = mysqli_connect('127.0.0.1','root','9849','boutique'); 
 $sql = "SELECT * FROM products WHERE featured = 1";
    $featured = $db->query($sql); ?>
<!-- Header --->
<div id = "headerWrapper"><div id ="logotext"></div></div >
	<!-- left bar  -->
	<div class = "container-fluid" ><div class = "col-lg-2" > </div>
	<!-- main content -->
		<div class = "col-lg-8"><div class = "row">
			<h2 class = "text-center" > Feature Products</h2>
	          <?php while ($product = mysqli_fetch_assoc($featured)) :?>	         
				<div class = "col-lg-3 text-center">				
					<h4><?php echo $product['title'];?></h4>
					<img alt="<?php echo $product['title'];?>" src="<?php echo $product['image'];?>"  style="width:300px;height:300px "/>
					<p class =" list-price text-danger" > List Price: <s> $<?php echo $product['list_price'];?></s></p>
					<p class = "price" > Our Price : $<?php echo $product['price'];?></p>
					<button type = "button" class = "btn btn-sm btn-success" onclick = "detailsmodal(<?= $product['id']; ?>)" > Details</button>	</div>
				<?php endwhile;?></div></div>	<!-- right bar -->		<div class = "col-lg-2"></div></div>
<footer class = "text-center" id = "footer" style=" margin-top: 100px;"> &copy; </footer>
<script >
	jQuery(window).scroll(function(){
				var vscroll = jQuery(this).scrollTop();
				jQuery('#logotext').css({
					"transform" : "translate(0px, "+vscroll/2+"px)"
				});
			});

	function detailsmodal(id)
	{
		var data = {"id" : id};
		jQuery.ajax(
				{
					url: <?= BASEURL;?> + 'Webpages/details.php',
							method: "post" ,
							data : data,
							success: function(data)
							{
								jQuery('body').append(data);
								jQuery('#details-modal').modal('toggle');

								},
							error: function(){
								alert("ERROR");
							}
			});
	}
</script>

</body>
</html>
