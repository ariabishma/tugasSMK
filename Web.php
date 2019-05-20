<?php

	// inisialisasi routing

	Router::get('/','ProductController@index');
	Router::get('/addproduct','TesController@index1');

	Router::post('/addproduct/store','ProductController@store');


	Router::get('/editproduct','ProductController@edit');
	Router::post('/editproduct/store','ProductController@storeUpdate');

	Router::get('/deleteproduct','ProductController@deleteHandler');




	Router::get('/category','CategoryController@index');
	Router::get('/deletecategory','CategoryController@deleteHandler');
	Router::get('/editcategory','CategoryController@edit');
	Router::get('/addcategory','CategoryController@add');
	Router::post('/addcategory/store','CategoryController@store');

	Router::post('/editcategory/store','CategoryController@storeUpdate');


	Router::get('/about','TesController@about');



