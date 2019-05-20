<?php
require 'Category_Interface.php';
require BASEPATH."/Models/Category.php";
/**
 * 
 */
class CategoryController implements Category_Interface
{

	public function add()
	{
		
		$bsm = new BSM();
		$bsm->Render('addcategory',[]);
	}

	public function store()
	{
		$cat = new Category();
		$cat->name = $_POST['name'];
		
		$this->insert($cat);
		header('location:'.route("category"));
	}
	
	public function edit()
	{
		$find = $this->getById($_GET['id']);
		
		$bsm = new BSM();
		$bsm->Render('editcategory',['data'=>$find]);
	}

	public function index()
	{
		$cat = $this->getAllCategory();
		$bsm = new BSM();
		$bsm->Render('category',['data'=>$cat]);
	}

	public function deleteHandler()
	{
		$find = $this->getById($_GET['id']);
		$this->delete($find);	
		
		header('location:'.route("category"));

	}


	public function storeUpdate()
	{
		$prod = new Category();
		$prod->id = $_POST['id'];
		$prod->name = $_POST['name'];
		
		// print_r($prod);
		$this->update($prod);
		header('location:'.route("category"));
	}




	public function insert(Category $c){
		$db = new DB($c);
		$r = $db->InsertDAO()->Execute();
		return $r;
	}

	public function update(Category $c){
		$db = new DB($c);
		$r = $db->UpdateDAO()->Execute();
		return $r;
	}

	public function delete(Category $c){
		$db = new DB($c);
		$r = $db->delete();
		return $r;
	}

	public function getAllCategory(){
		$cat = new Category();
		$db = new DB($cat);
		$r = $db->getAll();
		return $r;
	}

	public function getById($id){
		$cat = new Category();
		$db = new DB($cat);
		$r = $db->find($id);
		return $r;
	}

	public function getByName($name){

	}
}