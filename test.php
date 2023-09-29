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

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart with Images</title>
    <style>
        html
        {
            scroll-behavior: smooth;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        h1
        {
            font-family: "Adlery Pro";
            text-align: center;
            font-size: 90px;
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
    ul
    {
     list-style-type: none;
    }
    li
    {
        list-style-type: none;
        display:inline-block;
    }
        .productimg:hover
    {
        transition: transform 0.2s;
        transform: scale(1.1);
    }
    .addtocartbtn
    {
        background-image: url(Assets/add-to-cartbtn.png);
        background-repeat:no-repeat;
        border: none;
        width: 256px;
        height: 95px;
        margin-left: 260px;
    }
    .productimg
    {

        background-repeat: no-repeat;
        border-radius: 90px;
        width: 490px;
        height: 682px;
        margin: 62px;
    }
        form input[type="submit"] {
            background-color: transparent; /* Set the background to transparent */
            border: none; /* Remove the border (optional) */
            cursor: pointer; /* Show a pointer cursor on hover (optional) */
        }

        /* Apply different styles when the button is being hovered */
        form input[type="submit"]:hover {
            /* Add any custom styles for the hover state here */
        }
        .prodname
        {
            font-family: Arial, Helvetica, sans-serif;
            margin-left: -278px;
        }
        .price
        {
            font-family: Arial, Helvetica, sans-serif;
            margin-left: 416px;
            margin-top: -16px;
            padding-bottom: 47px;
            font-size: 41px;
        }
        .totaltxt
        {
            text-align: right;
        }
    </style>
</head>
<body>
<br>
<h1>Beauty Products</h1>
<h2> header text goes here for aesthetic</h2>
<ul>
    <?php foreach ($products as $product) { ?>
        <li>
            <br>
            <img src="images/<?php echo $product['image']?>" alt="<?php echo $product['name']; ?>" width="100" class="productimg">
            <form method="post" action="" class="formdesign" action="cart.php">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <h2 class = "prodname">
                    <?php echo $product['name']; ?>
                </h2>
                <div class="prodPrice">
                     <div class = "price"> $<?php echo $product['price']; ?></div>

                </div>
                <input type="submit" name="add_to_cart" class="addtocartbtn" value="">
            </form>
        </li>
    <?php } ?>
</ul>

</body>
</html>