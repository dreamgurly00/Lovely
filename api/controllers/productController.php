<?php
ini_set('display_errors', 1);
require_once(__DIR__ .'/../../infrastructure/services/productService.php');
class productController
{
    private $request;
    private $productService;
    public function __construct()
    {
        $this->request = $_REQUEST;
        $this->productService = new ProductService();
		
    }

    public function init ()
    {
		$request = $_SERVER['REQUEST_URI'];
		$routes = explode('/',$request);
		$actions = '';
		if(isset($routes[4]))
		{
			$action = $routes[4]; //4th item in array is action
			$action = strtolower($action);
		}
        $method = $_SERVER['REQUEST_METHOD'];
        switch($method)
        {
            case "POST":
                $this->updateProduct();
                break;
            case "PUT":
                $this->createProduct();
                break;

            case "DELETE":
                $this->deleteProduct();
                break;

            default:
                
				if($action == "list")
				{
					$this->getAllProducts();
				}
				else
				{
					$this->getProduct();
				}
                break;
        }
    }
    public function updateProduct()
    {
        $json = file_get_contents('php://input');
        $model = json_decode($json);
        $response = $this->productService->updateProduct();
        echo json_encode($response);
    }
    public function createProduct()
    {
        $json = file_get_contents('php://input');
        $model = json_decode($json);
        $response = $this->productService->addProduct();
        echo json_encode($response);
        echo "create";

    }

    public function deleteProduct()
    {
        if(isset($this->request['id']))
        {
            $id = $this->request['id'];
        $response = $this->productService->deleteProduct();
            if($response!= null)
            {
                header('Content-Type: application/json');
                echo(json_encode($response));
            }
            else
            {
                echo "Product not found";
            }

        }
        else
        {
            echo "invalid";
        }

    }

    public function getProduct()
    {
		if(isset($this->request['id']))
		{
			$id = $this->request['id'];
			$response=$this->productService->getProduct($id);
			if($response->id != null)
			{
				header('Content-Type: application/json');
				echo(json_encode($response));
			}
			else 
			{
				echo "product not found";
			}
			

		}
		else 
		{
			echo "invalid";
		}
		
       


    }
	public function getAllProducts()
	{
		$response=$this->productService->getAllProducts();
		header('Content-Type: application/json');
		echo(json_encode($response));
	}


}

$controller = new productController();

$controller->init();



?>