@extends('layouts.app')
  @section('content')
    <div class="table-responsive">
      <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            
            <th class="col-info"> <span style="font-size: 20px; ">Produit<span></th>
            <th  class="col-info"><span style="font-size: 20px; ">Prix Produit<span></th>
            
            <th class="col-info"><span style="font-size: 20px; ">Categorie<span></th>
            <th class="col-info"><span style="font-size: 20px; ">Sous-Categorie<span></th>
            <th class="col-info"><span style="font-size: 20px; ">Image<span> </th>
            <th><span style="font-size: 20px; ">Edit<span></th>
            <th ><span style="font-size: 20px; ">Delete<span></th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
            <tr>
                
                <th>{{$product->name_product}}</th>
                <th>{{$product->prix_product}}</th>
                <th>{{ $product->Category->name_category}}</th>
                <th>{{ $product->Sous_Category->name}}</th>
                <th>
                  <?php foreach(json_decode($product->image_product)as $file){ ?>
                      <img style="width:80px;height:70px;" src="{{asset('/uploads/images/'.$file)}}" alt="" width="100">
                  <?php break; } ?>
                </th>
                <th> 
                  <a href="{{route('editer_produit',['id'=>$product->id])}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                </th>
                <th>
                  <form action="annonce/{{$product->id}}" method="post">
                    @csrf
                    @method('delete')
                  <button type="submit" class="btn btn-danger " id="" style=""><i class="fas fa-trash-alt"></i></i></button> 
                  </form>
                </th>
              </tr>
          @endforeach
        </tbody>
      
    </table>
  </div>
   
  @endsection
