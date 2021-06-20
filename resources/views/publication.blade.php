@extends('layouts.app')
  @section('content')
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                   
                <div class="container">
                    <form action="{{route('store_annonce')}}" method="POST" enctype="multipart/form-data" id="add_products">
                                @csrf
                                @if($errors->any())
                                @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                                @endforeach
                                @endif
                                <div class="row">   
                                     <h2>Veuillez ajouter de nouveaux produits</h2>
                                    <div class="form-group col-6">
                                        <label for="sexe" class=" " style="color:green;">Categorie</label>
                                        <div class="col-8">
                                            <select name="category_id" id="name_cat" class="form-control">
                                                <option value=""></option>
                                                @foreach($categories as $key => $value)
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                  </div>
                                    <div class="form-group col-6">
                                        <label for="sexe" class=" " style="color:green;">Sous_Categorie</label>
                                        <div class="col-8">
                                            <select name="sous_category_id" id="sous_category_id" class="form-control">
                                                <option value=""></option>
                                                @foreach($sous_category as $key => $value)
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                  </div>
                                    
                                
                               
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">

                                        <label for="inputEmail" style="color:green;" class="">Nom produit<span style="background-colol:red;">*</span></span></label>
                                        <div class="col-10">
                                            <input type="text" name="name_product"  id="name_product" class="form-control" placeholder="le nom du produit">
                                        </div>
                                    </div>   
                                </div>
                                <div class="row ">
                                    <div class="col-sm-12 col-md-5">
                                            <label for="inputPassword" style="color:green;" class="">Prix du produit</label>
                                            <div class="col-10">
                                                <input type="text" name="prix_product" id="prix_product" class="form-control" placeholder="Le prix du produit">
                                            </div>
                                      </div>
                                </div>
                               <div class="row ">
                                    <div class="col-sm-12 col-md-5">
                                            <label for="inputPassword" style="color:green;" class="">	localisation du produit</label>
                                            <div class="col-10">
                                                <input type="text" name="localite_product" id="localite_product" class="form-control" placeholder="Le prix du produit">
                                            </div>
                                      </div>
                                </div>
                               <div class="row ">
                                    <div class="col-sm-12 col-md-5">
                                            <label for="inputPassword" style="color:green;" class="">	 Votre numero de whatsapp</label>
                                            <div class="col-10">
                                                <input type="text" name="whatsapp_product" id="whatsapp_product" class="form-control" placeholder="Le numero de whatsapp">
                                            </div>
                                      </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5 ">
                                        <label for="inputPassword" style="color:green;" class=" ">Description du produit</label>
                                        <div class="col-10">
                                            <textarea name="description_product" id="description_product" cols="30" rows="3" class="form-control" placeholder="La description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5 ">
                                        <label for="" style="color:green;" class=" ">Image du produit</label>
                                        <div class="col-10" >
                                            <input type="file" name="image_product" class="form-control" id="image_product">
                                        </div>
                                    </div>
                                    <div class="col-12" id="info_add_product"></div>
                                </div>
                                <div class="d-flex justify-content-between">         
                                    <button type="submit" style="width:150px;border-radius:5px;" class="btn btn-success">Enregistrer</button>
                                    <button type="reset" style="width:150px;border-radius:5px;" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                </div>
                    </form>
                </div>
            <script>
                // récuperation des ids des inputs
                let add_products= document.getElementById('add_products');
                let name_cat= document.getElementById('name_cat');
                let name_vendeur= document.getElementById('name_vendeur');
                let name_product= document.getElementById('name_product');
                let prix_product= document.getElementById('prix_product');
                let description_product= document.getElementById('description_product');
                let image_product= document.getElementById('image_product');
                let name_sous_cat= document.getElementById('name_sous_cat');

                // récuperation des id des divs info
                let info_add_product= document.getElementById('info_add_product');

                // déclaration tableau des inputs et tableau des divs info

                let inputs=[];
                inputs[0] = name_cat;inputs[1] = name_sous_cat;inputs[2] = name_product;inputs[3] = prix_product;inputs[4] = localite_product; inputs[5] =name_vendeur; inputs[6] =description_product; inputs[7] = image_product;inputs[8] = whatsapp_product;inputs[8]=sous_category_id;


                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].addEventListener('focus',function(){
                        for (let j = 0; j < i; j++) {
                            if (inputs[j].value==="") {
                                inputs[j].style.border="1px solid red";
                            }
                            else{
                                inputs[j].style.border="1px solid green";
                            }
                        }
                    });
                    
                }
                let pointeur =0;
                add_products.addEventListener('submit',function(e){
                    e.preventDefault();

                    for (let i = 0; i < inputs.length; i++) {
                        if (inputs[i].value==="") {
                            info_add_product.classList.add("alert","alert-danger");
                            info_add_product.innerText="veuiller remplir tous les champs";
                            inputs[i].style.border="1px solid red";
                            pointeur++;
                        }
                        
                    }
                    
                    if (pointeur<=0) {
                        add_products.submit();
                    }
                });
            </script>
    @endsection        




