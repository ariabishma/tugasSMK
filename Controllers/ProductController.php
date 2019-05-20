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
		// print_r($all[9]);
		$bsm->Render('home',['data'=>$all]);
	}

	public function edit()
	{
		$find = $this->getById($_GET['id']);
		
		$bsm = new BSM();
		$bsm->Render('editproduct',['data'=>$find]);
	}

	public function deleteHandler()
	{
		$find = $this->getById($_GET['id']);
		$this->delete($find);	
		// $bsm = new BSM();
		// $bsm->Render('editproduct',['data'=>$find]);
		header('location:'.route(""));

	}


	public function store()
	{
		$prod = new Product();
		$prod->name = $_POST['name'];
		$prod->price = $_POST['price'];
		$prod->stock = $_POST['stock'];
		$prod->category = $_POST['category'];
		$prod->isfavorite = true;
		print_r($prod);
		$this->insert($prod);
		header('location:'.route(""));
	}

	public function storeUpdate()
	{
		$prod = new Product();
		$prod->id = $_POST['id'];
		$prod->name = $_POST['name'];
		$prod->price = $_POST['price'];
		$prod->stock = $_POST['stock'];
		$prod->category = $_POST['category'];
		$prod->isfavorite = true;
		print_r($prod);
		$this->update($prod);
		header('location:'.route(""));
	}


	public function manipulate(Product $prod , $state)
	{
		$this->state = $state;
		$db = new DB();

	}
	
	public function insert(Product $prod){
		$db = new DB($prod);
		$r = $db->InsertDAO()->Execute();
		return $r;
	}

	public function update(Product $prod){
		$db = new DB($prod);
		$r = $db->UpdateDAO()->Execute();
		return $r;
	}

	public function delete(Product $prod){
		$db = new DB($prod);
		$r = $db->delete();
		return $r;
	}

	public function getAllProduct(){
		$prod = new Product();

		$db = new DB($prod);
		$r = $db->GetAll();
		return $r;
	}

	public function getById($id){
		$prod = new Product();

		$db = new DB($prod);
		$r = $db->find($id);
		return $r;
	}

	public function getByName($name){

	}
}