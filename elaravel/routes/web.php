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

 // frontend route ..............
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

Route::get('product-by-category/{category_id}',[
			'as'	=> 'product-by-category',
			'uses'	=> 'HomeController@productByCategory'
		]);

Route::get('product-by-manufacture/{manufacture_id}',[
			'as'	=> 'product-by-manufacture',
			'uses'	=> 'HomeController@productByBrand'
		]);

Route::get('product-details/{id}',[
			'as'	=> 'product-details',
			'uses'	=> 'HomeController@productDetails'
		]);

// Card releted route ..............

Route::post('add-to-card',[
			'as'	=> 'add-to-card',
			'uses'	=> 'CardController@addToCard'
		]);

Route::get('show-cart',[
			'as'	=> 'show-cart',
			'uses'	=> 'CardController@showCart'
		]);

Route::get('delete-to-cart/{rowId}',[
			'as'	=> 'delete-to-cart',
			'uses'	=> 'CardController@deleteToCart'
		]);

Route::post('update-cart',[
			'as'	=> 'update-cart',
			'uses'	=> 'CardController@updateCart'
		]);

// checkout route ..............
Route::get('checkout-login',[
			'as'	=> 'checkout-login',
			'uses'	=> 'CheckoutController@CheckoutLogin'
		]);

Route::post('customer-register',[
			'as'	=> 'customer-register',
			'uses'	=> 'CheckoutController@customerRegistration'
		]);

Route::get('checkout',[
			'as'	=> 'checkout',
			'uses'	=> 'CheckoutController@checkout'
		]);

Route::post('customer-login',[
			'as'	=> 'login',
			'uses'	=> 'CheckoutController@customerLogin'
		]);
Route::get('customer-logout',[
			'as'	=> 'logout',
			'uses'	=> 'CheckoutController@customerLogout'
		]);

// Shipping route ..............
Route::post('save-shipping-info',[
			'as'	=> 'save-shipping-info',
			'uses'	=> 'CheckoutController@saveShippingInfo'
		]);

Route::get('payment',[
			'as'	=> 'payment',
			'uses'	=> 'CheckoutController@payment'
		]);
Route::post('holding-place',[
			'as'	=> 'holding-place',
			'uses'	=> 'CheckoutController@holdingPlace'
		]);

Route::get('greeting',[
			'as'	=> 'greeting',
			'uses'	=> 'CheckoutController@greeting'
		]);

// backend route ..............

Route::get('logout', 'SuperLogoutController@logout');
Route::get('admin', 'AdminController@index');

Route::post('admin-login',[
	'as'   => 'admin-login',
	'uses' => 'AdminController@loginCheck',
]);

Route::group(['middleware' => 'authAdmin'], function(){
	
	Route::get('dashboard', 'AdminController@dashboard');

	// Category releted.............
	Route::get('add-category','addCategoryController@index');
	Route::get('all-category','addCategoryController@allcategory');
	Route::post('save-category','addCategoryController@save_category');

	Route::get('active_category/{category_id}','addCategoryController@active_category');
	Route::get('unactive_category/{category_id}','addCategoryController@unactive_category');
	Route::get('delete/{category_id}','addCategoryController@deleteCat');

	Route::get('editCat/{category_id}','addCategoryController@editCat');
	Route::post('update-cat/{category_id}','addCategoryController@updateCat');

	// Category releted.............
	Route::get('all-brand','brandController@allbrand');
	Route::post('add-brand','brandController@addbrand');
	Route::get('addbrandpage','brandController@addbrandpage');
	Route::get('unactive-manufacture/{id}','brandController@unactive_manufacture');
	Route::get('active-manufacture/{id}','brandController@active_manufacture');
	Route::get('dltmanu/{id}','brandController@deleteManu');
	Route::get('editmanu/{id}','brandController@editManu');
	Route::post('update-brand/{id}','brandController@updateManu');

	//product related
	Route::get('add-product','productController@index');
	Route::get('all-product','productController@allProduct');
	Route::post('save-product','productController@save_product');
	Route::get('inactive-product/{id}','productController@inactive_product');
	Route::get('active-product/{id}','productController@active_product');
	Route::get('deleteprod/{prod_id}','productController@delete_product');
	Route::get('editproduct/{prod_id}','productController@edit_product');
	Route::post('update-product/{prod_id}','productController@update_product');

//Slider related
	Route::get('add-slider',[
			'as'	=> 'add-slider',
			'uses'  => 'SliderController@index'
	]);	

	Route::post('save-slider',[
			'as'	=> 'save-slider',
			'uses'  => 'SliderController@saveSlider'
	]);

	Route::get('all-slider',[
			'as'	=> 'all-slider',
			'uses'  => 'SliderController@allSlider'
	]);

	Route::get('inactive-slider/{id}',[
			'as'	=> 'inactive-slider',
			'uses'  => 'SliderController@inactiveSlider'
	]);

	Route::get('active-slider/{id}',[
			'as'	=> 'active-slider',
			'uses'  => 'SliderController@activeSlider'
		]);

	Route::get('deleteslider/{id}',[
			'as'	=> 'deleteslider',
			'uses'  => 'SliderController@deleteSlider'
		]);	

// Order Related...........
	Route::get('order-manage',[
			'as'	=> 'order-manage',
			'uses'  => 'orderController@orderManage'
		]);
	Route::get('unactive-order/{orderId}',[
			'as'	=> 'unactive-order',
			'uses'  => 'orderController@unactiveOrder'
		]);
	Route::get('active-order/{orderId}',[
			'as'	=> 'unactive-order',
			'uses'  => 'orderController@activeOrder'
		]);
	Route::get('delete-order/{orderId}',[
			'as'	=> 'delete-order',
			'uses'  => 'orderController@deleteOrder'
		]);	

	Route::get('view-order/{orderId}',[
			'as'	=> 'view-order',
			'uses'  => 'orderController@viewOrder'
		]);
});

