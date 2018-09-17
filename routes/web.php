<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

	// route for admin
	Route::group(['prefix' => 'admin','middleware' => 'roleAdmin'],function(){

	    Route::get('index',["as" => "index","uses" => "adminController@getHome"]);

	    Route::get('chart',['as'=>'chart','uses' => 'adminController@getChart']);
	       
	    Route::get('updateStatus/{id}',['as'=>'updateStatus','uses' => 'adminController@updateStatus']);

	    Route::prefix('user')->group(function () {

	     	Route::get('listUser',['as'=>'listUser','uses' => 'adminController@listUser']);

	     	Route::get('readUser/{id}',['as'=>'readUser','uses' => 'adminController@readUser']);

	     	Route::get('deleteUser/{id}',['as'=>'deleteUser','uses' => 'adminController@deleteUser']);

	     	Route::get('searchUser',['as'=>'searchUser','uses' => 'adminController@searchUser']);

	     });

	    Route::prefix('product')->group(function () {

	    	Route::get('list',['as'=>'listProduct','uses'=>'adminController@listProduct']);

	    	Route::get('add',['as'=>'addProduct','uses'=>'adminController@addProduct']);

	    	Route::post('add',['as'=>'addProduct','uses'=>'adminController@postAddProduct']);

	    	Route::get('edit/{id}',['as'=>'editProduct','uses'=>'adminController@editProduct']);

	    	Route::post('edit/{id}',['as'=>'editProduct','uses'=>'adminController@postEditProduct']);

	    	Route::get('read/{id}',['as'=>'readProduct','uses'=>'adminController@readProduct']);

	    	Route::get('delete/{id}',['as'=>'deleteProduct','uses'=>'adminController@deleteProduct']);
	    	Route::get('searchProduct',['as'=>'searchProduct','uses' => 'adminController@searchProduct']);
	    });

	    Route::prefix('category')->group(function () {

	    	Route::get('list',['as'=>'listCategory','uses'=>'adminController@listCategory']);

	    	Route::get('add',['as'=>'addCategory','uses'=>'adminController@addCategory']);

	    	Route::post('add',['as'=>'addCategory','uses'=>'adminController@postAddCategory']);

	    	Route::get('edit/{id}',['as'=>'editCategory','uses'=>'adminController@editCategory']);

	    	Route::post('edit/{id}',['as'=>'editCategory','uses'=>'adminController@postEditCategory']);

	    	Route::get('delete/{id}',['as'=>'deleteCategory','uses'=>'adminController@deleteCategory']);

	    	Route::get('searchCategory',['as'=>'searchCategory','uses' => 'adminController@searchCategory']);
	    });


	    Route::prefix('invoice')->group(function(){

	    	Route::get('detailOrder/{id}',['as'=>'detailOrders','uses'=>'adminController@getDetailOrder']);

	    	Route::get('printInvoice/{id}',['as'=>'printInvoice','uses'=>'adminController@printInvoice']);
	    });



	    Route::prefix('excel')->group(function(){

	    	
	    	Route::get('exportProduct',['as'=>'exportProduct','uses'=>'adminController@exportProduct']);

	    	Route::get('exportCategory',['as'=>'exportCategory','uses'=>'adminController@exportCategory']);

	    	Route::get('exportUser',['as'=>'exportUser','uses'=>'adminController@exportUser']);

	    	Route::get('export_Month_Revenue',['as'=>'export_Month_Revenue','uses'=>'adminController@export_Month_Revenue']);

	    });

	});


	// route for user
	Route::prefix('user')->group(function () {

		Route::prefix('product')->group(function (){

			Route::get('index',['as'=>'product','uses'=>'userController@getProduct']);

			Route::get('detail/{id}',['as'=>'detail','uses'=>'userController@getProductDetail']);
			Route::get('category',['as'=>'category','uses'=>'userController@getProductCategory']);

		});

		Route::get('login',['as'=>'login','uses'=>'userController@getLogin']);

		Route::post('login',['as'=>'login','uses'=>'userController@postLogin']);

		Route::get('logout',['as'=>'logout','uses'=>'userController@logout']);

		Route::get('register',['as'=>'register','uses'=>'userController@getRegister']);

		Route::post('register',['as'=>'register','uses'=>'userController@postRegister']);

		
		Route::prefix('profile')->group(function (){

			Route::get('user_profile/{id}',['as'=>'user_profile','uses'=>'userController@userProfile']);

			Route::get('editProfile/{id}',['as'=>'editProfile','uses'=>'userController@editProfile']);

			Route::post('updateProfile/{id}',['as'=>'updateProfile','uses'=>'userController@updateProfile']);

		});

		Route::prefix('cart')->group(function (){
			
			Route::get('add_cart/{id}',['as'=>'addCart','uses'=>'userController@addCart']);
			
			Route::get('getCart',['as'=>'cart','uses'=>'userController@getCart']);

			Route::get('updateCart/{id}/{qty}',['as'=>'updateCart','uses'=>'userController@updateCart']);

			Route::get('delete_cart/{id}',['as'=>'deleteCart','uses'=>'userController@deleteCart']);

			Route::get('checkout',['as'=>'checkout','uses'=>'userController@checkout']);

			Route::post('checkout',['as'=>'checkout','uses'=>'userController@postCheckout']);

			Route::get('feeShip/{address}',['as'=>'feeShip','uses'=>'userController@calFeeShip']);

		});

		Route::get('search',['as'=>'search','uses'=>'userController@search']);

		Route::get('contact',['as'=>'contact','uses'=>'userController@contact']);

		Route::get('about',['as'=>'about','uses'=>'userController@about']);

		Route::get('page-error-403',['uses'=>'userController@page_error_403']);

		

		Route::get('employee/detail/{id}',['as'=>'employee_detail','uses'=>'userController@getDetailEmployee']);

	});
	