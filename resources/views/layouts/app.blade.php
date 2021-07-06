<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MAKIMO </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  
  <link href="{{asset('plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet">
  <!-- iCheck -->
  <link rel="stylesheet"href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <link href="{{asset('assets/img/MAKIMO.PNG')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  
  
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/slick.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/style2.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bethany - v2.2.1
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center">
        <div class="logo mr-auto">
          <h1 class="text-light"><a href="index.html"><img src="{{asset('assets/img/MAKIMO.PNG')}}" class="img-fluid" alt=""></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
          <li class=""><a href="/"> Accueuil</span></a>
             
            </li>
           <li class="drop-down"><a href="#"> Immo <span class="badge badge-info right">{{$immo ?? ''}}</span></a>
              <ul>
                <li><a href="#">terrain</a></li>
                <li><a href="#">maison</a>
                </li>
              </ul>
            </li>
            <li class="drop-down"><a href="#">Agence Immo <span class="badge badge-info right">{{$agence ?? ''}}</span></a>
              <ul>
                <li><a href="#">terrain</a></li>
                <li><a href="#">maison</a>
                </li>
              </ul>
            </li>
            <li class="drop-down"><a href="#">forage<span class="badge badge-info right">{{$forage ?? ''}}</span></a>
              <ul>
                <li><a href="#">forage domestique</a></li>
                <li><a href="#">forage rural</a>
                </li>
              </ul>
            </li>
            <li class="drop-down"><a href="#">Entreprise BTP<span class="badge badge-info right">{{$bank ?? ''}}</span></a>
              <ul>
                <li><a href="#">banque</a></li>
                <li><a href="#">coperative habitat</a>
                </li>
              </ul>
            </li>
          
            <li class="drop-down"><a href="#">Compte</a>
              <ul>
              <?php
									if (auth()->guest()){
								?>
										<li><a href="/login" > <i class="fas fa-user-lock fa-md fa-fw mr-2 text-gray-400" aria-hidden="true"></i>Se connecter</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal"> <i class="fas fa-sign-in-alt fa-md fa-fw mr-2 text-gray-400" aria-hidden="true"></i>Creer un compte</a></li>
                    <li><a href="#" > <i class="fas fa-sign-in-alt fa-md fa-fw mr-2 text-gray-400" aria-hidden="true"></i>Passe oublié?</a></li>
								<?php    
								}
									else{                                 
								?>
                   <li><a href="#" > <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400" aria-hidden="true"></i>Mon compte</a></li>

                   <li><a href="#" > <i class="fas fa-luggage-cart fa-sm fa-fw mr-2 text-gray-400" aria-hidden="true"></i>Mes annonces</a></li>					
										<div class="dropdown-divider"></div>
                    <li>
												<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Deconnection
												</a>
												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
													@csrf
												</form>
										</li>
								<?php   
									}
								?>
              </ul>
            </li>
            <li class="get-started"><a href="/pub">Poster votre annonce</a></li>

          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height:50vh !important;">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>Makimo Annonces immobilieres</h1>
      <h2>Acheter, louer , se loger simplement .</h2>
      <a href="/contact" class="btn-get-started scrollto">Contactez-Nous</a>
    </div>
  </section><!-- End Hero -->
  <section id="clients" class="clients">
      <div class="container">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="100">
            <img src="{{asset('assets/img/clients/client-1.png')}}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="200">
            <img src="{{asset('assets/img/clients/client-2.png')}}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="300">
            <img src="{{asset('assets/img/clients/client-3.png')}}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="400">
            <img src="{{asset('assets/img/clients/client-4.png')}}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="500">
            <img src="{{asset('assets/img/clients/client-5.png')}}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="600">
            <img src="{{asset('assets/img/clients/client-6.png')}}" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->
    @if (session('success_info'))
    		<div class=" mt-5 alert alert-success">{{session('success_info')}}</div>
  		@endif
		@if (session('danger_info'))
    		<div class="mt-5 alert alert-danger">{{session('danger_info')}}</div>
  		@endif
  <main id="main" class="container mt-4 mb-4">
        @yield('content')
  </main><!-- End #main -->

    <!-- start modal incription-->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header" style="height:auto !important;background:#009970  ;">
					<div class="mb-1 modal-title w-100 ">
						<img src="images/embleme.PNG" alt="" >
						<h4 class="text-center" style="color:white;">Makimo-Inscription</h4>
					</div>
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					
				</div>
				<div class="modal-body container">
				    <form action="/ajouter_user" method="post" id="inscription">
											@csrf 
											<div class="row">
												<div class="form-group col-12">
													<label for="inputEmail" class="ml-3" style="font-weight:bold;color:black;">Prénom</label>
													<div class="col-12">
														<input type="text" class="form-control h-50" id="prenom_client" name="prenom" placeholder="Votre Prenom">
													</div>
												</div>
												<div class="col-12" id="info-prenom" class=""></div>
											</div>
											<div class="row">
												<div class="form-group col-12 ">
													<label for="inputPassword" class="ml-3" style="font-weight:bold;color:black;">Nom</label>
													<div class="col-12">
											     		<input type="text" class="form-control h-50" id="nom_client" name="nom" placeholder="Votre Nom">
													</div>
												</div>
												<div class="col-12" id="info-nom" class=""></div>
											</div>
											<div class="row ">
												<div class="form-group col-12">
														<label for="inputPassword" class="ml-3" style="font-weight:bold;color:black;">Adresse</label>
														<div class="col-12">
															<input type="text" class="form-control h-50" id="adresse_client" name="adresse" placeholder="Votre Adresse">
														</div>
												</div>
												<div class="col-12" id="info-adresse" class=""></div>
											</div>
											<div class="row">
												<div class="form-group col-12 ">
													<label for="inputPassword" class="ml-3"style="font-weight:bold;color:black;">Telephone</label>
													<div class="col-12">
														<input type="text" class="form-control h-50" id="phone_client" name="phone" placeholder="Votre Telephone">
													</div>
												</div>
												<div class="col-12" id="info-phone" class=""></div>
											</div>
											<div class="row">
												<div class="form-group col-12 ">
													<label for="inputPassword" class="ml-3" style="font-weight:bold;color:black;">Email</label>
													<div class="col-12">
														<input type="email" class="form-control h-50" id="email_client" name="email" placeholder="Votre mail">
													</div>
												</div>
												<div class="col-12" id="info-email" class=""></div>
											</div>
											<div class="row ">
												<div class="form-group col-12">
														<label for="inputPassword" class="ml-3" style="font-weight:bold;color:black;">Mot de passe</label>
														<div class="col-12">
															<input type="password" class="form-control h-50" id="password_client" name="password" placeholder="Votre password">
														</div>
												</div>
												<div class="col-12" id="info-password" class=""></div>
											</div>
											<div class="row">
												<div class="form-group col-12">
													<label for="inputPassword"class="ml-3" style="font-weight:bold;color:black;">Cofirmer mot de passe</label>
													<div class="col-12">
														<input type="password" class="form-control h-50" id="confirme_pass" name="confirme_pass" placeholder="confirmer password">
													</div>
												</div>
												<div class="col-12" id="info-confirme_pass" class=""></div>
											</div>
											<div class="d-flex justify-content-around mb-4">         
												<button type="submit" style="width:150px;border-radius:50px;height:30px !important;background:#009970; color:white;" class="">Enregistrer</button>
												<button type="reset" style="width:150px;border-radius:50px;height:30px !important;background:#BE1E2D; color:white;" class="" data-dismiss="modal">Annuler</button>
											</div>
											
										</form>
										<div class="d-flex justify-content-center mt-5">
											<a href="/login"  class="redirect-login" style=""> <i class="fas fa-user-lock fa-md fa-fw mr-2 text-gray-400" aria-hidden="true"></i> Se connecter</a>
										</div>
					</div>
				
				</div>
			</div>
		</div>
		<!-- end modal inscription-->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Makimo</h3>
            <p>
              Xxxxxxxxxxx <br>
              Xxxxxxx, Xxxxxxx<br>
              Guinnée <br><br>
              <strong>Téléphone:</strong> +Xxx xxxxxxxx<br>
              <strong>Email:</strong> contact@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Tous nos liens</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/">Accueuil</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/contact">A propos de nous</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Maison</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terrain</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Forage domestique</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Forage rural</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos banques</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Banques</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Cooperative habitat</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Newsletter</h4>
            <p> Abonnez-vous à notre newsletter et recevez les promos et    nouvelles arrivages de Makimo</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>2021</span></strong>All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">Makimo</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('assets/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('js/js_home/zoom.js')}}"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="{{asset('assets/js/easing.min.js')}}"></script>
  <script src="{{asset('assets/js/slick.min.js')}}"></script>
  <script src="{{asset('assets/js/main1.js')}}"></script>

</body>

</html>