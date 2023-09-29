<?php require_once('infrastructure/services/productService.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lovely Product Details </title>



</head>

<body>

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

$connection = mysqli_connect('localhost','sirmonts_shelayah', 'B^bbl3-23!', 'sirmonts_shelayah');

if(!$connection) {

    die("Database Connection Failed") . mysqli_error($connection);

}

//getting product ID

if (isset($_GET['id']))

{

    $product_id = $_GET['id'];

}

else

{

    echo 'Product ID not specified';

    exit;

}

$sql = "SELECT *FROM Lovely_Products WHERE id = $product_id";

$result = $connection ->query($sql);

if ($result->num_rows > 0)

{

    $product = $result->fetch_assoc();

    // Check if the product was added to the cart

    if (isset($_POST['add_to_cart'])) {

        $product_id = $_POST['product_id'];

        if (!isset($_SESSION['cart'])) {

            $_SESSION['cart'] = array();

        }

        // Retrieve the product from the database

        $sql = "SELECT * FROM Lovely_Products WHERE id = $product_id";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {

            $product = mysqli_fetch_assoc($result);

            $_SESSION['cart'][] = $product;

            $message = $product['name'] . " added to the cart.";

        }

    }

// Retrieve all products from the database

    $products = array();

    $query = "SELECT * FROM Lovely_Products ORDER BY id ASC";

    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            $products[] = $row;

        }

    }

   ?>

<div class="container">

    <div class="header_txt"> <h2> <?php echo $product['name'] ?></h2></div>

    <div class="product_img" style="background-image:url(images/<?php echo $product['image']?>"> </div>

    <p class="prod_description"> <?php echo $product['description']?> </p>

    <hr>

    <p> $<?php echo$product['price']?> </p>

    <form id='myform' method='POST' class='quantity' action='cart.php'>

        <input type='button' value='-' class='minus' field='quantity' />

        <input type='text' name='quantity' value='0' class='qty' />

        <input type='button' value='+' class='plus' field='quantity' />

        <!-- Assuming you have a hidden input to store the product_id -->

        <input type='hidden' name='product_id' value='<?php echo $product['id']; ?>' />

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

    const quantityInput = document.querySelector('.qty');

    const minusButton = document.querySelector('.minus');

    const plusButton = document.querySelector('.plus');



    // Add event listener for minus button

    minusButton.addEventListener('click', function() {

        let currentValue = parseInt(quantityInput.value);

        if (currentValue > 1) {

            quantityInput.value = currentValue - 1;

        }

    });

    // Add event listener for plus button

    plusButton.addEventListener('click', function() {

        let currentValue = parseInt(quantityInput.value);

        quantityInput.value = currentValue + 1;

    });

</script>

</body>

</html>