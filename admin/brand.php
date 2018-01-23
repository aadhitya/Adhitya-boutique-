<?php include 'includes/head_a.php'?>
<?php include 'includes/navg_a.php'?>
<?php include  'Webpages/init.php';?>
<?php 
    $sql = "SELECT * FROM brand  ORDER BY brand";
    $results = $db -> query($sql);
    $errors = array();
    
    // Delete brand
    if(isset($_GET['delete']) && !empty($_GET['delete']))
    {
        $delete_id = (int)$_GET['delete'];
        $delete_id = sanitize($delete_id);                  
       $sql4 = "DELETE FROM brand WHERE id = '$delete_id'";
        $db->query($sql4);
        header('Location: brand.php');
    }
    
    if(isset($_GET['edit']) && !empty($_GET['edit']))
    {
        $edit_id = (int)$_GET['edit'];
        $edit_id = sanitize($edit_id);
        $sql5 = "SELECT * FROM brand WHERE id = ' $edit_id'";
        $edit_result = $db->query($sql5);
        $ebrand = mysqli_fetch_assoc($edit_result);
    }
    
    // if add form is submitted 
    if(isset($_POST['add_submit']))
    {
        $brand = sanitize($_POST['brand']);
        if($_POST['brand'] == '')
        {
            $errors[] .= 'Enter a valid name';
        }
        
        // check if brand exist
        $sql2 = "SELECT * FROM brand WHERE brand ='$brand'";
        $results2 = $db->query($sql2);
        $count = mysqli_num_rows($results2);
        if( $count> 0)
        {
            $errors [] .= $brand .' is already exists';
        }
        
        // display errors
        if(!empty ($errors))
        {
            echo display_errors($errors);
        }
        else
        {
                $sql3 = "INSERT INTO brand (brand) VALUES ('$brand ' )";
                $db->query($sql3);
                header('Location: brand.php');
        
        }        
    }
   
      
?>

<style>
.table-auto
{
	width: auto;
	margin: 0 auto;
}
</style>
<h2 class ="text-center"> Brands</h2><hr>
<!-- Brand Form -->
<div class = "text-center" > 
	<form class = "form-inline" action = "brand.php" <?= ((isset($_GET['edit']))? '?edit ='.$edit_id : '') ;?>method = "post">
		<div class = "form-group">
		<?php if(isset($_GET['edit']))
		{
		    $brand_value = $ebrand['brand'];
		}
		else 
		{
		    if(isset($_POST['brand']))
		    {
		        $brand_value = $_POST['brand'];
		    }
		}
		?>
			<label  for =" brand"> <?= ((isset($_GET['edit'])) ? 'Edit' : 'Add a'); ?>  brand: </label>
			<input type = "text" name ="brand" id = "brand" class = "form-control" value = "<?=((isset($_POST['brand'])) ? $_POST['brand'] : '');?>">
			<?php if(isset($_GET['edit'])) : ?>
				<a href = "brand.php" class = "btn btn-default"> Cancel</a>
			<?php endif; ?>			
			<input type="submit" name = "add_submit" value = "<?=((isset($_GET['edit']))? 'Edit' : 'Add'); ?> brand" class = "btn  btn-success">
		</div>
	</form>
</div>
<hr>
<table class = "table table-bordered table-striped table-auto table-condensed">
	<thead>
		<th></th><th> Brand </th><th></th> 
	</thead>
	<tbody>
	<?php while($brand = mysqli_fetch_assoc($results)) : ?>
		<tr>
			<td><a href = "brand.php?edit=<?= $brand['id']; ?>"  class = "btn btn-xs btn-default"><span class = "glyphicon glyphicon-pencil"></span></a> </td>
			<td> <?= $brand['brand'];  ?></td>
			<td><a href = "brand.php?delete=<?= $brand['id']; ?>"  class = "btn btn-xs btn-default"><span class = "glyphicon glyphicon-remove-sign"></span></a> </td>
		</tr>
	<?php endwhile;?>
	
	</tbody>
</table>

<?php 
    
    function display_errors($errors)
    {
        $display = '<ul class = "bg-danger">';
        foreach ($errors as $error)
        {
            $display .= '<li class = "text-danger">' .$error. ' </li>';
        }
        $display .= '</ul>';
        return $display;
    }

    function sanitize($dirty)
    {
        return htmlentities($dirty, ENT_QUOTES, "UTF-8");
        
    }
?>






















