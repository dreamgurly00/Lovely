<?php
    session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Lovely</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.7.0.min.js"
  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
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
.separator
{
    background-image: url(Assets/Seperator.png);
    height: 780px;
    background-repeat: repeat-y;
    position: absolute;
    width: 19%;
    justify-content: center;
    display: flex;
    overflow: auto;
    margin-left: 1114px;
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

<body>
<?php $totalPrice = 0;?>
<h1> Cart </h1>
 <a href="index.php" class="logo-content"><img src="Assets/Lovely-HeaderLogo.png" class="img-logo"> </a>
<hr>
    <div>
        <div class= "container">
        	<div class="row">
            <div class="col-md-9">
            <?php
    $conn = mysqli_connect('localhost', 'sirmonts_shelayah', 'B^bbl3-23!', 'sirmonts_shelayah');
    if(!$conn){

        die("Connection failed: " . mysqli_connect_error());

    }
    // Check if the product was added to the cart

    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $quantity = (int)$_POST['quantity']; // Convert quantity to integer
        if ($quantity <= 0) {
            // Quantity must be greater than zero, handle invalid input (optional)
            echo "Please enter a valid quantity.";
        } else {
			if (!isset($_SESSION['cart'])) {
				$_SESSION['cart'] = array();
			}

            //check if product already exists in cart
            $existItem = null;
            foreach ($_SESSION['cart'] as $key => $item)
            {
                if($item['id'] == $product_id)
                {
                    $existItem = $key;
                    break;
                }
            }
            // if product exists update quantity
            if ($existItem !== null )
            {
                $_SESSION['cart'][$existItem]['quantity'] += $quantity;
            }
            else {
                // Retrieve the product from the database
                $sql = "SELECT * FROM Lovely_Products WHERE id = $product_id";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $product = mysqli_fetch_assoc($result);
                    //$_SESSION['cart'][] = $product;
                    $product['quantity'] = $quantity;
                    $_SESSION['cart'][] = $product;
                    $message = $product['name'] . " added to the cart.";
                }
            }

		}
    }
    // Check if the product should be removed from the cart
    if (isset($_POST['remove_from_cart']) && isset($_POST['remove_product_id'])) {
        $product_id = $_POST['remove_product_id'];
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $product_id) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
    }
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        foreach ($_SESSION['cart'] as $key => $item) { ?>
          <div class="cart-container">
                     <div class="cart-item">
                         <img src="images/<?php echo $item['image']?>" alt="<?php echo $item['name']; ?>" class="prod_img">
                         <div class="item-details">
                             <span class="item-name"><?php echo $item['name']; ?></span>
                             <span class="item-price">$<?php echo $item['price']; ?></span>
                             <span class="item-qty"> qty: <?php echo $item['quantity']; ?></span>
                         </div>
                         <form method="post" action="">
                             <input type="hidden" name="remove_product_id" value="<?php echo $item['id']; ?>">
                             <input type="submit" name="remove_from_cart" value="Remove">
                         </form>
                     </div>
          </div>
  
           
            <?php
			//save session to DB
            $totalPrice += $item['price']*$item['quantity'];
        }
    } else {
        echo "<p class='isEmpty'> cart is empty</p>";
    } ?>
            </div>
            <div class="col-md-3">
            <!-- Display total price -->

 <p>Total: $<?php echo $totalPrice; ?>
        <br> Subtotal: $<?php echo (($totalPrice*0.07)+$totalPrice) ;?></p>

            </div>
            </div>
        </div> 
    </div>
<?php
if (isset($message)) {
    echo "<p>$message</p>";
}
?>
<!-- JavaScript to handle order button click -->
<script>
    document.getElementById("orderBtn").addEventListener("click", function() {
        alert("Order completed!");
    });
</script>
</body>
</html>



