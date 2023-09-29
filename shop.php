<?php
session_start();
$conn = mysqli_connect('localhost', 'sirmonts_shelayah', 'B^bbl3-23!', 'sirmonts_shelayah');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check if the product was added to the cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    // Retrieve the product from the database
    $sql = "SELECT * FROM Lovely_Products WHERE id = $product_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        $_SESSION['cart'][] = $product;
        $message = $product['name'] . " added to the cart.";
    }
}
// Retrieve all products from the database
$products = array();
$query = "SELECT * FROM Lovely_Products ORDER BY id ASC";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.7.0.min.js"
  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lovely</title>

</head>

<body>

<style>

/*
    .navbar ul
    {
        list-style-type: none;
        margin-left: 1003px;
        width: auto;
        float: left;
        clear:both;
    }
    .navbar li {
        list-style-type: none;
        padding: 0;
        text-align: center;
        display:inline-block;
    }

    .navbar li a
    {
        font-family: "Calibri Light";
        text-decoration: none;
        font-size: 32px;
        padding: 47px;
        margin-top: 15px;
        float: left;
        color: #000000;
    }
    .dropbtn {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .products-dropdown {
        display: none;
        position: absolute;
        margin-left: 1px;
        margin-top: 125px;
        background-color: #f9f9f9;
        width: 366px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .products-dropdown a {
        color: black;
        padding: 90px 16px;
        margin:25px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .products-dropdown a:hover
    {
        background-color: #f1f1f1;
        width:  200px;
    }

    .dropdown:hover .products-dropdown {
        display: block;
    }
	*/
    .cart
    {
        background-image: url(Assets/cart-icon.png);
        background-repeat: no-repeat;
        width: 50px;
        height: 50px;
        margin-left: 61px;
        margin-top: 56px;
        float: right;

    }
    .navbar li a:hover
    {
        text-decoration-line: underline;
        text-decoration-thickness: 2px;
        color: #e71d36;
    }
button.btn.btn-primary
{
    background-color: #e6d8ff;
    color: black;
}

    html
    {
        scroll-behavior: smooth;
    }

    table
    {
        border-collapse: collapse;
        width: 100%;
    }
    h1
    {
        font-family: "Adlery Pro";
        text-align: center;
        font-size: 90px;
        margin-top: 45px;
    }

    h2
    {
        font-family: "Calibri Light";
        text-align:center;
        text-decoration: none;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 8px;
    }

    .shop-list

    {
        list-style-type: none;
    }
    .shop-list li
    {
        list-style-type: none;
        display:inline-block;
		width:33%;
		border: 1px solid black;
		padding: 14px;
    }

    .productimg:hover

    {
        transition: transform 0.5s;
        transform: scale(1.1);
    }


    .productimg

    {
        background-repeat: no-repeat;
        border-radius: 36px;
        width: 100%;
		height: 400px;
    	background-position: center;
		cursor:pointer;

    }


    form input[type="submit"]:hover {

        /* Add any custom styles for the hover state here */
    }
    .prodname
    {
        font-family: Arial, Helvetica, sans-serif;
		font-size: 24px;
        margin-top: 32px;
    }
    .price
    {
        font-family: "Calibri Light";
        margin-top: -16px;
        padding-bottom: 11px;
        text-align: right;
        font-size: 41px;
    }
input.btn.btn-primary {
    background-color: #ccacf0;
    font-family: "Calibri Light";
    color: black;
    border-color: transparent;
    margin-left: 283px;
}
.btn.btn-primary:hover
{
    background-color: #e71d36;
    
}
p
{
    margin-top: 0;
    margin-bottom: 1rem;
    font-weight: lighter;
}
a
{
    text-decoration: none;
    color:black;
}
.qty {
    text-align: center;
    padding: 5px;
    width:15%;
    border: 1px dotted #ccc;
    margin: 2%;
}
.minus, .plus
{
    background-color: #e4cfff;
    border:none;
}
.minus:hover
{
    background-color: #e71d36;
}
.plus:hover
{
    background-color: #e71d36;
}

</style>
<div class="shop-page">
    <div class="shop-content"></div>
    <br>
<div class="container">
 <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="Assets/Lovely-HeaderLogo.png" height="500" width="500"> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="news.php">about</a>
        </li>
       
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            products
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Best-Selling</a></li>
            <li><a class="dropdown-item" href="#">Skin Care</a></li>
            <li><a class="dropdown-item" href="#">For You</a></li>
          </ul>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="shop.php">Shop</a>
        </li>
           <li class="nav-item">
          <a class="nav-link" href="cartnew.php"><img src="Assets/cart-icon.png" width="50" height="50"></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <!-- Content here -->
    <h1>Beauty Products</h1>
    <h2> header text goes here for aesthetic</h2>
    <ul class ="shop-list">
        <?php foreach ($products as $product) {
            $product_description = substr($product['description'], 0, 50)?>
            <li>
                <br>
                <a href="detailsWService.php?id=<?php echo $product['id']?>"> <div class="productimg" style="background-image:url(images/<?php echo $product['image']?>)">
</div></a>
                <!--<img src="" alt="<?php echo $product['name']; ?>" width="100" class="productimg">-->
                <form class="add-to-cart-form" method="post" id='myform_<?php echo $product['id']?>' action="cartnew.php">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <h2 class = "prodname">
                       <a href="details.php?id=<?php echo $product['id']?>">  <?php echo $product['name']; ?></a>
                    </h2>
                    <hr>
                    <div class="prodPrice">
                        <div class = "price"> $<?php echo $product['price']; ?></div>
                        <p><?php echo $product_description?></p>
                         
                            <input type='button' value='-' data-val="<?php echo $product['id']?>"class='minus' field='quantity' />
                            <input type='text' name='quantity' value='1' class='qty' />
                            <input type='button' value='+' data-val="<?php echo $product['id']?>" class='plus' field='quantity' />

                             <input type='hidden' name='product_id' value='<?php echo $product['id']; ?>' />
                              <input type='submit' name='add_to_cart'class="btn btn-primary value='add_to_cart' />
                             <input onclick="addToCart('<?php echo $product['id']?>')" name="add_to_cart"  " value=" Add to Cart">
                    
</div>
                </form>
            </li>
        <?php } ?>
    </ul>
</div>
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
	
//combine cart items

        function addToCart(prodID) {
            const form = document.getElementById('myform_' + prodID);
            const formData = new FormData(form);

            // Send the form data using AJAX
            const request = new XMLHttpRequest();
            request.open('POST', 'cartnew.php');
            request.onreadystatechange = function() {
                if (request.readyState === XMLHttpRequest.DONE && request.status === 200) {
               
                }
            };
            request.send(formData);
        }
    </script>
    </body>
    </html>
<?php
