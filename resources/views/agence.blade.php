@extends('layouts.app')

    @section('content')
<!-- ======= Clients Section ======= -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="p-4" style="background:#009970;">
            <form action="">
              <div class="row">
                <div class="col-12 col-md-3">
                    <input type="text" class="form-control w-100" placeholder="Que rechercher vous?">
                </div>
                <div class="col-12 col-md-3 ">
                    <select name="" id="" class="w-100">TOUTES LES RUBRIQUES
                      <option value="" style="font-weight: bold;color: green;">TOUTES LES RUBRIQUES </option>
                                                @foreach($category as $key => $value)
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-3 ">
                    <select name="" id="" class="w-100">LOCALITES
                      <option value="" style="font-weight: bold;color: green;">LOCALITES </option>
                                                @foreach($localite as $key => $value)
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-3 ">
                    <button class="btn btn-success w-100" type="submit">RECHERCHER</button>
                </div>
              </div>
              <div class="card mt-2">
                <div class="card-header" id="search_avance" style="color:#009970;font-weight:bold;cursor:pointer;">RECHERCHE AVANCEE</div>
                  <div class="card-body" id="show_search_avance" style="background:#009970;display:none;  ">
                      <form action="">
                          <div class="row">
                              <div class="col-6 col-md-3">
                                  <label for="" style="color:white;">Prix entre</label>
                                  <input type="text" class="form-control" placeholder="Prix min">
                              </div>
                              <div class="col-6 col-md-3">
                                  <label for="" style="color:white;">Et</label>
                                  <input type="text" class="form-control" placeholder="Prix max">
                              </div>
                              <div class="col-6 col-md-3">
                                  <label for="" style="color:white;">Type d'annonce</label>
                                  <select name="" id="">
                                      <option value="">Indifferent</option>
                                      <option value=""></option>
                                  </select>
                              </div>
                              <div class="col-6 col-md-3">
                                  <label for="" style="color:white;">Type d'annonceur</label>
                                  <select name="" id="">
                                      <option value="">Indifferent</option>
                                      <option value=""></option>
                                  </select>
                              </div>
                          </div>
                          <hr class="bg-white">
                          <div class="row">
                                <div class="col-md-3">
                                    <input type="radio"> <label for="" style="color:white;">Avec photo</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="radio"> <label for="" style="color:white;">A la une</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="radio"> <label for="" style="color:white;">Urgent</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="radio"> <label for="" style="color:white;">Encadr??e</label>
                                </div>
                          </div>
                      </form>
                  </div>
              </div>
            </form>
        </div>
        
    </section>
    <!-- End About Section -->
    <!-- ======= Counts Section ======= -->
    <!-- section id="counts" class="counts">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">232</span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">521</span>
            <p>Projects</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,463</span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">15</span>
            <p>Hard Workers</p>
          </div>

        </div>

      </div>
    </section>< End Counts Section -->


    <section>
     
        
                
       
         <!-- Recent Product Start -->
        <div class="recent-product product">
            <div class="">
                <div class="section-header" style="background:#009970;">
                    <h4 class="text-center" style="color:white;">R</h4>Rubrique Agence Immo
                </div>
             <!-- Recent Product End -->    
                <div class="shop-home-list section w-100">
                     @foreach($rubrique_agence as $product)
                        
                        <div class="col-lg-3 m-1">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">Nom produit</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="/produit/{{$product->id }}/show"><img  src="{{$product->image_product ? asset($product->image_product) : asset('uploads/images/default.png')}}" alt="#"></a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h4><span></span>{{$product->prix_product}} FCFA</h4>
                                <a class="btn" href="/pub/{{$product->id }}/show"><i class="fa fa-eye"></i>Voir les details</a>
                            </div>
                        </div>
                    </div>
                 @endforeach
                </div>
            </div>
        </div>
         <!-- Recent Product Start -->
        
            
    </section>

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="">
          <div class="p-2 mb-2" style="background:#009970;">
            <h4 class="text-center" style="color:white;">NOS DIFFERENTES RUBRIQUES </h4>
          </div>
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box mt-4 mt-xl-0">
                  <a href="/immo"><i class="icofont-home"></i></a>
                    <a href="/immo"><h4>Annonce IMMO</h4></a>
                    <p>Cette Rubrique permettre au particulier ou courtier de faire leur annonce dans le domaine immobilier .</p>
                  </div>
                </div>
                <div class="col-xl-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon-box mt-4 mt-xl-0">
                   <a href="/agence"><i class="icofont-building"></i></a>
                    <a href="/agence"><h4>Agence Immo</h4></a>
                    <p>Avec cette rubrique les agences immobilieres vont faire l'annonce de leur propre produit immobilier .</p>
                  </div>
                </div>
                <div class="col-xl-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                  <div class="icon-box mt-4 mt-xl-0">
                    <a href="/forage"><i class="icofont-water-drop"></i></a>
                    <a href="/forage"><h4>Conception de Forage</h4><a href="/forage">
                    <p>Cette rubrique permettra aux entreprises specialises dans la conception de forage de pouvoir faire leur annonce pour divers types de forages.</p>
                  </div>
                </div>
                <div class="col-xl-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon-box mt-4 mt-xl-0">
                    <a href="/banque"><i class="icofont-bank-transfer"></i></a>
                    <a href="/banque"><h4>Institut financier</h4></a>
                    <p>Par le biais de cette rubrique les banques et instituts financiers peuvent faire des annoncent pour les differentes possibilites de pret ou de financement sur le plan immobilier .</p>
                  </div>
                </div>
                
              </div>
            </div><!-- End .content-->
      </div>
    </section><!-- End Why Us Section -->

     <!-- ======= Cta Section ======= -->
     <section id="cta" class="cta " style="background:#009970">
        <div class="text-center mb-4">
            <h1 class="" style="color:white;font-weight:bold;">Avez-vous quelque chose ?? vendre ou ?? louer?</h1>
            <h5 style="color:white;">Vendez vos produits et services en ligne GRATUITEMENT.Avec MAKIMO c'est plus facile que vous pouvez l'imaginez!</h>
        </div>
        <div class="d-flex justify-content-center ">
          <li class="btn btn-danger"><a href="/pub"><span style="color: white;
           ">Poster votre annonce</span></span></a></li>
        </div>
    </section><!-- End Cta Section -->

    <!-- ======= Contact Section ======= -->
    <script>
            document.getElementById('search_avance').addEventListener('click', function(){
                if(document.getElementById('show_search_avance').style.display=="none"){
                    document.getElementById('show_search_avance').style.display="block";
                }

                else{
                    document.getElementById('show_search_avance').style.display="none";
                }
            });
      </script>
    @endsection