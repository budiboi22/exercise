<?php

class Cart 
{
	public $cartItems = [];

	public function __construct(){}

	public function addProduct($productName, $qty)
	{
		$this->cartItems[$productName] = array_key_exists($productName, $this->cartItems) ? $this->cartItems[$productName] + $qty : $qty;
	}

	public function removeProduct($productName)
	{
		unset($this->cartItems[$productName]);
	}

	public function showCart()
	{
		$output = '';

		foreach($this->cartItems as $key => $val){
			$output .= $key. '(' . $val . ')<br>';
		}

		return $output;
	}
}


$cart = new Cart();
$cart->addProduct("Baju Merah Mantap", 1);
$cart->addProduct("Baju Merah Mantap", 1);
$cart->addProduct("Bukuku", 3);
$cart->removeProduct("Bukuku");
$cart->addProduct("Singlet Hijau", 1);
$cart->removeProduct("ProdukBohongan");
$cart->showCart();
echo $cart->showCart();

?>