<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use  Illuminate\Database\Query\Builder;
use App\Contact;
use App\Product;
use App\Category;
use App\Sous_Category;

class ProductController extends Controller
 {
    //
   public function publication()
      {
        return view('publication');
      }
  
  

public function creat_annonce()
  {
      $categories = \App\Category::pluck('name_category','id');
     // $properties = \App\Property::pluck('name_property','id');
      $sous_category = Sous_Category::pluck('name','id');
       $immo = DB::table('categories')->where('name_category', 'like', "%immo%")->count();
       $agence = DB::table('categories')->where('name_category', 'like', "%agenceimmo%")->count();
      $forage = DB::table('categories')->where('name_category', 'like', "%forage%")->count();
      $bank = DB::table('categories')->where('name_category', 'like', "%banqueinstituts%")->count();

      return view('publication', compact('categories','sous_category','immo','agence','forage','bank'));
  }
   public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null){
      $name = !is_null($filename) ? $filename : str_random('25');
      $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
   
      return $file;
      }   
   public function store(Request $request)
      {
      $produit = new Product();
      $data = $request->validate([
         'name_product'=>'required|min:4',
         'prix_product' => 'required|min:3|numeric',
         'whatsapp_product' => 'numeric',
         'localite_product' => 'required|min:3',
         'description_product' => 'max:1000000',
         'image_product' => 'nullable | image | mimes:jpeg,png,jpg,gif | max: 2048',
         ]);
     
      if($request->has('image_product')){
         //On enregistre l'image dans un dossier
         $image = $request->file('image_product');
         //Nous allons definir le nom de notre image en combinant le nom du produit et un timestamp
         $image_name = Str::slug($request->input('image_product')).'_'.time();
         //Nous enregistrerons nos fichiers dans /uploads/images dans public
         $folder = '/uploads/images/';
         //Nous allons enregistrer le chemin complet de l'image dans la BD
         $produit->image_product = $folder.$image_name.'.'.$image->getClientOriginalExtension();
         //Maintenant nous pouvons enregistrer l'image dans le dossier en utilisant la methode uploadImage();
         $file = $this->uploadImage($image, $folder, 'public', $image_name);
         
         }
         $produit->name_product = $request->input('name_product');
         $produit->prix_product = $request->input('prix_product');
         $produit->localite_product = $request->input('localite_product');
         $produit->description_product = $request->input('description_product');
         $produit->whatsapp_product = $request->input('whatsapp_product');


         $produit->sous_category_id = $request->input('sous_category_id');
         $produit->category_id = $request->input('category_id'); 
     //$produit->property_id = $request->input('property_id');  
         $produit->save();
         return redirect()->back()->with('success', 'Votre annonce a été bien ajouté .');
     
      }


         public function show($id) 
         {
  
         $product = Product::find($id);
         $products = DB::table('products')->whereIn('id', [$id])->paginate(1);
    //$property = Property::all();
    //$properties = DB::table('properties')->whereIn('id', [$id]) ;
     

    //paginate(6);
     
    
   
         return view("show", compact('product','products'));

	       }
	       public function liste()
      {
         $products = Product::all();
         $immo = DB::table('categories')->where('name_category', 'like', "%immo%")->count();
         $agence = DB::table('categories')->where('name_category', 'like', "%agenceimmo%")->count();
         $forage = DB::table('categories')->where('name_category', 'like', "%forage%")->count();
         $bank = DB::table('categories')->where('name_category', 'like', "%banqueinstituts%")->count();

       
         return view('editer', compact('products','immo','agence','forage','bank'));
      }
      public function liste_contact()
      {
         $contacts = Contact::all();
         
      
       
         return view('liste_contact', compact('contacts'));
      }
   
         public function edit($id)
      {
   // Pour que l'admin soit le seul apte a editer 
  // $this->authorize('admin');
   // Editons les produits 
 
      $product = \App\Product::find($id);
  
      $categories = \App\Category::pluck('name_category','id');
      //$properties = \App\Property::pluck('name_property','id');
      $sous_category = Sous_Category::pluck('name','id');
      //$categories = \App\Category::pluck('name_category','id');
      return view('editer_annonce', compact('product', 'categories','sous_category'));
      }
        public function update1(Request $request,$id)
      {
        //
 
      $request->validate([
            'name_product'=>'required',
            'prix_product'=> 'required',
            'description_product' => 'required | max:10000',
            
      ]);
 
 
      $product = \App\Product::find($id);
      $product->name_product = $request->get('name_product');
      $product->prix_product = $request->get('prix_product');
      $product->description_product = $request->get('description_product');
        
 
      $product->update();
 
      return redirect('/annonce')->with('success', 'Le Produit est mise á jour avec succés .');
    }
        public function destroy($id)
    {
        $product = Product::find($id);
        if($product)
        $product->delete();
       return redirect('/annonce');
    }
   public function contact() {
      $immo = DB::table('categories')->where('name_category', 'like', "%immo%")->count();
       $agence = DB::table('categories')->where('name_category', 'like', "%agenceimmo%")->count();
      $forage = DB::table('categories')->where('name_category', 'like', "%forage%")->count();
      $bank = DB::table('categories')->where('name_category', 'like', "%banqueinstituts%")->count();

      return view('contact', compact('immo','agence','forage','bank'));
    }
    public function CreateForm(Request $request) {       
   
    $produit = new Contact();
      $data = $request->validate([
         'nom'=>'required|min:4',
         'email' => 'required|email',
         'objet' => 'required|max:1000000',
         'message' => 'required|min:3|max:1000000'
         
         
     ]);       
    
     $produit->nom = $request->input('nom');
     $produit->email = $request->input('email');
      $produit->objet = $request->input('objet');
       $produit->message= $request->input('message');
     $produit->save();
     return redirect()->back()->with('success', 'Votre message á été bien enregistre .');
     }
      

     public function admin(){

      $sous_categories = Sous_Category::all();
      $categories = \App\Category::pluck('name_category','id');
      $sms = DB::table('contacts')->count();

      return view('layouts.admin', compact('sous_categories','categories','sms'));
   }

   public function add_category(Request $request)
   {
      $category = new Category();
       $name = $request->input('name_category');
       $categories= Category::where('name_category',$name)->first();      
      if(empty($categories))
         {
            $category->name_category=strtolower($name); 
            $category->save();
            return redirect('/ajout-cat')->with('success', 'Categorie ajoutée avec succès !!');
         }
      else{   
         return redirect('/ajout-cat')->with('success', 'Categorie dèja ajoutée merci !!');
     }
    }
      public function category()
   {
      return view('ajout-cat') ;

   }
    public function sous_category()
   {
      $sous_categories = Sous_Category::all();
      $categories = \App\Category::pluck('name_category','id');

      
      return view('ajout-sous-cat' , compact('sous_categories','categories'));

   }
       public function add_sous_category(Request $request){
      
      $sous_category = new Sous_Category();
       $name = $request->input('nom_sous_category');
       $sous_categories= Sous_Category::where('name',$name)->first();      
      if(empty($sous_categories))
         {
            //$category= Category::where('name_category',$request->input())
            $sous_category->name=strtolower($name);
            $sous_category->category_id=$request->input('id_category');
            $sous_category->save();
            return redirect('/ajout-souscat')->with('success', 'Sous Categorie ajoutée avec succès !!');
         }
      else {
         return redirect('/ajout-souscat')->with('success', 'Sous Categorie dèja ajoutée merci !!');
      }
   }

   public function destroy_cat($id)
{
   $category = Category::find($id);
   if($category)
       $category->delete();
   return redirect('/affiche-cat');
}
public function destroy_souscat($id)
{   
   $sousCategory = Sous_Category::find($id);
   if($sousCategory)
       $sousCategory->delete();
   return redirect('/affiche-cat');
}

        public function affiche_cat(){
      $categories = Category::all();
      return view('affiche-cat', compact('categories'));
   }

  

   
   public function affiche_souscat(){
      $sous_categories = Sous_Category::all();
      $categories = \App\Category::pluck('name_category','id');

      return view('affiche-souscat', compact('sous_categories','categories'));
   }
     

}
