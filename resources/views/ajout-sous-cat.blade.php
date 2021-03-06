@extends('layouts.admin')

    @section('content')
    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                   
                <div class="container  col-md-6 card" style="width: 98rem;">
                    <form action="{{route('add-souscat')}}" method="POST" enctype="multipart/form-data" id="add_sous">
                                @csrf
                                @if($errors->any())
                                @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                                @endforeach
                                @endif
                                <div class="">   
                                    <div class="card-header">
                                     
                                     <h3 style="font-weight: bold;font-size: 27px; color:green;">VEUILLEZ ajouter un Sous-Rubrique </h3>
                                    </div>
                                    
                                   
                                
                               
                                <div class="row ">
                                    <div class="col-sm-12 col-lg-12">

                                        <label for="sexe" class=" ml-3 " style="color:green;font-weight: bold;"><span class="right badge badge-success">Saisir le sous-rubrique</span></label>
                                        <div class="col-10">
                                            <input type="text" name="name"  id="name" class="form-control" placeholder="le nom du sous-rubrique">
                                        </div>
                                    </div>   
                                </div>
                                <div class="row">
                                                        <div class="form-group col-12">
                                                            <label for="sexe" class=" " style="color:red;">Categorie</label>
                                                            <select name="id_category" id="name_category_sous" class="form-control">
                                                                <option value=""></option>
                                                                    @foreach($categories as $key => $value)
                                                                    <option value="{{$key}}">{{$value}}</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-12" id="info_cat_sous"></div>
                                                    </div>
                                
                                <div class="d-flex justify-content-between mt-4">         
                                    <button type="submit" style="width:150px;border-radius:5px;" class="btn btn-success">Enregistrer</button>
                                    <button type="reset" style="width:150px;border-radius:5px;" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                </div>
                    </form>
                </div>
            <script>
                // r??cuperation des ids des inputs
                let add_products= document.getElementById('add_products');
                let name_cat= document.getElementById('name_cat');
                let name_vendeur= document.getElementById('name_vendeur');
                let name_product= document.getElementById('name_product');
                let prix_product= document.getElementById('prix_product');
                let description_product= document.getElementById('description_product');
                let image_product= document.getElementById('image_product');
                let name_sous_cat= document.getElementById('name_sous_cat');

                // r??cuperation des id des divs info
                let info_add_product= document.getElementById('info_add_product');

                // d??claration tableau des inputs et tableau des divs info

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
            