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
                <section>
                    <div class="recent-product product">
                        <div class="">
                            <div class="section-header" style="background:#1E90FF;">
                                <h4 class="text-center" style="color:white;">Mes annoces</h4>
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
                                        <?php foreach(json_decode($product->image_product)as $file){ ?>
                                                <img src="{{asset('/uploads/images/'.$file)}}" alt="">
                                            <?php break; } ?>
                                            <div class="product-action">
                                                <a href="/dashbord/mes-annonces/{{$product->id }}/edit"><i class="fa fa-info-circle"></i></a>
                                                <a href="/dashbord/mes-annonces/{{$product->id }}/edit"><i class="fa fa-edit"></i></a>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="product-price">
                                            <h4 style="color:white;">{{$product->prix_product}} FCFA</h4>
                                            <a class="btn btn-info" href="/dashbord/mes-annonces/{{$product->id }}/edit">Les Details </a>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
    @endsection