<?php
interface Product_Interface
{
	public function insert(Product $prod);
	public function update(Product $prod);
	public function delete(Product $prod);
	public function getAllProduct();
	public function getById($cat);
	public function getByName($name);
}