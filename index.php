<?php

/**
* Tugas Pemrograman Berorientasi object SMKN 1 TALAGA
* @Author mochammad aria bishma fauzan
* @Github github.com/ariabishma
*
* @Templating_Engine .bsm(bishma)
*/

//inisialisasi base url 
define('BASEPATH',__DIR__);

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




