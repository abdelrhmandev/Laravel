<?php
# Errors Routes 
# 404 Error . Page Not Found
Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);
# 503 Error .Page Not Found Be right back
Route::get('503',['as'=>'503','uses'=>'ErrorHandlerController@errorCode503']);
# 403 Error . This action is unauthorized
Route::get('403',['as'=>'403','uses'=>'ErrorHandlerController@errorCode403']);
?>