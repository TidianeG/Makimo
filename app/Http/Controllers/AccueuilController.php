<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use  Illuminate\Database\Query\Builder;

use App\Product;
use App\Category;
use App\Sous_Category;
class AccueuilController extends Controller
{
    public function accueuil(){
      $products = DB::table('products')->paginate(6);//paginate(6);
      $product = \App\Product::All();
    	$category= Category::All();
      $sous_rubrique = \App\Sous_Category::pluck('name','id');
    	$immo = DB::table('categories')->where('name_category', 'like', "%immo%")->count();
    	$agence = DB::table('categories')->where('name_category', 'like', "%agenceimmo%")->count();
    	$forage = DB::table('categories')->where('name_category', 'like', "%forage%")->count();
    	$bank = DB::table('categories')->where('name_category', 'like', "%banqueinstituts%")->count();

        return view('accueuil',compact('category','immo','agence','forage','bank','sous_rubrique','products','product'));
    }
    
    // récupérationdes donner d'utilisteur

    public function store(Request $request){
        $client = App\Client::all();

        return redirect('/')->witch(("Veuiller utiliser vos informatons pour vous connecter à la plateforme"));
    }
     public function immo(){
      $category= Category::All();
      $immo = DB::table('categories')->where('name_category', 'like', "%immo%")->count();
      $agence = DB::table('categories')->where('name_category', 'like', "%agenceimmo%")->count();
      $forage = DB::table('categories')->where('name_category', 'like', "%forage%")->count();
      $bank = DB::table('categories')->where('name_category', 'like', "%banqueinstituts%")->count();
      
      return view('immo',compact('category','immo','agence','forage','bank'));
   }
   public function agence(){
     $category= Category::All();
      $immo = DB::table('categories')->where('name_category', 'like', "%immo%")->count();
      $agence = DB::table('categories')->where('name_category', 'like', "%agenceimmo%")->count();
      $forage = DB::table('categories')->where('name_category', 'like', "%forage%")->count();
      $bank = DB::table('categories')->where('name_category', 'like', "%banqueinstituts%")->count();
      return view('agence',compact('category','immo','agence','forage','bank'));
   }public function banque(){
    $category= Category::All();
      $immo = DB::table('categories')->where('name_category', 'like', "%immo%")->count();
      $agence = DB::table('categories')->where('name_category', 'like', "%agenceimmo%")->count();
      $forage = DB::table('categories')->where('name_category', 'like', "%forage%")->count();
      $bank = DB::table('categories')->where('name_category', 'like', "%banqueinstituts%")->count();
     
      return view('banque',compact('category','immo','agence','forage','bank'));
   }
   public function forage(){
    $category= Category::All();
      $immo = DB::table('categories')->where('name_category', 'like', "%immo%")->count();
      $agence = DB::table('categories')->where('name_category', 'like', "%agenceimmo%")->count();
      $forage = DB::table('categories')->where('name_category', 'like', "%forage%")->count();
      $bank = DB::table('categories')->where('name_category', 'like', "%banqueinstituts%")->count();
     
      return view('forage',compact('category','immo','agence','forage','bank'));
   }
     
  

  }
