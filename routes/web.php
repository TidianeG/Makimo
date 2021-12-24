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
Auth::routes();
Route::get('/',  'AccueuilController@accueuil')->name('accueuil');
Route::get('/apropos',  'AccueuilController@propos');
Route::get('/cgu',  'AccueuilController@cgu');
Route::get('/conseil-securitaire',  'AccueuilController@securitaire');

Route::get('/pub',  'ProductController@creat_annonce')->name('creat_annonce')->middleware('auth');
Route::get('/credit',  'ProductController@credit')->name('achat_credit')->middleware('auth');
Route::get('/contact',  'ProductController@contact');
Route::post('/contact', [
    'uses' => 'ProductController@CreateForm',
    'as' => 'contact.store'
]);
Route::get('/liste_contact',  'ProductController@liste_contact');
Route::post('/pub','ProductController@store')->name('store_annonce');
Route::get("/pub/{id}/show", 'ProductController@show');
Route::get("/dashbord/mes-annonces", 'ProductController@mes_annonces');
Route::get("/dashbord/mes-annonces/{id}/edit", 'ProductController@edit_annonce');

Route::post("/dashbord/mes-annonces/editer_annonce", 'ProductController@editer_annonce');


Route::get('/annonce','ProductController@liste')->name('editer_produit');
Route::get('annonce/{id}/edit', 'ProductController@edit')->name('editer_produit');
Route::patch('/editer-annonce/edit/{id}', 'ProductController@update1')->name('update_product');
Route::delete('/delete-annonce/{id}','ProductController@destroy');
Route::get('/tableau-de-bord','ProductController@admin');
Route::get('/admin','HomeController@dashbord');
Route::post('/ajout-cat', "ProductController@add_category")->name('add-cat');
Route::get('/ajout-cat', "ProductController@category");
Route::post('/ajout-souscat', "ProductController@add_sous_category")->name('add-souscat');
Route::get('/ajout-souscat', "ProductController@sous_category");
//Route::post('/tableau-de-bord', "AccueuilController@affichage_souscategorie");
Route::get('/affiche-cat', "ProductController@affiche_cat");

Route::get('/liste_pack', "ProductController@affiche_pack");
Route::get('/liste-annonce', "ProductController@affiche_annonce");
Route::get('/affiche-souscat', "ProductController@affiche_souscat");
Route::delete('/affiche-cat/{id}', "ProductController@destroy_cat");
Route::delete('/affiche-souscat/{id}', "ProductController@destroy_souscat");
Route::get('/affiche-localite', "ProductController@affiche_localite");
Route::get('/ajout-localite', "ProductController@localite");
Route::delete('/affiche-localite/{id}', "ProductController@destroy_localite");
Route::post('/ajout-localite', "ProductController@add_localite")->name('add-localite');

Route::get('/search', "ProductController@search")->name('annonce.search');

Route::post('/ajouter_user', "HomeController@store")->name('add_user');

            // les rubriques
Route::get('/immo','AccueuilController@immo')->name('accueuil');
Route::get('/banque','AccueuilController@banque');
Route::get('/forage','AccueuilController@forage');
Route::get('/btp','AccueuilController@agence');




Route::get('/home', 'HomeController@index')->name('home');


Route::get('/logout', 'SessionsController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// espace packk

Route::post('/createPack', "PackController@add_pack")->name('add_pack');
Route::get("/credit/{id}/details_pack", 'PackController@details_pack');
Route::post('/achat_credit', "PackController@achat_credit")->name('achat_credit')->middleware('auth');
Route::get('https://touchpay.gutouch.com/touchpay/retour_payment', "PackController@retour_payment");

// route de redirection apres paiement
Route::post("/purchase", 'PackController@purchase')->name("purchase");

Route::get("/success-payment", 'PackController@success_payment')->name('success_payment');

Route::get("/error-payment", 'PackController@error_payment')->name('error_payment');
Route::get("/credit/retour-success-payment", 'PackController@valid_payment')->name('retour.success');
