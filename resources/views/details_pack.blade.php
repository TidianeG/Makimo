@extends('layouts.app')
    @section('content')
        @if (session('success'))
            <div class="alert alert-success" role="alert" id="myinfo">
                {{ session('success') }}
                <div class="d-flex justify-content-end">
                    <a href="#" data-toggle="modal" data-target="#nbrecredit" class="btn btn-primary">Voir mes crédits</a>
                </div>
            </div>
        @endif
        @if (session('danger'))
            <div class="alert alert-danger" id="myinfo" role="alert">
                {{ session('danger') }}
            </div>
        @endif
       
                <div class="d-flex justify-content-center">
                    <div class="col-sm-6 col-md-3 mb-3">
                        <div class="card text-dark">
                            <div class="card-header  text-center" style="background:#1E90FF;font-weight: bold;">
                            <h4>{{$pack->nbre_credit}} CREDITS</h4>
                            </div>
                            <div class="card-body ">
                                <h2 class="card-title text-center" style="font-weight: bold;">{{$pack->prix_pack}} GNF</h2>
                            </div>
                            <div class="card-footer text-center" style="background:#1E90FF;">
                            <a href="#" class="btn btn-outline-light">{{$pack->nom_pack}}</a> 
                            </div>
                        </div>
            
                    </div>
                </div>

                <div class="card border-info p-4">
                    <div class="">
                        <span style="font-weight: bold;">Nom du pack : </span>  <h4 style="color:#1E90FF;">{{$pack->nom_pack}}</h4>
                    </div>
                    <div>
                        <span style="font-weight: bold;">Prix du pack : </span> <h4 style="color:#1E90FF;">{{$pack->prix_pack}} <span style="color: black;">GNF</span></h4>
                    </div>
                    <div>
                        <span style="font-weight: bold;"> Nombre de crédit du pack : </span> <h4 style="color:#1E90FF;">{{$pack->nbre_credit}}</h4>
                    </div>
                    <img src="{{asset('assets/img/logo.jpeg')}}" class="img-fluid" alt="" width="295px;" style="margin-left: 780px;margin-top: -150px">
                    
                    
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#info_paiement">Acheter le pack</a>
                    </div>
                </div>
                <!--debut information pour le paiement-->
                <div class="modal fade " id="info_paiement" >
                    <div class="modal-dialog  modal-md">
                        <div class="modal-content" >
                            <!-- Modal Header -->
                            <div class="modal-header" style="">
                                <h4>Veuiller remplir les champs pour valider l'achat de crédit</h4>
                                <button type="button" class="close bg-danger btn-danger " data-dismiss="modal">&times;</button>
                            </div>                        
                            <!-- Modal body -->
                            <div class="modal-body ">
							    <div class="  " style="height:100%;overflow-x:scroll;">
								    <form action="#" method="get" > 
                                        @csrf
                                        <input type="hidden" name="nbre_credit" value="{{$pack->nbre_credit}}">
                                        <input type="hidden" id="prix_pack_pay" name="prix_pack" value="{{$pack->prix_pack}}">
                                        <div class="row">
                                            <div class="form-group col-12">
                                            <label for="inputPrenom" class="ml-3" style="font-weight:bold;color:black;">Prénom</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control h-50" id="prenom_pay" name="prenom" placeholder="Votre Prenom">
                                            </div>
                                            </div>
                                            <div class="col-12" id="" class=""></div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12 ">
                                            <label for="inputPassword" class="ml-3" style="font-weight:bold;color:black;">Nom</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control h-50" id="nom_pay" name="nom" placeholder="Votre Nom">
                                            </div>
                                            </div>
                                            <div class="col-12" id="" class=""></div>
                                        </div>
                                        <div class="row ">
                                            <div class="form-group col-12">
                                                <label for="inputPassword" class="ml-3" style="font-weight:bold;color:black;">Adresse</label>
                                                <div class="col-12">
                                                <input type="text" class="form-control h-50" id="adresse_pay" name="adresse" placeholder="Votre Adresse">
                                                </div>
                                            </div>
                                            <div class="col-12" id="" class=""></div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12 ">
                                            <label for="inputPassword" class="ml-3"style="font-weight:bold;color:black;">Telephone</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control h-50" id="phone_pay" name="phone" placeholder="Votre Telephone">
                                            </div>
                                            </div>
                                            <div class="col-12" id="" class=""></div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12 ">
                                            <label for="inputPassword" class="ml-3"style="font-weight:bold;color:black;">Email</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control h-50" id="mail_pay" name="mail" placeholder="Votre email">
                                            </div>
                                            </div>
                                            <div class="col-12" id="" class=""></div>
                                        </div>
                                        <script src=https://touchpay.gutouch.com/touchpay/script/prod_touchpay-0.0.1.js type="text/javascript"></script>
                                        <div class="d-flex justify-content-center">
                                            <button id="form_pay" class="btn btn-info">Valider le pack</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin informations pour le paiement -->
                <div class="modal fade " id="nbrecredit" >
                    <div class="modal-dialog  modal-md">
                        <div class="modal-content" >
                            <!-- Modal Header -->
                            <div class="modal-header" style="">
                                <button type="button" class="close bg-danger btn-danger " data-dismiss="modal">&times;</button>
                            </div>                        
                            <!-- Modal body -->
                            <div class="modal-body ">
							    <div class="  " style="height:100%;overflow-x:scroll;">
								    <div class="card auth ">
									    <div class="card-header auth-header login100-form-title" >
										    <span class="login100-form-title-1" style="size:16px;font-weight:bold;">
											Mes Crédits
										    </span>
									    </div>                        
									    <!-- Modal body -->
									    <div class="card-body  p-3" style="height:auto;">
                                                <div class="d-flex justify-content-center">
                                                    <h5>Solde : <span style="color:red;">{{Auth::user()->client->credit->nbre_credit}}  CREDITS</span></h5>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <script>
                    setTimeout(function() {
                    $("#myinfo").fadeOut().empty();
                    }, 5000);
                    
                    let form_pay = document.getElementById('form_pay');
                    let prix_pack_pay = document.getElementById('prix_pack_pay').value;
                    let prenom_pay = document.getElementById('prenom_pay').value;
                    let nom_pay = document.getElementById('nom_pay').value;
                    let adresse_pay = document.getElementById('adresse_pay').value;
                    let phone_pay = document.getElementById('phone_pay').value;
                    let mail_pay = document.getElementById('mail_pay').value;
                    
                    form_pay.addEventListener('click', function(e){
                        e.preventDefault();
                        let date= new Date();
                        let rend = (Math.floor(Math.random() * (99999999 - 1)) + 1) + 'MGN' ; 
                        let num_commande = date.getFullYear()+rend;
                        

                       sendPaymentInfos(num_commande, 'FOODS3875','XHU0id6iStE4mltSanm5VvHayoOBgmiiTBlfLGL4wzk1vTxJ5U' ,'maki-immo.com', "{{route('success_payment')}}" ,{{route('error_payment')}} ,prix_pack_pay , adresse_pay , mail_pay, prenom_pay, nom_pay, phone_pay) ;

                       

                    });
                    
                    
                </script>
    @endsection