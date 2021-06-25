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
Route::get('/liste_contact',  'ProductController@liste_contact');
Route::post('/pub','ProductController@store')->name('store_annonce');
Route::get("/pub/{id}/show", 'ProductController@show');
Route::get('/annonce','ProductController@liste')->name('editer_produit');
Route::get('annonce/{id}/edit', 'ProductController@edit')->name('editer_produit');
Route::patch('annonce/{id}/edit', 'ProductController@update1')->name('update_product');
Route::delete('annonce/{id}','ProductController@destroy');
Route::get('/tableau-de-bord','ProductController@admin');
Route::post('/ajout-cat', "ProductController@add_category");
Route::get('/ajout-cat', "ProductController@category")->name('add-cat');
Route::post('/ajout-souscat', "ProductController@add_sous_category");
Route::get('/ajout-souscat', "ProductController@sous_category")->name('add-sous');
//Route::post('/tableau-de-bord', "AccueuilController@affichage_souscategorie");
Route::get('/affiche-cat', "ProductController@affiche_cat");
Route::get('/affiche-souscat', "ProductController@affiche_souscat");
Route::delete('/affiche-cat/{id}', "ProductController@destroy_cat");
Route::delete('/affiche-souscat/{id}', "ProductController@destroy_souscat");
        
            // les rubriques
Route::get('/immo','AccueuilController@immo')->name('accueuil');
Route::get('/banque','AccueuilController@forage');
Route::get('/forage','AccueuilController@banque');
Route::get('/agence','AccueuilController@agence');