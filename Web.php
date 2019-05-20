<?php

	// inisialisasi routing

	Router::get('/','ProductController@index');
	Router::get('/addproduct','TesController@index1');

	Router::post('/addproduct/store','ProductController@store');


	Router::get('/editproduct','ProductController@edit');
	Router::post('/editproduct/store','ProductController@storeUpdate');

	Router::get('/deleteproduct','ProductController@deleteHandler');
