<?php
interface Category_Interface{
	public function insert(Category $c);
	public function update(Category $c);
	public function delete(Category $c);
	public function getAllCategory();
	public function getById($cat);
	public function getByName($name);
}