@extends('layouts.app')
    @section('content')
        <div class="container">
        
          <h3 class="text-center mt-5" style="font-weight: bold;">NOS PACKS CREDITS </h3>
        
          <div class="row mt-5">
          
            @foreach($packs as $pack)
                <div class="col-sm-6 col-md-3 mb-3">
                    <div class="card text-dark">
                        <div class="card-header  text-center" style="background:#1E90FF;font-weight: bold;">
                          <h4>{{$pack->nbre_credit}} CREDITS</h4>
                        </div>
                        <div class="card-body ">
                            <h2 class="card-title text-center" style="font-weight: bold;">{{$pack->prix_pack}} GNF</h2>
                        </div>
                        <div class="card-footer text-center" style="background:##1E90FF;">
                          <a href="/credit/{{$pack->id}}/details_pack" class="btn btn-info ">ACHETER LE PACK</a> 
                        </div>
                    </div>
          
                </div>
            @endforeach
          </div>
        </div>
        <h4 class="mt-5" ><span style="font-weight: bold;">Règles d'utilisation des crédits.</span><br>
        ·   Une fois le paiement effectué, votre compte est automatiquement crédité du montant équivalent au crédit acheté <br>
        ·   Les crédits possèdent une durée de validité. <br>
        ·   Veuillez lire nos conditions générales d'utilisation.<br>

        </h4>
        <style>
            .card{
              border:3px solid #1E90FF;
            }

            h4{
              color:white;
            }
            h2{
              color:red;
            }
        </style>
    @endsection
  