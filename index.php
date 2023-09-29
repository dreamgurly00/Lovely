
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lovely</title>
</head>
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
.home-content
{
    background-image: url(Assets/home.png);
    background-repeat: no-repeat;
    width: 1920px;
    height: 1444px;
    margin-top: -9px;
    margin-left: -11px;
}
</style>

<body>

<div class="navbar">
    <ul>
            <li>
                <a href="#">home</a>
            </li>
            <li>
                <a href="#">about</a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">products</a>
                <div class="products-dropdown">
                    <a href="#">Best-Selling</a>
                    <a href="#">Skin Care</a>
                    <a href="#">For You</a>
                </div>
            </li>
            <li>
                <a href="shop.php">shop</a>
            </li>
             <li class = "cart">
                    <a href="cart.php"></a>
             </li>
    </ul>
</div>
<div class ="home-page">
    <div class ="home-content"></div>
</div>
<div class="shop-page">
<div class="shop-content"></div>
</div>

</body>
</html>

