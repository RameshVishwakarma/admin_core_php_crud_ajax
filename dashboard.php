<?php
session_start();
include_once("conn.php");

$sql = "SELECT * FROM `product` WHERE `isDeleted`='0' order by id desc";
$result = $conn->query($sql);


?>
<style type="text/css">
	div#datatabe_dashboard {
	    margin-top: 5% !important;
	    width: 92% !important;
	    margin-left: 4% !important;
	}
	div#catgeory_div {
	    margin-left: 4%;
	    margin-top: 2%;
	}		
</style>
<?php
	include_once("header.php");
?>
	<div id="catgeory_div">
		<a href="add_actegory.php"><button type="button">Add Category....</button></a>
		<a href="add_product.php"><button type="button" style=" margin-left: 4%;">Add Product</button></a>
	</div>
	<div id="datatabe_dashboard">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
	        <thead>
	            <tr>
	                <th>Sr.No</th>
	                <th>Product Name</th>
	                <th>Image</th>
	                <th>Category</th>
	                <th>Created_At</th>	                
	                <th>Action</th>	                
	            </tr>
	        </thead>
	        <tbody>
	        	<?php
	        		$i=1;
	        		foreach($result as $val)
	        		{
	        			$sql1 = "SELECT `name` as `cat_name`FROM `category` WHERE id='".$val['cat_id']."' ";
						$result1 = $conn->query($sql1);	
						foreach($result1 as $val2)
						{	
	        	?>
	            <tr>
	                <td><?php echo $i;?></td>
	                <td><?php echo $val['name'];?></td>
	                <td><img src="store_image/<?php echo $val['image'];?>" style="width:30px; height:30px;"></td>
	                <td><?php echo $val2['cat_name'];?></td>
	                <td><?php echo $val['created_at'];?></td>
	                <td>
	                	<a href="edit_product.php?id=<?php echo $val['id'];?>"><button type="button">Edit</button></a>
	                	<a href="delete_product.php?id=<?= $val['id'];?>"><button type="button">Delete</button></a>
	                </td>	                
	            </tr>
	            <?php
	            		}
	            		$i++;
	            	}
	            ?>                      
	        </tbody>
	    </table>
    </div>

<?php
	include_once("footer.php");
?>