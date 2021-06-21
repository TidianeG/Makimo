@extends('layouts.app')
    @section('content')
      <div class="card-header">
                    <h2 class="mr-3" style="text-align: center;color:#191348; ">Description générale du produit</h2>
      </div>
      
        <section class="container" style="height:auto">
          <div class="row h-auto my-5">
              <div class="col-sm-12 col-md-6">
                 
                  <div id="myImg"><img class="img-fluid rounded" src="{{$product->image_product ? asset($product->image_product) : asset('uploads/images/default.png')}}" alt="" style="height:100% !important;width:80%">
                  </div>
                  <p>
      
      <button type="button" onclick="agrandir()">+ Agrandir L'image</button>
      <button type="button" onclick="diminuer()">- Diminuer L'image</button>

                  </p>
              </div>
              <div class="col-sm-12 col-md-6" style="height:auto "> 
                  <div class="h-100 show-info" >
                    <div class="" >
                      <h6 class=""><span style="" class="" style="font-weight: bold;">{{$product->category->name_category ?? ""}}<span>
                      </h6>
                    </div>
                    <div style="margin-top:-5px im !important;">
                      <h4 class="" >{{$product->name_product}}</h4>
                    </div>
                    <div>
                      <h5 style="color:red;">{{$product->prix_product}} FCFA</h5>
                    </div>
                    
                    <div>
                      <h6 class="price with-discount mb-2">Description du produit : </h6>
                      <p>{{$product->description_product}}</p>
                    </div>
                    
                  </div>  
              </div>
          </div>
        </section>
        <style>
          
        </style>
        <script>
      
       
    </script>
    @endsection