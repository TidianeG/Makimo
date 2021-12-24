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
                
            </div>
        @endif
        <p><span style="font-weight: bold;"><i class="fas fa-chevron-left"></i>  <a href="/">Retour</a></span>    <span class="ml-5"> /  <a href="/">Acceuil</a>  /  <a href="/pub">Annonce</a> / <a href="/{{$products->category->name_category ?? ""}} "></a>  
          <a href="#">{{$products->name_product}}</a></span> </p>
        <section class="container" style="height:auto">
          <div class="row h-auto my-5">
              <div class="col-sm-12 col-md-6">
                 
                 <div id="myImg">
                    <?php foreach(json_decode($products->image_product) as $file){ ?>
                      <div class="m-2 ">
                          <img class="img-fluid rounded myImg" src="{{asset('/uploads/images/'.$file)}}" style="height:100% !important;width: 100%;" alt="">
                      </div>
                    <?php break; } ?>
                 </div>
                  <p>
                  </p>
                <div class="d-flex justify-content-start">
                    <?php foreach(json_decode($products->image_product) as $file){ ?>
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
                <div class="card-header d-flex justify-content-center" style="font-weight: bold; background:#1E90FF;">
                    <H4 style="color:white;">Détails de l'annonce </H4>
                </div>
                <div class="card-body">
                    <div class=" d-flex">
                        Nom annonce : 
                        <h4 class="font-italic font-bolder">{{$products->name_product}}</h4>
                    </div>
                    <div class="d-flex">
                        Categorie : 
                        <h4 class="font-italic font-bolder">{{$products->category->name_category}}</h4>
                    </div>

                    <div class="d-flex">
                        Sous category : 
                        <h4 class="font-italic font-bolder">{{$products->sous_category->name}}</h4>
                    </div>
                    <div class="d-flex">
                        Localité : 
                        <h4 class="font-italic font-bolder">{{$products->localite->name_localite}}</h4>
                    </div>
                    <div class="d-flex">
                        Prix de l'annonce : 
                        <h4 class="font-italic font-bolder">{{$products->prix_product}} GNF</h4>
                    </div>
                    <div class="d-flex">
                        Contact  : 
                        <h4 class="font-italic font-bolder">{{$products->whatsapp_product}}</h4>
                    </div>
                </div>  
                
                <div class="card-footer" style="background:#1E90FF;">
                    <div class="d-flex justify-content-around">
                        <a href="#" data-toggle="modal" data-target="#myModaledit" class="btn btn-success">Editer</a>
                        <a href="#" data-toggle="modal" data-target="#delete_annonce" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Start modal edit annonce-->
            <div class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height:auto !important;background:#009970  ;">
                            <div class="mb-1 modal-title w-100 ">
                                <img src="images/embleme.PNG" alt="" >
                                <h4 class="text-center" style="color:white;">Edition d'annonce</h4>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body container">
                            <form action="{{route('update_product',['id'=>$products->id])}}" method="post" id="edit">
                                @csrf 
                                @method('patch')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="inputEmail" class="ml-3" style="font-weight:bold;color:black;">Nom annonce</label>
                                        <div class="col-12">
                                            <input type="text" value="{{$products->name_product}}" class="form-control h-50" id="name" name="name" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row ">
                                    <div class="form-group col-12">
                                        <label for="inputPassword" class="ml-3" style="font-weight:bold;color:black;">Prix annonce</label>
                                        <div class="col-12">
                                            <input type="text" class="form-control h-50" id="price" name="price" value="{{$products->prix_product}}">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 ">
                                        <label for="inputPassword" class="ml-3"style="font-weight:bold;color:black;">Contact</label>
                                        <div class="col-12">
                                            <input type="text" class="form-control h-50" id="contact" name="contact" value="{{$products->whatsapp_product}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 ">
                                        <label for="inputPassword" class="ml-3"style="font-weight:bold;color:black;">Description</label>
                                        <div class="col-12">
                                            <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{$products->description_product}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-around mb-4">         
                                    <button type="submit" style="width:150px;border-radius:50px;height:30px !important;background:#009970; color:white;" class="">Modifier</button>
                                    <button type="reset" style="width:150px;border-radius:50px;height:30px !important;background:#BE1E2D; color:white;" class="" data-dismiss="modal">Annuler</button>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!-- end modal edit annonce -->
        
        <!-- start modal delete annonce -->
        <div class="modal fade" id="delete_annonce" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="height:auto !important;background:#009970  ;">
                            <div class="mb-1 modal-title w-100 ">
                                <img src="images/embleme.PNG" alt="" >
                                <h4 class="text-center" style="color:white;">Suppression d'annonce</h4>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <div class="d-flex justify-content-center">
                                <h6>Voulez-vous supprimer l'annonce ?</h6>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-around">
                           
                            <form action="/delete-annonce/{{$products->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                    <button type="submit" class="btn btn-danger " id="" style="">Supprimer</button>
                                    <button type="reset" data-dismiss="modal" class="btn btn-primary" ></button>  
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        <!-- end modal delete annoce-->
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