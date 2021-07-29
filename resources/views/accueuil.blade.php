@extends('layouts.app')
    @section('content')
<!-- ======= Clients Section ======= -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="p-4" style="background:#1E90FF;">
            <form action="">
              <div class="row">
                <div class="col-12 col-md-3">
                    <input type="text" class="form-control w-100" placeholder="Que rechercher vous?">
                </div>
                <div class="col-12 col-md-3 ">
                    <select name="" id="" class="w-100">TOUTES LES RUBRIQUES
                      <option value="" style="font-weight: bold;color: green;">TOUTES LES RUBRIQUES </option>
                                                @foreach($categories as $key => $value)
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
                    <button class="btn btn-dark w-100" type="submit">RECHERCHER</button>
                </div>
              </div>
              <div class="card mt-2">
                <div class="card-header" id="search_avance" style="color:#1E90FF;font-weight:bold;cursor:pointer;">RECHERCHE AVANCEE</div>
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
                                    <input type="radio"> <label for="" style="color:white;">Encadrée</label>
                                </div>
                          </div>
                      </form>
                  </div>
              </div>
            </form>
        </div>
        
    </section>
    <!-- End About Section -->
    <section>
         <!-- Recent Product Start -->
        <div class="recent-product product">
            <div class="container-fluid">
                <div class="section-header" style="background:#1E90FF;">
                    <h4 class="text-center" style="color:white;">Annonce á la une</h4>
                </div>
             <!-- Recent Product End -->    
                <div class="row">
                    @foreach($products as $product)
                      <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">{{$product->name_product}}</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <img  src="{{$product->image_product ? asset($product->image_product) : asset('uploads/images/default.png')}}" alt="#">
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h4 style="color:white;">{{$product->prix_product}} FCFA</h4>
                                <a class="btn btn-info" href="/pub/{{$product->id }}/show">Les Details </a>
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
          <div class="p-2 mb-2" style="background:#1E90FF;">
            <h4 class="text-center" style="color:white;">NOS DIFFERENTES RUBRIQUES </h4>
          </div>
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box mt-4 mt-xl-0">
                  <a href="/immo"><i class="icofont-home"></i></a>
                    <a href="/immo"><h4>Particuliers</h4></a>
                    <p>Cette Rubrique va permettre au particulier ou courtier de faire leur annonce dans le domaine immobilier .</p>
                    <a href="/credit" class="btn btn-info  " style="color: ">Achetez du crédit</a>

                  </div>
                </div>
                <div class="col-xl-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon-box mt-4 mt-xl-0">
                   <a href="/agence"><i class="icofont-building"></i></a>
                    <a href="/agence"><h4>Agence Immo</h4></a>
                    <p>Avec cette rubrique les entreprises qui evoluent aux agences immobilieres vont faire l'annonce de leur propre produit immobilier tout en donnant leurs propres informations comme les logos etc. </p>
                    <a href="/credit" class="btn btn-info  " style="color: ">Achetez du crédit</a>
                  </div>
                </div>
                <div class="col-xl-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                  <div class="icon-box mt-4 mt-xl-0">
                    <a href="/forage"><i class="icofont-water-drop"></i></a>
                   <a href="/forage"> <h4>Conception de Forage</h4></a>
                    <p>Cette rubrique permettra aux entreprises specialises dans la conception de forage de pouvoir faire leur annonce pour divers types de forages tout en donnant leur propre information et identités.</p>
                    <a href="/credit" class="btn btn-info  " style="color: ">Achetez du crédit</a>
                  </div>
                </div>
                <div class="col-xl-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon-box mt-4 mt-xl-0">
                    <a href="/banque"><i class="icofont-bank-transfer"></i></a>
                    <a href="/banque"><h4>BTP</h4></a>
                    <p>Par le biais de cette rubrique les entreprise BTP peuvent faire leur propre annonce tout en presentant leurs entreprises et leurs identitités comme les logos etc.</p>
                    <a href="/credit" class="btn btn-info  " style="color: ">Achetez du crédit</a>
                  </div>
                </div>
                
              </div>
            </div><!-- End .content-->
      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <!--
    <section id="services" class="services section-bg">
      <div class="container">     
            <div class="row">
              <div class="col-md-3 d-flex align-items-stretch">
                <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon"><i class="bx bxl-dribbble"></i></div>
                  <h4><a href="">Lorem Ipsum</a></h4>
                  <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                </div>
              </div>

              <div class="col-md-3 d-flex align-items-stretch mt-4 mt-lg-0">
                <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4><a href="">Sed ut perspiciatis</a></h4>
                  <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                </div>
              </div>

              <div class="col-md-3 d-flex align-items-stretch mt-4">
                <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon"><i class="bx bx-tachometer"></i></div>
                  <h4><a href="">Magni Dolores</a></h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                </div>
              </div>

              <div class="col-md-3 d-flex align-items-stretch mt-4">
                <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                  <div class="icon"><i class="bx bx-world"></i></div>
                  <h4><a href="">Nemo Enim</a></h4>
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                </div>
              </div>

            </div>
      </div>
    </section>  
   -->
     <!-- ======= Cta Section ======= -->
     <section id="cta" class="cta " style="background:#1E90FF">
        <div class="text-center mb-4">
            <h1 class="" style="color:white;font-weight:bold;">Avez-vous quelque chose à vendre ou à louer?</h1>
            <h5 style="color:white;">Vendez vos produits et services en ligne GRATUITEMENT. Avec MAKIMO c'est plus facile que vous pouvez l'imaginez!</h>
        </div>
        <div class="d-flex justify-content-center ">
           <li class="btn btn-dark"><a href="/pub"><span style="color: white;
           ">Poster une annonce</span></span></a></li>
        </div>
    </section><!-- End Cta Section -->
     <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts mt-5" style="background-color: white; border: 2px solid #1E90FF;">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up" style="color: #1E90FF;">232</span>
            <p style="color: black;">Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up" style="color: #1E90FF;">521</span>
            <p style="color: black;">Annonces</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up" style="color: #1E90FF;">1,463</span>
            <p style="color: black;">Chiffre d'affaires</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up" style="color: #1E90FF;">15</span>
            <p style="color: black;">Partenaires</p>
          </div>

        </div>

      </div>
    </section>

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