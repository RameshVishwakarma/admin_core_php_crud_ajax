<?php
include_once("conn.php");
session_start();

if(isset($_GET['id']))
{
	$prod_id = $_GET['id'];
	$sql = "select * from `product` where id='".$prod_id."' and isDeleted='0' ";
	$result = $conn->query($sql);
	$product_data = $result->fetch_assoc();	

	$sql1 = "SELECT * FROM `category` WHERE 1 ";
	$cat_data = $conn->query($sql1);
}

?>
<?php
	include_once("header.php");
?>
<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
	body{
	    margin: 0;
	    font-size: .9rem;
	    font-weight: 400;
	    line-height: 1.6;
	    color: #212529;
	    text-align: left;
	    background-color: #f5f8fa;
	}

	.navbar-laravel
	{
	    box-shadow: 0 2px 4px rgba(0,0,0,.04);
	}

	.navbar-brand , .nav-link, .my-form, .login-form
	{
	    font-family: Raleway, sans-serif;
	}

	.my-form
	{
	    padding-top: 1.5rem;
	    padding-bottom: 1.5rem;
	}

	.my-form .row
	{
	    margin-left: 0;
	    margin-right: 0;
	}

	.login-form
	{
	    padding-top: 1.5rem;
	    padding-bottom: 1.5rem;
	}

	.login-form .row
	{
	    margin-left: 0;
	    margin-right: 0;
	}
</style>
	<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add Product</div>
                        <div class="card-body">
                            <form method="post" action="javascript:void(0);" enctype='multipart/form-data'>
                            	<input type="hidden" id="hidden_prod_id" name="hidden_prod_id" value="<?= $product_data['id'];?>">
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Category Name</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="cat_name" name="cat_name" required="">
                                        	<?php
                                        	
                                        	foreach($cat_data as $val)
											{
												if($val['id']==$product_data['cat_id'])
	                                        	{
	                                        	?>
	                                        		<option value="<?= $val['id']; ?>" selected><?php echo $val['name']; ?></option>
	                                        	<?php	
	                                        	}
	                                        	else
	                                        	{
	                                        	?>
	                                        		<option value="<?= $val['id']; ?>"><?php echo $val['name']; ?></option>
	                                        	<?php
	                                        	}
											?>		
                                        		
                                        	<?php
											}
											?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="prod_name" class="form-control" name="prod_name" value="<?= $product_data['name'];?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Image</label>
                                    <div class="col-md-6">
                                        <input type="file" id="image" class="form-control" name="image" value="<?= $product_data['image'];?>">
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="edit_btnproduct" class="btn btn-primary">
                                    Submit
                                    </button>
                                    <a href="dashboard.php"><button type="button" class="btn btn-primary" style="margin-left: 20% !important;">Back</button></a>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</main>

<?php
	include_once("footer.php");
?>