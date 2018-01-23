<?php 
require_once '../Webpages/init.php';
    $id = $_POST['id'];
    $id = (int)$id;
    
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = $db -> query($sql);
    $product = mysqli_fetch_assoc($result);
    $brand_id = $product['brand'];
    $sql2= "SELECT brand  FROM brand WHERE id = '$brand_id'";
    $brand_query = $db -> query($sql2);
    $brand = mysqli_fetch_assoc($brand_query);
    $sizestring = $product['sizes'];
    $size_array = explode(',', $sizestring);
    

?>
<!-- details model -->
<?php ob_start();?>
<div class="modal fade details-1" id = "details-modal" tabindex = "-1" role = "dialog" aria-labelledby = "details-1" aria-hidden = "true">
	<div class = "modal-dialog modal-lg">
	<div class ="modal-content">
		<div class = "modal-header">
			<button class ="close" type = "button" onclick = "closeModal()" aria-label = "Close">
				<span aria-hidden = "true"> &times; </span>
			</button>
			<h4 class = "modal-title text-center"> <?= $product['title'];?></h4>
		</div> 
		<div class = "modal-body">
			<div class = "container-fluid">
				<div class = "row">
					<div class = "col-lg-6">
						<div class = "center-block">
							<img src = " <?= $product['image'];?>" alt = " <?= $product['title'];?>" class = "details img-responsive" style = "width:300px;height:300px ">
						</div>
					</div>
					<div class = "col-lg-6"></div>
						<h4>Details</h4>
						<p><?= $product['description'];?></p>
						<hr>
						<p> <?= $product['price'];?></p>
						<p> <?= $brand['brand'];?></p>
						<form action = "add_cart.php" method="post">
							<div class = "form-group">
								<div class = "col-lg-3">
									<label for = "quantity"> Quantity: </label>
									<input type= "text" class = "form-control" id = "quantity" name = "quantity">								
								</div>		
							</div>
							<div class = "form-group">
								<label for = "size"> Size</label>
								<div class = "col-lg-3">
								<select name ="size" id ="size" class = "form-control">
									<option value = " "></option>
										<?php foreach ($size_array as $string)
										{
										    $string_array = explode(':', $string);
										    $size = $string_array[0];
										    $quantity = $string_array[1];
										    echo '<option value = "' .$size.'">'.$size.' ('.$quantity.' Available )</option>';
										}					    
										    ?>									
								</select> 
							</div>
							</div>
						</form>
					</div>
				 </div>
			</div>
	</div>
	<div class = "modal-footer">
		<button class = "btn btn-default" onclick = "closeModal()"> Close</button>
		<button class = "btn btn-warning" type = "submit"><span class = "glyphicon glyphicon-shopping-cart"> Add TO Cart</span></button>
	</div>
	</div>
</div>
<script >
	function closeModal()
	{
		jQuery('#details-modal').modal('hide');
		setTimeout(function()
				{
					jQuery('#details-modal').remove();
					jQuery('.modal-backdrop').remove();
				}	,500);		

	}
</script>

<?php echo ob_get_clean();?>





