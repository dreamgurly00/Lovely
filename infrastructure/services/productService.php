<?php
require_once('baseService.php');
require_once(__DIR__ .'/../../infrastructure/models/productItem.php');

ini_set('display_errors', 1);
session_start();
class ProductService extends BaseService
{

    public function getProduct($id)
    {
        $product = new ProductItem();
        $sql = "SELECT * FROM Lovely_Products WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        if ($result->num_rows > 0) {
            $productItem = mysqli_fetch_assoc($result);
            $product = $this->mapProductToModel($productItem);

        }

        return $product;
    }

    public function getAllProducts()
    {

        $products = array();
        $sql = "SELECT * FROM Lovely_Products";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($productItem = mysqli_fetch_assoc($result)) {
                $products[] = $this->mapProductToModel($productItem);
            }
        }
        return $products;
    }
    public function addProduct ($product)
    {
        $sql = "INSERT INTO Lovely_Products(name,price,image)";
        $sql .= "VALUES ('$product->name', '$product->price', '$product->image')";
        $result = mysqli_query($this->conn, $sql);
        $this->conn->insert_id;
    }
    public function updateProduct ($product)
    {
        $sql = "UPDATE Lovely_Products SET 
                           name = '$product->name',
                           price = '$product->price',
                           image = '$product->image'
                           WHERE id = $product->id";
        $result = mysqli_query($this->conn, $sql);

    }
    public function deleteProduct($id)
    {
        $sql = "Delete FROM Lovely_Products WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
    }

    private function mapProductToModel($productItem)
    {
        $product = new ProductItem();
        $product->id = $productItem['id'];
        $product->name = $productItem['name'];
        $product->price = $productItem['price'];
        $product->description = $productItem['description'];
        $product->image = $productItem['image'];
        $product->tags = $productItem['tags'];

        return $product;
    }
}

$productService = new ProductService();
$model = $productService->getProduct(9);
$model->price = 3.00;
$productService->updateProduct($model);

/*$model = new ProductItem();
$model->price = 9.00;
$model->name = "New Product";
$model->image = ".jpg";
$productService->addProduct($model);
*/
?>