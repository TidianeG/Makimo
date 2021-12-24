@extends('layouts.app')
    @section('content')
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('danger'))
            <div class="alert alert-danger" role="alert">
                {{ session('danger') }}
                <div class="d-flex justify-content-end">
                    <a href="/credit" class="btn btn-success">Recharger du crédit</a>
                </div>
            </div>
        @endif
                   
                <div class="  card" style="">
                    <form action="{{route('store_annonce')}}" method="POST" enctype="multipart/form-data" id="add_products">
                                @csrf
                               
                                <div class="">   
                                    <div class="card-header">
                                     
                                     <h3 style="font-weight: bold;font-size: 27px; color:green;" class="text-center">VEUILLEZ POSTER UNE ANNONCE </h3>
                                    </div>
                                    <div class="form-group col-lg-12 ">
                                        <label for="sexe" class="" style="color:green;font-weight: bold;">
                                            <p>
                                                <span class="right badge badge-success">Selectionnez le Rubrique <span style="color:red;">*</span> </span>
                                            </p>
                                        </label>
                                        <div class="col-10">
                                            <select name="category_id" id="name_category" class="form-control">
                                                <option value=""></option>
                                                @foreach($categories as $key => $value)
                                                <option value="{{$value}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                  </div>
                                    <div class="form-group col-lg-12">
                                        <label for="sexe" class="  " style="color:green;font-weight: bold;"><span class="right badge badge-success">Selectionnez le Sous-Rubrique <span style="color:red;">*</span></span></label>
                                        <div class="col-10">
                                            <select name="sous_category_id" id="name_sous_category" class="form-control">
                                                <option value=""></option>
                                                @foreach($sous_category as $key => $value)
                                                <option value="{{$value}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                  </div>
                                  
                                  <div class="form-group col-lg-12">
                                        <label for="sexe" class="  " style="color:green;font-weight: bold;"><span class="right badge badge-success">Selectionnez la localite   <span style="color:red;">*</span></span></label>
                                        <div class="col-10">
                                            <select name="localite_id" id="localite_product"  class="form-control">
                                                <option value=""></option>
                                                @foreach($localite as $key => $value)
                                                <option value="{{$value}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                  </div>
                                <!--  champs professionnel ....... -->
                                <div id="pro_entreprise" style="display:none;">
                                    <div class="alert alert-primary m-3">Informations sur l'entreprise</div>
                                    <div class="row" >
                                        <div class="col-sm-12 col-lg-12">

                                            <label for="sexe" class=" ml-3 " style="color:green;font-weight: bold;"><span class="right badge badge-success">Saisir le nom de l'entreprise <span style="color:red;">*</span></span></label>
                                            <div class="col-10">
                                                <input type="text" name="name_entreprise"  id="name_entreprise" class="form-control" placeholder="le nom de l'entreprise">
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="row" >
                                        <div class="col-sm-12 col-lg-12">

                                            <label for="sexe" class=" ml-3 " style="color:green;font-weight: bold;"><span class="right badge badge-success">Description de l'entreprise <span style="color:red;">*</span></span></label>
                                            <div class="col-10">
                                                <textarea name="description_entreprise" id="description_entreprise" cols="30" rows="3" class="form-control" placeholder="La description"></textarea>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="row" >
                                        <div class=" col-sm-12" style="width: 80px;">
                                            <label for="sexe" class=" ml-3 " style="color:green;font-weight: bold;"><span class="right badge badge-success">logo de l'entreprise <span style="color:red;">*</span></span></label>
                                            <div class="col-10">
                                                <input type="file" name="logo_entreprise" class="form-control" id="logo_entreprise">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  fin champs professionnel -->
                                <div class="row ">
                                    <div class="col-sm-12 col-lg-12">

                                        <label for="" class=" ml-3 " style="color:green;font-weight: bold;"><span class="right badge badge-success">Saisir le nom du produit <span style="color:red;">*</span></span></label>
                                        <div class="col-10">
                                            <input type="text" name="name_product"  id="name_product" class="form-control" placeholder="le nom du produit">
                                        </div>
                                    </div>   
                                </div>
                                <div class="row ">
                                    <div class="col-sm-12 col-lg-12">
                                            <label for="" class="ml-3 " style="color:green;font-weight: bold;"><span class="right badge badge-success">Saisir le prix du produit</span></label>
                                            <div class="col-10">
                                                <input type="text" name="prix_product" id="prix_product" class="form-control" placeholder="Le prix du produit">
                                            </div>
                                      </div>
                                </div>
                               
                               <div class="row  ">
                                    <div class="col-sm-12 col-lg-12">
                                            <label for="sexe" class=" ml-3 " style="color:green;font-weight: bold;">	 <span class="right badge badge-success">Saisir votre numero whatsapp</span></label>
                                            <div class="col-10">
                                                <input type="text" name="whatsapp_product" id="whatsapp_product" class="form-control" placeholder="Le numero de whatsapp">
                                            </div>
                                      </div>
                                </div>
                                <div class="row ">
                                    <div class="col-sm-12 col-lg-12 ">
                                        <label for="sexe" class=" ml-3 " style="color:green;font-weight: bold;"><span class="right badge badge-success">La description de l'annonce <span style="color:red;">*</span></span></label>
                                        <div class="col-10">
                                            <textarea name="description_product" id="description_product" cols="30" rows="3" class="form-control" placeholder="La description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="" class=" ml-3 " style="color:green;font-weight: bold;"><span class="right badge badge-success">Etat de l'annonce <span style="color:red;">*</span></span></label>
                                    <div class="row container">
                                        <div class="col-3">
                                            <div>
                                                Par défaut <input type="checkbox" id="defaut" name="defaut" value="defaut">
                                            </div>
                                            <div style="color:red;">
                                                1 crédit
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                A la une <input type="radio" id="optionTri1" name="optionTri" value="une" >
                                            </div>
                                            <div style="color:red;">
                                                2 crédits
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                Urgent <input type="radio" id="optionTri" name="optionTri" value="urgent">
                                            </div>
                                            <div style="color:red;">
                                                2 crédits
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                Encadrée <input type="checkbox" id="optionCouleur" name="optionCouleur" value="encadre">
                                            </div>
                                            <div style="color:red;">
                                                2 crédits
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-2">
                                    <div class="col-10 input-group control-group increment" >
                                        <input type="file" name="filenames[]" class="form-control">
                                        <div class="input-group-btn"> 
                                            <button id="success" class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row m-2">
                                    <div class="clone hide">
                                        <div class="control-group input-group col-10" style="margin-top:10px">
                                            <input type="file" name="filenames[]" class="form-control">
                                            <div class="input-group-btn"> 
                                                <button class="btn btn-danger " type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-12 m-4" id="info_add_product"></div>
                                <div class="d-flex justify-content-center mt-4 mb-4">         
                                    <button type="submit" style="width:150px;border-radius:5px;" class="btn btn-primary"  id="add_annonce">Enregistrer</button>
                                    
                                </div>
                                <style>
                                    span{
                                        margin-top:20px  !important;
                                        margin-bottom:10px i !important;
                                    }
                                </style>
                    </form>
                </div>
               
            <script>
                document.getElementById("optionTri").checked=false;
                document.getElementById("optionTri1").checked=false;
                document.getElementById('optionCouleur').checked=false;
                document.getElementById('defaut').checked=true;

                document.getElementById('optionCouleur').addEventListener('click', function(){ 
                        if (document.getElementById('optionCouleur').checked) {
                            //document.getElementById("optionTri").checked==false;
                            document.getElementById('defaut').checked=false;
                             
                        }
                    });
                    document.getElementById('defaut').addEventListener('click', function(){ 
                        if (document.getElementById('defaut').checked) {
                            document.getElementById("optionTri").checked=false;
                            document.getElementById("optionTri1").checked=false;
                            document.getElementById('optionCouleur').checked=false;
                             
                        }
                    });
                    document.getElementById('optionTri').addEventListener('click', function(){ 
                        if (document.getElementById('optionTri').checked) {
                            document.getElementById("defaut").checked=false;
                             
                        }
                    });
                    document.getElementById('optionTri1').addEventListener('click', function(){ 
                        if (document.getElementById('optionTri1').checked) {
                            document.getElementById("defaut").checked=false;
                             
                        }
                    });
                $(document).ready(function() {
                    
                        $("#success").click(function(){ 
                            var lsthmtl = $(".clone").html();
                            $(".increment").after(lsthmtl);
                        });
                        $("body").on("click",".btn-danger",function(){ 
                            $(this).parents(".control-group").remove();
                        });
                    });
                let name_cat= document.getElementById('name_category');
                let pro_entreprise= document.getElementById('pro_entreprise');
                 // récuperation des ids des inputs
                
                let localite_product= document.getElementById('localite_product');
                let name_product= document.getElementById('name_product');
                let description_product= document.getElementById('description_product');
                let image_product= document.getElementById('image_product');
                let name_sous_cat= document.getElementById('name_sous_category');
                
                //Debut inputs professionnel
                let name_entreprise= document.getElementById('name_entreprise');
                let description_entreprise= document.getElementById('description_entreprise');
                let logo_entreprise= document.getElementById('logo_entreprise');
                //finn inputs professionnel

                // récuperation des id des divs info
                let info_add_product= document.getElementById('info_add_product');
                
                // button add annoce
                let add_products = document.getElementById('add_products');

                // déclaration tableau des inputs et tableau des divs info
                let inputs=[];
                
                    name_cat.addEventListener('change',function(){
                        if (name_cat.value ==="" || name_cat.value =="particulier") {
                            pro_entreprise.style.display="none";     
                        }
                        else{   
                            pro_entreprise.style.display="block";  
                        }
                    });

                    // Verifications des champs input
                        if (pro_entreprise.style.display=="none") {
                            inputs[0] = name_cat;
                            inputs[1] = name_sous_cat;
                            inputs[2] = localite_product;
                            inputs[3] = name_product;
                            inputs[4] = description_product; 
                            inputs[5] = image_product;
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
                        }
                        else{
                            inputs[0] = name_cat;
                            inputs[1] = name_sous_cat;
                            inputs[2] = localite_product;
                            
                            inputs[3] = name_entreprise;
                            inputs[4] = description_entreprise;
                            inputs[5] = logo_entreprise;

                            inputs[6] = name_product;
                            inputs[7] = description_product; 
                            inputs[8] = image_product;
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
                        }

                    // verification de la valeurs des champs avant envoie
                    let pointeur = 0;
                    add_products.addEventListener('submit',function(e){
                        e.preventDefault();

                        for (let i = 0; i < inputs.length; i++) {
                            if (inputs[i].value==="") {
                                pointeur++;
                            }
                            //  alert(name_cat.value);  
                        }
                        if(pointeur>0){
                            info_add_product.classList.add("alert","alert-danger");
                                info_add_product.innerText="veuiller remplir les champs obligatoires, les champs avec * sont obligatoire";
                                inputs[i].style.border="1px solid red";
                        }        
                        else  {
                            add_products.submit();
                        } 
                    });
               // Si l'utilisateur selectionne par defaut

                    // Si l'utilisateur selectionne par encadrée
                    
                    
            </script>
    @endsection       




