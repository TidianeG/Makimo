@extends('layouts.app')
    @section('content')
     
        <p><span style="font-weight: bold;"><i class="fas fa-chevron-left"></i>  <a href="/">Retour</a></span>    <span class="ml-5"> /  <a href="/">Acceuil</a>  /  <a href="/pub">Annonce</a> / <a href="/{{$product->category->name_category ?? ""}} "></a>  
          <a href="#">{{$product->name_product}}</a></span> </p>
        <section class="container" style="height:auto">
          <div class="row h-auto my-5">
              <div class="col-sm-12 col-md-6">
                 
                 <div id="myImg">
                    <?php foreach(json_decode($product->image_product) as $file){ ?>
                      <div class="m-2 ">
                          <img class="img-fluid rounded myImg" src="{{asset('/uploads/images/'.$file)}}" style="height:100% !important;width: 100%;" alt="">
                      </div>
                    <?php break; } ?>
                 </div>
                  <p>
                  </p>
                <div class="d-flex justify-content-start">
                    <?php foreach(json_decode($product->image_product) as $file){ ?>
                      <div class="m-2 ">
                          <img class="myImg" src="{{asset('/uploads/images/'.$file)}}" width="100px" height="50px" alt="Trolltunga, Norway">
                      </div>
                    <?php } ?>
                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                      <img class="modal-content" id="img01">
                      <div id="caption"></div>
                    </div>
                </div>
              </div>
              <div class="card border-success " style="width: 500px;">
                <div class="card-header" style="font-weight: bold;"><H4>Contacter L'annonceur</H4></div>
                    <div class="card-header">
                      <div>
                          <?php
                              if ($product->category->name_category !="particuliers") {
                          ?>
                          <span><img  class="img-fluid rounded " src="{{$product->business->image_business ?  asset($product->business->image_business) : asset('uploads/images/default.png')}} " alt="" style="height:50% !important;width:50%;"></span>
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
                     <i class="fa fa-phone text-white" aria-hidden="true"></i><span class="ml-3">+224{{$product->whatsapp_product}} <span style="font-size: 1px;">............................................................................................................................................................................................................................................................<span> </span></a> <br>
                    
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
                <div class="car-body">
                    <div class="d-flex m-4">
                        <h5>Prix du produit : </h5>
                        <h4 class="btn btn-danger" style="color:white;"> {{$product->prix_product}}FCFA</h4>
                    </div>
                    <div class="d-flex m-4">
                        <h5>Nom du produit : </h5>
                        <h4 class="btn btn-success"> {{$product->name_product}}</h4>
                    </div>
                    <div class="m-4">
                        <h5>Description du produit</h5>
                        <h6 style="font-weight: initial;" class="text-justify">
                            {{$product->description_product}}
                        </h6>
                    </div>
                    
                <div>              
            </div>
        </section>
       <style>
           .myImg {
                border-radius: 5px;
                cursor: pointer;
                transition: 0.3s;
                display: block;
                margin-left: auto;
                margin-right: auto
            }
            .myImg:hover {opacity: 0.7;}
                /* The Modal (background) */
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 9999; /* Sit on top */
                padding-top: 100px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
            }
                /* Modal Content (image) */
            .modal-content {
                margin: auto;
                display: block;
                width: 75%;
                //max-width: 75%;
            }
                /* Caption of Modal Image */
            #caption {
                margin: auto;
                display: block;
                width: 80%;
                max-width: 700px;
                text-align: center;
                color: #ccc;
                padding: 10px 0;
                height: 150px;
            }
            @-webkit-keyframes zoom {
                from {-webkit-transform:scale(1)}
                to {-webkit-transform:scale(2)}
            }
            
            @keyframes zoom {
                from {transform:scale(0.4)}
                to {transform:scale(1)}
            }
            @-webkit-keyframes zoom-out {
                from {transform:scale(1)}
                to {transform:scale(0)}
            }
            @keyframes zoom-out {
                from {transform:scale(1)}
                to {transform:scale(0)}
            }
                /* Add Animation */
            .modal-content, #caption {
                -webkit-animation-name: zoom;
                -webkit-animation-duration: 0.6s;
                animation-name: zoom;
                animation-duration: 0.6s;
            }
            .out {
                animation-name: zoom-out;
                animation-duration: 0.6s;
              }
                  /* 100% Image Width on Smaller Screens */
              @media only screen and (max-width: 700px){
                  .modal-content {
                      width: 100%;
                  }
              }
        </style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
            <script>
                // Get the modal
                var modal = document.getElementById('myModal');
                
                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById('myImg');
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                
                $(document).ready(function() {
                    $(".myImg").click(function(){ 
                      modal.style.display = "block";
                    modalImg.src = this.src;
                    modalImg.alt = this.alt;
                    captionText.innerHTML = this.alt;
                    });
                });
                
                
                // When the user clicks on <span> (x), close the modal
                modal.onclick = function() {
                    img01.className += " out";
                    setTimeout(function() {
                      modal.style.display = "none";
                      img01.className = "modal-content";
                    }, 400);
                    
                }    
        
            </script>
    @endsection