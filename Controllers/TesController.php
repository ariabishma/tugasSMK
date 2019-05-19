<?php
/**
 * 
 */
class TesController 
{
	public function index()
	{
		$bsm = new BSM();
		$bsm->Render('home',['nama'=>"bishma"]);
	}
}