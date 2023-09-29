<?php include('Assets/partials/header.php');
 $product_id = $_GET['id'];
 ?>

<div> 
<h1 id = "productName"></h1>
</div>
<script>
 $( document ).ready(function() {
	loadProduct();
    });
	function loadProduct()
	{
		$.ajax({
  method: "GET",
  url: "api/product/?id=<?php echo $product_id?>",
  data: { }
})
  .done(function( msg ) {
	  $('#productName').html(msg.name);
	  console.log(msg);

  });
	} 
</script>

<?php include('Assets/partials/footer.php');?>