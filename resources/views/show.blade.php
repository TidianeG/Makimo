@extends('layouts.app')
    @section('content')
     
        <p><span style="font-weight: bold;"><i class="fas fa-chevron-left"></i>  <a href="/">Retour</a></span>    <span class="ml-5"> /  <a href="/">Acceuil</a>  /  <a href="/pub">Annonce</a> / <a href="/{{$product->category->name_category ?? ""}} "></a>  
          <a href="#">{{$product->name_product}}</a></span> </p>
        <section class="container" style="height:auto">
          <div class="row h-auto my-5">
              <div class="col-sm-12 col-md-6">
                 
                 <div id="myImg"><img  class="img-fluid rounded " src="{{$product->image_product ? asset($product->image_product) : asset('uploads/images/default.png')}}" alt="" style="height:100% !important;width: 100%;"></div>
                  <p>
        </p>
              </div>
              <div class="card border-success " style="width: 500px;">
                <div class="card-header" style="font-weight: bold;"><H4>Contacter L'annonceur</H4></div>
                    <div class="card-header">
                      <div>
                          <?php
                              if ($product->category->name_category !="immo") {
                          ?>
                          <span><img  class="img-fluid rounded " src="{{$product->image_product ?  asset($product->image_product) : asset('uploads/images/default.png')}} " alt="" style="height:50% !important;width:50%"></span>
                          <?php
                               }
                          ?>
                      </div>
                      <div class="d-flex "><span>Nom entreprise :  </span><h5 style="color:red;" class="ml-3">{{$product->Business->name_business ?? "Particulier"}}</h5></div>
                      <div><h6>Description</h6><p style="color:red;">{{$product->Business->description_business ?? ""}}</p></div>
                      <H6>Cliquez et discuter par whatsapp </H6><br>
                     <a href="https://wa.me/{{$product->whatsapp_product}}" target="_blank" class="text-white btn btn-success"><i class="fab fa-whatsapp text-white"></i><span class="ml-3">Discuter par whatsapp</span></a><br>
                     <br>
                    <H6>Appeler l'annonceur</H6><br>
                    <a class="text-white btn btn-info">
                     <i class="fa fa-phone text-white" aria-hidden="true"></i><span class="ml-3">45748759010 <span style="font-size: 1px;">............................................................................................................................................................................................................................................................<span> </span></a> <br>
                    
                   </a>
                    
                   
                  </div>  
              </div>
          </div>
        </section>
        <section>
          <div class="card mb-4 w-75" style="">
                    <div class="card-header">
                        <h3 class="mr-3 text-center" > Description Générale du produit.</h3>
                    </div>


<div class="ml-4 mt-3">
<h4>{{$product->prix_product}}FCFA</h4><br>
<h4>{{$product->name_product}}</h4><br>

<h5 style="font-weight: initial;" class="text-justify">
{{$product->description_product}}<br>
 </h5> <br>  </div>    
                 


                                                     

                                                                                                                                                                                 </h6>
      </div>
                </div> 
        </section>
        <style>
          
        </style>
        <script>
      
       
    </script>
    @endsection