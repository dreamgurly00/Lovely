<?php
//redirect function
function redirect($url)
{
    header ('Location: '.$url);
    exit();
}
//connection to db
$conn = mysqli_connect('localhost', 'sirmonts_shelayah', 'B^bbl3-23!', 'sirmonts_shelayah');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset ($_POST['submit']))
{
    $product_name = $_POST['name'];
    $product_price= $_POST['price'];
    $product_image = mysqli_real_escape_string($conn, $_FILES['image'] ['name']);


    //creating a query for DB
    $query = "INSERT INTO Lovely_Products(name,price,image)";
    $query .= "VALUES ('$product_name', '$product_price', '$product_image')";
    $result = mysqli_query($conn, $query);

    //checking if image is uploaded (name of the DB and not the variable name)
    if (isset ($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK)
    {
        $image_name = $_FILES['image']['name'];
        $image_tmp= $_FILES['image']['tmp_name'];;
        $image_path="images/" . $image_name;
        if (move_uploaded_file($image_tmp, $image_path)) {
            // Image upload successful, save post data to the database
            // ...
        } else {
            // Image upload failed
            echo "Failed to upload image.";
        }
    } else {
        // No image uploaded
        echo "No image selected.";
    }
}
if(isset($_POST['name']) && isset($_POST['price'])) {
    if($result)
    {
        mysqli_close($conn);
        header ("Location: https://shelayah.sirmontsites.com/Lovely_Skincare/test.php");
    }
    else
    {
        die("QUERY FAILED: " . mysqli_error($conn));
    }
    $conn->close();
}
?>
