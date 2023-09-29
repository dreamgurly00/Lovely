<?php require_once('infrastructure/services/productService.php');?>
<?php include('Assets/partials/header.php');?>


<style>

    .product_img

    {

        background-repeat: no-repeat;

        border-radius: 117px;

        width: 100%;

        height: 550px;

        background-position: left;

        margin-left: 6px;

        margin-top: 10px;

    }

h2

{

    font-size: 67px;

    text-align: right;

}

    .prod_description

    {

        position: absolute;

        font-family: "calibri";

        text-align: right;

        margin-left: 671px;

        margin-top: -376px;

    }

    input.btn.btn-primary {

        background-color: #ccacf0;

        font-family: "Calibri Light";

        color: black;

        border-color: transparent;

        margin-left: 1078px;

    }

    .btn.btn-primary:hover

    {

        background-color: #e71d36;

        transition: transform 0.9s;

    }

    .header_txt

    {

        position: absolute;

        font-family: "Adlery Pro";

        font-size: 20px;

        text-align: right;

        margin-left: 847px;

        margin-top: 52px;

    }



</style>

<?php

 $product_id = $_GET['id'];
$product = $productService->getProduct($product_id);
if ($product)
{
    // Check if the product was added to the cart

    if (isset($_POST['add_to_cart'])) {

        $product_id = $_POST['product_id'];

        if (!isset($_SESSION['cart'])) {

            $_SESSION['cart'] = array();
        }
        $_SESSION['cart'][] = $product;
        $message = $product['name'] . " added to the cart.";
    }

// Retrieve all products from the database

    //$products = $productService->getAllProducts();
	
   ?>

<div class="container">

    <div class="header_txt"> <h2> <?php echo $product->name ?></h2></div>

    <div class="product_img" style="background-image:url(images/<?php echo $product->image?>"> </div>

    <p class="prod_description"> <?php echo $product->description?> </p>

    <hr>

    <p> $<?php echo$product->price?> </p>

    <form id='myform' method='POST' class='quantity' action='cartnew.php'>

        <input type='button' value='-' class='minusInput' field='quantity' />

        <input type='text' name='quantity' value='0' class='qty' />

        <input type='button' value='+' class='plusInput' field='quantity' />

        <!-- Assuming you have a hidden input to store the product_id -->

        <input type='hidden' name='product_id' value='<?php echo $product->id; ?>' />

        <input type="submit" name="add_to_cart"  class="btn btn-primary" value=" Add to Cart">

    </form>

    </div>

    <?php

}

else

{

    echo "Product not found";

}



?>

<script>
        //no negative & fixign the vbtn
        $( document ).ready(function() {
        const plusInput = $('.plus');
        plusInput.on( "click", function() {
        var prodID = $(this).attr("data-val");
        var form = "myform_"+prodID;
        var qty = parseInt( $("#"+form + " .qty").val());
        //$(".qty").val(9);
        $("#"+form + " .qty").val(qty +1);
    } );

        const minusInput= $('.minus');
        minusInput.on("click",function()
    {
        //fixed negative input
        var prodID = $(this).attr("data-val");
        var form = "myform_" +prodID;
        var qtyInput = $("#" + form + " .qty");

        var qty = parseInt(qtyInput.val());
        if (qty > 0) {
        qtyInput.val(qty - 1);
    }

    });

    });


</script>
<?php include('Assets/partials/footer.php');?>