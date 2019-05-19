<?php
// namespace Bishma\Models;
// use Engine\database\mysql\DB;
/**
 * Model Product
 */
class Product 
{	
	public $id;
	public $name;
	public $price;
	public $stock;
	public $category;
	public $isfavorite;


	// function __construct()
	// {
	// 	$this->id = 1;
	// 	$this->name = "bishma";
	// 	$this->price = 20000;
	// 	$this->stock = 10;
	// 	$this->category = 1;
	// 	$this->isfavorite = 1;
		
	// }


	//setters

	public function setId($id)
	{	
		$this->id=$id;
		return $this;
	}

	public function setName($name)
	{	
		$this->name=$name ;
		return $this;
	}

	public function setPrice($prc)
	{	
		$this->price=$prc ;
		return $this;
	}

	public function setStock($stck)
	{	
		$this->stock=$stck ;
		return $this;
	}
	
	public function setCategory(Category $cat)
	{	
		$this->category=$cat->getName();
		return $this;
	}

	public function setisfavorite($fav)
	{	
		$this->isfavorite=$fav;
		return $this;
	}




	//getters

	public function getId()
	{
		# code...
		return $this->id ;
	}

	public function getName()
	{
		# code...
		return $this->name ;
	}

	public function getPrice()
	{
		# code...
		return $this->price ;
	}

	public function getStock()
	{
		# code...
		return $this->stock ;
	}
	
	public function getCategory()
	{
		# code...
		return $this->category ;
	}

	public function getisfavorite()
	{
		# code...
		return $this->isfavorite ;
	}


	

}