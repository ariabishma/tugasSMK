<?php
require 'Product_Interface.php';
require BASEPATH.'/Models/Product.php';
/**
 * 
 */
class ProductController implements Product_Interface
{

	public $state

	public function index()
	{
		$bsm = new BSM();
		$bsm->Render('home',['data'=>'nama saya bishma']);
	}


	public function manipulate(Product $prod , $state)
	{
		$this->state = $state;
		
	}
	
	public function insert(Product $prod){
		
	}

	public function update(Product $prod){

	}

	public function delete(Product $prod){

	}

	public function getAllProduct(){
		$prod = new Product();

	}

	public function getById($cat){

	}

	public function getByName($name){

	}
}