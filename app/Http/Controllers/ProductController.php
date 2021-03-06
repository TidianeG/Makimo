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
use App\Localite;
use App\Business;
use App\Credit;
use App\Pack;
use Illuminate\Support\Facades\Auth;
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
      $localite = Localite::pluck('name_localite','id');
       $immo = DB::table('categories')->where('name_category', 'like', "%Immo%")->count();
       $agence = DB::table('categories')->where('name_category', 'like', "%Agence%")->count();
      $forage = DB::table('categories')->where('name_category', 'like', "%Forage%")->count();
      $bank = DB::table('categories')->where('name_category', 'like', "%Banque%")->count();

      return view('publication', compact('categories','localite','sous_category','immo','agence','forage','bank'));
  }
public function credit()
  {
      $categories = \App\Category::pluck('name_category','id');
     // $properties = \App\Property::pluck('name_property','id');
      $sous_category = Sous_Category::pluck('name','id');
      $localite = Localite::pluck('name_localite','id');
       $immo = DB::table('categories')->where('name_category', 'like', "%Immo%")->count();
       $agence = DB::table('categories')->where('name_category', 'like', "%Agence%")->count();
      $forage = DB::table('categories')->where('name_category', 'like', "%Forage%")->count();
      $bank = DB::table('categories')->where('name_category', 'like', "%Banque%")->count();
      $packs=Pack::all();
      return view('credit', compact('packs', 'categories','localite','sous_category','immo','agence','forage','bank'));
  }




   public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null){
      $name = !is_null($filename) ? $filename : str_random('25');
      $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
   
      return $file;
      }   
   public function store(Request $request){
         $mes_credit=Credit::find(Auth::user()->client->credit_id);
         
         if( $mes_credit->nbre_credit > 0){
            $produit = new Product();
            $business = new Business();
            $this->validate($request, [
            'name_product'=>'required|min:4',
            'prix_product' => 'nullable |numeric',
            'whatsapp_product' => 'nullable | numeric',
            'description_product' => 'max:1000000',
            'filenames' => 'required',
            'filenames.*' => 'nullable | image | mimes:jpeg,png,jpg,gif | max: 2048',
            ]);

            // R??cup??ration de category, localite et sous category associ??s au produit
            $category_id=Category::where("name_category",$request->input('category_id'))->first();
            $sous_category_id=Sous_Category::where("name",$request->input('sous_category_id'))->first();
            $localite_id=Localite::where("name_localite",$request->input('localite_id'))->first();
            
            

            if($request->hasfile('filenames')) {
               foreach($request->file('filenames') as $file)
               {
                   $name = $file->getClientOriginalName();
                   $file->move(public_path().'/uploads/images/', $name);  
                   $data[] = $name;  
                   

               }
               //dd($data);
               $produit->image_product=json_encode($data);
           }

            if($request->has('logo_entreprise')){
               //On enregistre l'image dans un dossier
               $image = $request->file('logo_entreprise');
               //Nous allons definir le nom de notre image en combinant le nom du produit et un timestamp
               $image_name = Str::slug($request->input('logo_entreprise')).'_'.time();
               //Nous enregistrerons nos fichiers dans /uploads/images dans public
               $folder = '/uploads/images/';
               //Nous allons enregistrer le chemin complet de l'image dans la BD
               $business->image_business = $folder.$image_name.'.'.$image->getClientOriginalExtension();
               //Maintenant nous pouvons enregistrer l'image dans le dossier en utilisant la methode uploadImage();
               $file = $this->uploadImage($image, $folder, 'public', $image_name);
            
            }
            
            if ($category_id->name_category=="particulier") {
               $produit->name_product = $request->input('name_product');
               $produit->prix_product = $request->input('prix_product');
               $produit->description_product = $request->input('description_product');
               $produit->whatsapp_product = $request->input('whatsapp_product');
               $produit->optionCouleur = $request->input('optionCouleur');
               $produit->optionTri = $request->input('optionTri');
               
               $produit->sous_category_id = $sous_category_id->id;
               $produit->category_id = $category_id->id; 
               $produit->localite_id = $localite_id->id; 
            //$produit->property_id = $request->input('property_id'); 
               $produit->user_id = Auth::user()->id; 

               
               if(($produit->optionCouleur ==null && $produit->optionTri !=null)|| ($produit->optionTri ==null && $produit->optionCouleur !=null)) {
                  if($mes_credit->nbre_credit>=2){
                     $mes_credit->nbre_credit= $mes_credit->nbre_credit -2;
                     $mes_credit->save();
                     $produit->save();
                  }
                  else {
                     return redirect()->back()->with('danger', 'Votre cr??dit est insuffisant pour publier des annonces, veuillez recharger votre compte.');
                  }
               }
                if($produit->optionCouleur != null && $produit->optionTri != null){
                  if($mes_credit->nbre_credit>=4){
                     $mes_credit->nbre_credit= $mes_credit->nbre_credit -4;
                     $mes_credit->save();
                     $produit->save();
                  }
                  else {
                     return redirect()->back()->with('danger', 'Votre cr??dit est insuffisant pour publier des annonces, veuillez recharger votre compte.');
                  }
                }
                if($produit->optionCouleur == null && $produit->optionTri == null){
                  $mes_credit->nbre_credit --;
                  $mes_credit->save();
                  $produit->save();
                }
               if ($produit) {
                  return redirect()->back()->with('success', 'Votre annonce a ??t?? bien ajout??. Merci !!!!!!!');
               }
               else {
                  return redirect()->back()->with('danger', 'Annoce non ajout??, veuiller v??rifier les informations entr??es.');
               }
            }
   
            else{
               $business->name_business = $request->input('name_entreprise');
               $business->description_business = $request->input('description_entreprise');
               $business->save();
   
               $produit->name_product = $request->input('name_product');
               $produit->prix_product = $request->input('prix_product');
               $produit->description_product = $request->input('description_product');
               $produit->whatsapp_product = $request->input('whatsapp_product');
               $produit->optionCouleur = $request->input('optionCouleur');
               $produit->optionTri = $request->input('optionTri');
   
               $produit->sous_category_id = $sous_category_id->id;
               $produit->category_id = $category_id->id; 
               $produit->localite_id = $localite_id->id;
               $produit->business_id = $business->id;
               $produit->user_id = Auth::user()->id;
            //$produit->property_id = $request->input('property_id');  
               
               if (($produit->optionCouleur ==null && $produit->optionTri !=null)|| ($produit->optionTri ==null && $produit->optionCouleur !=null)) {
                  
                  if($mes_credit->nbre_credit>=2){
                     $mes_credit->nbre_credit= $mes_credit->nbre_credit -2;
                     $mes_credit->save();
                     $produit->save();
                  }
                  else {
                     return redirect()->back()->with('danger', 'Votre cr??dit est insuffisant pour publier des annonces, veuillez recharger votre compte.');
                  }
               }
                if($produit->optionCouleur != null && $produit->optionTri != null){
                  
                  if($mes_credit->nbre_credit>=4){
                     $mes_credit->nbre_credit =$mes_credit->nbre_credit-4;
                     $mes_credit->save();
                     $produit->save();
                  }
                  else {
                     return redirect()->back()->with('danger', 'Votre cr??dit est insuffisant pour publier des annonces, veuillez recharger votre compte.');
                  }
                }
                if($produit->optionCouleur == null && $produit->optionTri == null){
                  
                     $mes_credit->nbre_credit --;
                     $mes_credit->update();
                     $produit->save();
                  
                }
               
               if ($business) {
                  return redirect()->back()->with('success', 'Votre annonce a ??t?? bien ajout??. Merci !!!!!!!');
               }
               else {
                  return redirect()->back()->with('danger', 'Annoce non ajout??, veuiller v??rifier les informations entr??es.');
               }
            }
         }
         
         else{
            return redirect()->back()->with('danger', 'Votre cr??dit est insuffisant pour publier des annonces, veuillez recharger votre compte.');
         }
      }


      // selection des annonces d'un utilisateur

      public function mes_annonces() 
         {
            $products  = Product::where('user_id', Auth::user()->id)->get();

            return view("mes_annonces", compact('products'));
         }

      // edition d'une  annonces selectionner

      public function edit_annonce($id) 
      {
         $business = Business::find($id);
         $products = Product::find($id);
         
          $immo = DB::table('categories')->where('name_category', 'like', "%immo%")->count();
         $agence = DB::table('categories')->where('name_category', 'like', "%agenceimmo%")->count();
         $forage = DB::table('categories')->where('name_category', 'like', "%forage%")->count();
         $bank = DB::table('categories')->where('name_category', 'like', "%banqueinstituts%")->count();

    //$property = Property::all();
    //$properties = DB::table('properties')->whereIn('id', [$id]) ;
     
         return view("editer_annonce", compact('products','immo','agence','forage','bank','business'));
      }

      public function editer_annonce(Request $request) 
      {
         
      }

         public function show($id) 
         {
         $business = Business::find($id);
         $product = Product::find($id);
         $products = DB::table('products')->whereIn('id', [$id])->paginate(1);
          $immo = DB::table('categories')->where('name_category', 'like', "%immo%")->count();
         $agence = DB::table('categories')->where('name_category', 'like', "%agenceimmo%")->count();
         $forage = DB::table('categories')->where('name_category', 'like', "%forage%")->count();
         $bank = DB::table('categories')->where('name_category', 'like', "%banqueinstituts%")->count();

    //$property = Property::all();
    //$properties = DB::table('properties')->whereIn('id', [$id]) ;
     

    //paginate(6);
     
    
   
         return view("show", compact('product','products','immo','agence','forage','bank','business'));

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
         $sms = DB::table('contacts')->count();
      
       
         return view('liste_contact', compact('contacts','sms'));
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
            'name'=>'required',
            'price'=> 'required',
            'description' => 'required | max:10000',
            'contact' => 'required',     
      ]);
 
 
      $product = \App\Product::find($id);
      $product->name_product = $request->get('name');
      $product->prix_product = $request->get('price');
      $product->description_product = $request->get('description');
      $product->whatsapp_product = $request->get('contact');
        
 
      $product->update();
 
      return redirect()->back()->with('success', 'Le Produit est modifi?? avec succ??s .');
    }
        public function destroy($id)
    {
        $product = Product::find($id);
        if($product)
        $product->delete();
       return redirect('/dashbord/mes-annonces')->with('success', 'Le Produit est supprim?? .');
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
     return redirect()->back()->with('success', 'Votre message ?? ??t?? bien enregistre .');
     }
      

     public function admin(){
      $this->authorize('admin');
      $sous_categories = Sous_Category::all();
      $categories = \App\Category::pluck('name_category','id');
      $sms = DB::table('contacts')->count();

      return view('accueuil_dashbord', compact('sous_categories','categories','sms'));
   }

   public function affiche_pack(){
      $packs=Pack::all();
      $sms = DB::table('contacts')->count();
      return view('affiche_pack', compact('packs','sms'));
   }

   public function affiche_annonce(){
      $products=Product::all();
      $sms = DB::table('contacts')->count();
      return view('affiche_annonce', compact('products','sms'));
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
            return redirect('/ajout-cat')->with('success', 'Categorie ajout??e avec succ??s !!');
         }
      else{   
         return redirect('/ajout-cat')->with('success', 'Categorie d??ja ajout??e merci !!');
     }
    }
      public function category()
   {
      $sms = DB::table('contacts')->count();
      return view('ajout-cat', compact('sms')) ;

   }
    public function sous_category()
   {
      $sous_categories = Sous_Category::all();
      $categories = \App\Category::pluck('name_category','id');
      $sms = DB::table('contacts')->count();
      
      return view('ajout-sous-cat' , compact('sous_categories','categories','sms'));

   }
       public function add_sous_category(Request $request){
      
      $sous_category = new Sous_Category();
       $name = $request->input('name');
       $sous_categories= Sous_Category::where('name',$name)->first();      
      if(empty($sous_categories))
         {
            //$category= Category::where('name_category',$request->input())
            $sous_category->name=strtolower($name);
            $sous_category->category_id=$request->input('id_category');
            $sous_category->save();
            return redirect('/ajout-souscat')->with('success', 'Sous Categorie ajout??e avec succ??s !!');
         }
      else {
         return redirect('/ajout-souscat')->with('success', 'Sous Categorie d??ja ajout??e merci !!');
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
      $sms = DB::table('contacts')->count();
      return view('affiche-cat', compact('categories','sms'));
   }

  

   
   public function affiche_souscat(){
      $sous_categories = Sous_Category::all();
      $categories = \App\Category::pluck('name_category','id');
      $sms = DB::table('contacts')->count();
      return view('affiche-souscat', compact('sous_categories','categories','sms'));
   }








public function destroy_localite($id)
{   
  
   $localite = Localite::find($id);
   if($localite)
      $localite->delete();
   return redirect('/affiche-localite');
}


  public function affiche_localite(){
      $localities =Localite::all();
      $sms = DB::table('contacts')->count();
      return view('affiche-localite', compact('localities','sms'));
   }


  public function add_localite(Request $request)
   {
      $localite = new Localite();
       $name = $request->input('name_localite');
       $localities= Localite::where('name_localite',$name)->first();      
      if(empty($localities))
         {
            $localite->name_localite=strtolower($name); 
            $localite->save();
            return redirect('/ajout-localite')->with('success', 'Localite ajout??e avec succ??s !!');
         }
      else{   
         return redirect('/ajout-localite')->with('success', 'localit?? d??ja ajout??e merci !!');
     }
    }

       public function localite()
   {
      $sms = DB::table('contacts')->count();
      return view('ajout-localite',compact('sms')) ;

   }


  
      public function search()
    {
        request()->validate([
            'q' => 'required|min:3'
        ]);

        $q = request()->input('q');
        $rubrique= request()->input('rubrique');
        $localite= request()->input('localite');
        $prix_min= request()->input('prix_min');
        $prix_max= request()->input('prix_max');
        $type_annoce= request()->input('type_annoce');
        $type_annonceur= request()->input('annonceur');
        $optionPhoto= request()->input('optionPhoto');
        $optionTri= request()->input('optionTri');
        $optionCouleur= request()->input('optionCouleur');
         

               $products = Product::where('name_product', 'like', "%$q%")
                ->orWhere('description_product', 'like', "%$q%")
                ->paginate(6);
                
                 $category= Category::All();
                $sous_rubrique = \App\Sous_Category::pluck('name','id');
                 $immo = DB::table('categories')->where('name_category', 'like', "%immo%")->count();
                 $agence = DB::table('categories')->where('name_category', 'like', "%agenceimmo%")->count();
                 $forage = DB::table('categories')->where('name_category', 'like', "%forage%")->count();
                 $bank = DB::table('categories')->where('name_category', 'like', "%banqueinstituts%")->count();
                   $categories = \App\Category::pluck('name_category','id');
                   $localite =   \App\Localite::pluck('name_localite','id');
        return view('search', compact('products','localite','category','categories','immo','agence','forage','bank','sous_rubrique'));
    }

}