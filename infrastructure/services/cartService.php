<?php 
require_once('baseService.php');
require_once('productService.php');
require_once('infrastructure/models/cart.php');
require_once('infrastructure/models/cartItem.php');
require_once('infrastructure/models/productItem.php');
session_start();
ini_set('display_errors', 1); 

class CartService extends ProductService
{
	private $sessionCart = 'cart';
	public function removeItem($productId)
	{
		$this->checkSession();
		foreach ($_SESSION[$this->sessionCart] as $key => $item) {
            if ($item->id == $productId) {
                unset($_SESSION[$this->sessionCart][$key]);
                break;
            }
        }
	}
	public function addItem($productId, $productQuantity) 
	{
		if ($productQuantity <= 0) {
            // Quantity must be greater than zero, handle invalid input (optional)
            return "Please enter a valid quantity.";
        }
		$this->checkSession();
		$existItem = null;
		foreach ($_SESSION[$this->sessionCart] as $key => $item)
		{
			//$product = new ProductItem();
			
			//print_r($item);
			if($item->id == $productId)
			{
				$existItem = $key;
				break;
			}
		}
		  // if product exists update quantity
		if ($existItem !== null )
		{
			 $_SESSION[$this->sessionCart][$existItem]->quantity += $productQuantity;
		}
		else 
		{
			$product = $this->getProduct($productId);
			if ($product) {
				$product->quantity = $productQuantity;
				$_SESSION[$this->sessionCart][] = $product;
				$message = $product->name . " added to the cart.";
			}
		}
	}
	
	public function viewCart()
	{
		$this->checkSession();
		$cart = new Cart();
		$cartItems= array();
        $totalPrice = 0;
        //$this->addItem($productId,($productPrice*$productQuantity));
        foreach ($_SESSION[$this->sessionCart] as $key => $item) 
		{
			$cart = $this->mapProductToModel($item);
            $cart->quantity = $item->quantity;
			$cart->productTotal = $item->price * $item->quantity;
			$totalPrice += $cart->productTotal;
			array_push($cartItems, $cart);
		}
		$cart->subtotal = $totalPrice;
		$cart->total = (($totalPrice*0.07) + $totalPrice);
		$cart->cartItems = $cartItems;
		return $cart;
	}
	public function checkoutItem()
	{
	}
	public function processOrder()
	{
	}
	public function confirmOrder()
	{
	}
    private function mapProductToModel($cartItem)
    {
        $cart = new cartItem();
        $cart->id = $cartItem->id;
        $cart->name = $cartItem->name;
        $cart->price = $cartItem->price;
        $cart->image = $cartItem->image;
        return $cart;
    }
	private function checkSession()
	{
        //print_r($_SESSION[$this->sessionCart]);
		if (!isset($_SESSION[$this->sessionCart])) {
			$_SESSION[$this->sessionCart] = array();
			//echo "notset";
		}
		//$this->session = $_SESSION[$this->sessionCart];
	}
}

$cartService = new CartService();
?>