<?php

/**
 * 
 */
class Category
{ 
	public $id;
	public $name;	

	// function __construct(argument)
	// {
	// 	$this->id = 1;
	// 	$this->name ="makanan";
	// }

	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}


	public function getId($id)
	{
		return $this->id = $id;
	}
	public function getName($name)
	{
		return $this->name = $name;
	}
}