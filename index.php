<?php
// error_reporting(0);
/**
* Tugas Pemrograman Berorientasi object SMKN 1 TALAGA
* @Author mochammad aria bishma fauzan
* @Github github.com/ariabishma
*
* @Templating_Engine .bsm(bishma)
*/

//inisialisasi base url 
define('BASEPATH',__DIR__);

function route($route)
{
	return "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']."/".$route;
}

require './Bootstrap.php';
// header('location:/oop/index.php/');

Router::RenderRoutes();

// $prd = new Product();
// print_r($prd);

// $prod = new Product();
// // $prd = (array) $prod;

// // print_r($prd);

// $db = new DB($prod);
// // 
// $r = $db->GetAll();

// echo $r[0]->getName();




