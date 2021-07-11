@extends('layouts.app')
    @section('content')
     
        <p><span style="font-weight: bold;"><i class="fas fa-chevron-left"></i>  <a href="/">Retour</a></span>    <span class="ml-5"> /  <a href="/">Acceuil</a>  /  <a href="/pub">Annonce</a> / <a href="/{{$product->category->name_category ?? ""}} "></a>  
          <a href="#">{{$product->name_product}}</a></span> </p>
        <section class="container" style="height:auto">
          <div class="row h-auto my-5">
              <div class="col-sm-12 col-md-6">
                 
                 <div id="myImg"><img  class="img-fluid rounded " src="{{$product->image_product ? asset($product->image_product) : asset('uploads/images/default.png')}}" alt="" style="height:100% !important;width:380%"></div>
                  <p>
      
      

    </p>
              </div>
              <div class="card border-success mb-3 ml-5" style="width: 500px;">
  <div class="card-header" style="font-weight: bold;"><H4>Contacter L'annonceur</H4></div>

                    <div class="" >
                      <H6>logo de l'entreprise. </H6><br>
                      
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