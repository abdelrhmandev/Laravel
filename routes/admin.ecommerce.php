<?php
Route::group(['prefix' => 'ecommerce','namespace'=>'ecommerce'], function () {
    
// Route::resource('brands','BrandController')->except('show'); // Brands



Route::resource('product-category', CategoryController::class)->except('show');


// Route::resource('products','ProductController')->except('show'); // Product

// Route::resource('shippings','ShippingController')->except('show'); // Shipping
// Route::resource('coupons','CouponController')->except('show'); // Coupon

// Route::resource('attributes','AttributeController')->except('show'); // attribute

#Orders
// Route::group(['prefix' => 'orders'], function () {
//     Route::get('/', 'OrderController@index')->name('orders.index');
//     Route::get('/{order}/show', 'OrderController@show')->name('orders.show');
//  });
#Product Attribute
//  Route::get('attributes/load', 'ProductAttributeController@loadAttributes');
//  Route::post('attributes', 'ProductAttributeController@productAttributes');
//  Route::post('attributes/values', 'ProductAttributeController@loadValues');
//  Route::post('attributes/add', 'ProductAttributeController@addAttribute');
//  Route::post('attributes/delete', 'ProductAttributeController@deleteAttribute');

});


