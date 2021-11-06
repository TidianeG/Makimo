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
      <!--- Modal add pack -->
        <div class="modal fade " id="ajoutpack" >
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
											Ajout dpack
										</span>
									</div>                        
									<!-- Modal body -->
									<div class="modal-body  p-3" style="height:auto;">
										<form action="/createPack" method="post" id="add_pack">
											@csrf 
											<div class="row">
												<div class="form-group col-12 ">
													<label for="inputEmail" class="" style="font-weight:bold;color:red;">Nom pack<span style="background-colol:red;">*</span></span></label>
													<div class="col-12">
														<input type="text" class="form-control" id="name_category" name="nom_pack" placeholder="Entrer nom pack">
													</div>
												</div>
                        <div class="col-12" id="info_cat"></div>
                      </div> 
                      <div class="row">
												<div class="form-group col-12 ">
													<label for="inputEmail" class="" style="font-weight:bold;color:red;">Prix pack<span style="background-colol:red;">*</span></span></label>
													<div class="col-12">
														<input type="number" class="form-control" id="name_category" name="prix_pack">
													</div>
												</div>
                        <div class="col-12" id="info_cat"></div>
                      </div>
                      <div class="row">
												<div class="form-group col-12 ">
													<label for="inputEmail" class="" style="font-weight:bold;color:red;">Nombre crédit<span style="background-colol:red;">*</span></span></label>
													<div class="col-12">
														<input type="number" class="form-control" id="name_category" name="nbre_credit" >
													</div>
												</div>
                        <div class="col-12" id="info_cat"></div>
                      </div>
                                            <div class="d-flex justify-content-center " style="">
                                                <button class=" btn-success" style="border-radius:70px;width:200px;height:45px;size:12px;font-weight:bold;">
                                                    Enregistrer
                                                </button>
						                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
      <!--- Fin modall add pack -->
    @endsection