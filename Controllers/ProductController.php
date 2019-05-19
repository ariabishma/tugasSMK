<?php
require 'Product_Interface.php';
require BASEPATH.'/Models/Product.php';
/**
 *  
 */
class ProductController implements Product_Interface
{

	public $state;
	// public $db;

	// function __construct()
	// {
	// 	$this->db = new DB();
	// }

	public function index()
	{
		$bsm = new BSM();
		$all = $this->getAllProduct();
		$bsm->Render('home',['data'=>$all]);
	}


	public function manipulate(Product $prod , $state)
	{
		$this->state = $state;
		$db = new DB();

	}
	
	public function insert(Product $prod){
		
	}

	public function update(Product $prod){

	}

	public function delete(Product $prod){

	}

	public function getAllProduct(){
		$prod = new Product();

		$db = new DB($prod);
		$r = $db->GetAll();
		return $r;
	}

	public function getById($cat){

	}

	public function getByName($name){

	}
}