@extends('layouts.admin')
    @section('content')
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
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
        <div class="row">
          <div class=" col-2">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p><a href="/ajout-cat"><span class="right badge badge-danger">Ajout Rubrique</span></a></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/affiche-cat" class="small-box-footer">Liste des rubriques <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
          <div class="col-2">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p><a href="/ajout-souscat"><span class="right badge badge-danger">Ajout Sous-Rubrique</span></a></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/affiche-souscat" class="small-box-footer">Liste des sous-rubriques <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-2">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p><a href="/ajout-localite"><span class="right badge badge-danger">Ajout des Localités</span></a></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/affiche-localite" class="small-box-footer">Liste des localités  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-2">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p><a href="#" data-toggle="modal" data-target="#ajoutpack" ><span class="right badge badge-danger">Ajout Pack</span></a></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/affiche-pack" class="small-box-footer">Liste des Pack  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class=" col-2">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$sms}}</h3>

                <p>Les messages</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/liste_contact" class="small-box-footer">Lire les messages <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    @endsection