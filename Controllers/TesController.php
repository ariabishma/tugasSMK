<?php
/**
 * testing controller  
 */
class TesController 
{
	public function index()
	{
		$bsm = new BSM();
		$bsm->Render('home',['nama'=>"bishma"]);
	}

	public function index1()
	{
		$bsm = new BSM();
		$bsm->Render('addproduct',['nama'=>"bishma"]);
	}

}