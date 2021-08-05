@extends('layouts.app')
    @section('content')
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
                <div class="d-flex justify-content-end">
                    <a href="#" data-toggle="modal" data-target="#nbrecredit" class="btn btn-primary">Voir mes crédits</a>
                </div>
            </div>
        @endif
        @if (session('danger'))
            <div class="alert alert-danger" role="alert">
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
                    <form action="/achat_credit" method="post"> 
                        @csrf
                        <input type="hidden" name="nbre_credit" value="{{$pack->nbre_credit}}">
                        <input type="hidden" name="prix_pack" value="{{$pack->prix_pack}}">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-info">Acheter le pack</button>
                        </div>
                    </form>
                </div>

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

                    <!--- Fin modall add pack -->
    @endsection