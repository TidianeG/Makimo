@extends('layouts.app')
    @section('content')
        @if (session('success'))
            <div class="alert alert-success" role="alert" id="myinfo">
                {{ session('success') }}
                <div class="d-flex justify-content-end mb-2">
                    <a href="#" data-toggle="modal" data-target="#nbrecreditsuccess" class="btn btn-primary">Voir mes crédits</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="/pub" class=" btn btn-success">Publier une annonce</a>
                </div>
            </div>
        @endif
        <!-- Affichage solde credit-->
        <div class="modal fade " id="nbrecreditsuccess" >
                    <div class="modal-dialog  modal-md">
                        <div class="modal-content" >
                            <!-- Modal Header -->
                            <div class="modal-header" style="">
                                <h5>Mes Crédits</h5>
                                <button type="button" class="close bg-danger btn-danger " data-dismiss="modal">&times;</button>
                            </div>                        
                            <!-- Modal body -->
                            <div class="modal-body ">
                              <div class="d-flex justify-content-center">
                                <h5>Solde : <span style="color:red;">{{Auth::user()->client->credit->nbre_credit ?? ""}}  CREDITS</span></h5>
                              </div>
                      
                       
                            </div>                        
                      <!-- Modal body -->
                        
                        <div class="modal-footer d-flex justify-content-center">
                            <a href="/credit" class="btn btn-success">Acheter credit</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <!-- end affichage solde credit--> 
        
    @endsection