<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
	} );
</script>

<script type="text/javascript">

var form_data_category = new FormData();

$("#btncategory").click(function(){
	var cat_name = $("#cat_name").val();
	var image = $('#image').prop('files')[0]; 
	var image_data = $('#image').val();

	form_data_category.append('cat_name', cat_name);
	form_data_category.append('image', image);

	$.ajax({
			type:"POST",
			url:"category_action.php",
			data:form_data_category,
			cache: false,
            contentType: false,
            processData: false,	
            success:function(res)
            {
            	if(res==1)
            	{
            		alert("Data inserted successfully");
            		window.location.reload();
            	}
            }
	});
});

</script>
<script type="text/javascript">

var form_data_product = new FormData();

$("#btnproduct").click(function(){
	var cat_name = $("#cat_name").val();
	var prod_name = $("#prod_name").val();
	var image = $('#image').prop('files')[0]; 
	var image_data = $('#image').val();

	form_data_product.append('cat_name', cat_name);
	form_data_product.append('prod_name', prod_name);
	form_data_product.append('image', image);

	$.ajax({
			type:"POST",
			url:"product_action.php",
			data:form_data_product,
			cache: false,
            contentType: false,
            processData: false,	
            success:function(res)
            {
            	if(res==1)
            	{
            		alert("Data inserted successfully");
            		window.location.reload();
            	}
            }
	});
});

</script>

<script type="text/javascript">

var form_data_editproduct = new FormData();

$("#edit_btnproduct").click(function(){
	var hidden_prod_id = $("#hidden_prod_id").val();
	var cat_id = $("#cat_name").val();
	var prod_name = $("#prod_name").val();
	var image = $('#image').prop('files')[0]; 
	var image_data = $('#image').val();

	form_data_editproduct.append('hidden_prod_id', hidden_prod_id);
	form_data_editproduct.append('cat_id', cat_id);
	form_data_editproduct.append('prod_name', prod_name);
	form_data_editproduct.append('image', image);

	$.ajax({
			type:"POST",
			url:"editproduct_action.php",
			data:form_data_editproduct,
			cache: false,
            contentType: false,
            processData: false,	
            success:function(res)
            {
            	if(res==1)
            	{
            		alert("Data updated successfully");
            		window.location.reload();
            	}
            }
	});
});

</script>
</body>
</html>