<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',  'AccueuilController@accueuil')->name('accueuil');
Route::get('/pub',  'ProductController@creat_annonce')->name('creat_annonce');
Route::get('/contact',  'ProductController@contact');
Route::post('/contact', [
    'uses' => 'ProductController@CreateForm',
    'as' => 'contact.store'
]);
Route::post('/pub','ProductController@store')->name('store_annonce');
Route::get("/pub/{id}/show", 'ProductController@show');
Route::get('/annonce','ProductController@liste')->name('editer_produit');
Route::get('annonce/{id}/edit', 'ProductController@edit')->name('editer_produit');
Route::patch('annonce/{id}/edit', 'ProductController@update1')->name('update_product');
Route::delete('annonce/{id}','ProductController@destroy');
