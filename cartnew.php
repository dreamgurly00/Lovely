<?php 
require_once('infrastructure/services/cartService.php');


//$cartService->addItem(6, 5);

if (isset($_POST['add_to_cart'])) {
	$product_id = $_POST['product_id'];
	$quantity = (int)$_POST['quantity'];
	 if ($quantity <= 0) 
	 {
		 echo "Please enter a valid quantity.";
	 }
	else 
	{
		$cartService->addItem($product_id, $quantity);
	}
}
else if (isset($_POST['remove_from_cart']) && isset($_POST['remove_product_id'])) 
{
	 $product_id = $_POST['remove_product_id'];
	 $cartService->removeItem($product_id);
}
$mycart = $cartService->viewCart();
?>

<?php include('Assets/partials/header.php');?>

<style>
h1
{
    font-family: "Adlery Pro";
    display: flex;
    font-size: 120px;
    justify-content: flex-end;
    flex: 10;
    width: 96%;
}
   /* .cart-design {

        background-image: url(Assets/cart.png);

        background-repeat: no-repeat;

        width: 1920px;

        height: 1080px;

        margin-top: -9px;

        margin-left: -10px;

        position: relative;

        z-index: 0;

    } */

    .shipping-info

    {
        margin: 411px;
        margin-left: 241px;
        font-family: calibri;
        font-weight: lighter;
        position:absolute;
        z-index: 1;
    }

    button
    {
        width: 256px;
        height: 73px;
        border: none;
        background-color: inherit;
        margin-left: 1644px;
        margin-top: -103px;
        position: absolute;
        z-index: 2;
    }

    button:hover
    {
        cursor: pointer;
    }

    .product_wrapper .name {

        font-weight:bold;

    }
    .product_wrapper .buy {

        text-transform: uppercase;
        background: #F68B1E;
        border: 1px solid #F68B1E;
        cursor: pointer;
        color: #fff;
        padding: 8px 40px;
        margin-top: 10px;
    }
    .product_wrapper .buy:hover {

        background: #f17e0a;
        border-color: #f17e0a;

    }

    .message_box .box{

        margin: 10px 0px;
        border: 1px solid #2b772e;
        text-align: center;
        font-weight: bold;
        color: #2b772e;

    }

    .table td {

        border-bottom: #F0F0F0 1px solid;
        padding: 10px;

    }



    .cart_div a {

        color:#000;

    }

    .cart_div span {

        font-size: 12px;
        line-height: 14px;
        background: #F68B1E;
        padding: 2px;
        border: 2px solid #fff;
        border-radius: 50%;
        position: absolute;
        top: -1px;
        left: 13px;
        color: #fff;
        width: 20px;
        height: 20px;
        text-align: center;
    }

    .cart .remove {

        background: none;
        border: none;
        color: #0067ab;
        cursor: pointer;
        padding: 0px;

    }

    .cart .remove:hover {

        text-decoration:underline;

    }


 .empty
 {
     position: absolute;
     z-index: 3;
     margin-left: 166px;
     margin-top: 357px;
     padding: 62px;
     font-size: 21px;

 }

  .price-container
  {
      text-align: right;
      position: sticky; /* Stick the total price to the bottom */
      bottom: 0; /* Stick to the bottom */
      background: #fff; /* Add a background color */
      padding: 10px;
      width: 100%;
      box-shadow: 0px -5px 5px rgba(0, 0, 0, 0.1);

  }
  .totaltxt
  {
      font-family: "Calibri Light";
      font-size: 23px;
      text-align: right;
      background-color: #fff;
      padding: 10px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
      margin-top: 10px;
      align-self: flex-end;
  }
  p
  {
      margin-left: 10px;
  }

    .cart-item
    {
        display: flex;
        align-items: center;
        margin-bottom: -11px;
        border: 1px solid #ccc;
        padding: 8px;
        margin-right: 1294px;
        margin-left: 23px;
    }

    .cart-item img {

        max-width: 100px;
        margin-right: 10px;
        border-radius: 10px;

    }

    .cart-item .item-details {

        flex: 1;

    }
    .cart-item .item-name {

        font-weight: bold;

    }
    .cart-item .item-price
    {
        color: #666;
    }
    .cart-item .remove-form {

        margin-left: auto;

    }

.cart-container {
    display: flex;
    aligh-items:right;
    justify-content: right;
   flex-direction: column;
}
   .cart-item {
      
       border: 1px solid #ccc;
       padding: 10px;
       margin: 15px;
   }
.isEmpty
{
    display: flex;
    justify-content: end;
    width: 79%;
    font-size: 24px;
    color: red;
    font-family: calibri;
}
.logo-content
{
    display: flex;
    justify-content: left;
    width: 315px;
    height: 315px;
    margin-top: -140px;
}
.img-logo {
    width: 315px;
    height: 315px;
    display: flex;
    justify-content: left;
    margin-top: -36px;
}
</style>
</head>
<body>
<div class= "container">
    <div class="row">
        <div class="col-md-9">
<?php 
foreach ($mycart->cartItems as $key => $item)
{
?>
                    <div class="cart-container">
                     <div class="cart-item">
                         <img src="images/<?php echo $item->image?>" alt="<?php echo $item->name; ?>" class="prod_img">
                         <div class="item-details">
                             <span class="item-name"><?php echo $item->name; ?></span>
                             <span class="item-price">$<?php echo $item->price; ?></span>
                             <span class="item-qty"> qty: <?php echo $item->quantity; ?></span>
                         </div>
                         <form method="post" action="">
                             <input type="hidden" name="remove_product_id" value="<?php echo $item->id; ?>">
                             <input type="submit" name="remove_from_cart" value="Remove">
                         </form>

        </div>
          </div>
        <?php }?></div>
                <div class="col-md-3">
                    <!-- Display total price -->
                    <p>
                        <?php
                        if($item->productTotal == null)
                            {
                                echo 0;
                            }

                     else
                         {?>
                        Subtotal: $<?php echo  $item->productTotal;?><br>
                        Total: $<?php echo $item->total; ?></p>
                        <?php }
                         ?>

                </div>
    </div>
</div>
           </body>
</html>