@extends('layouts.admin')

    @section('content')
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    
                    <th>Nom annonce</th>
                    <th>Prix</th>
                    <th>whatsapp</th>
                    <th>Categorie</th>
                    <th>Sous cat</th>
                    <th>Localite</th>
                    <th>Annonceur</th>
                    <th>edit</th>
                    <th>del</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th>{{$product->name_product}}</th>
                        <th>{{$product->prix_product}}</th>
                        <th>{{$product->whatsapp_product}}</th>
                        <th>{{$product->category->name_category}}</th>
                        <th>{{$product->sous_category->name}}</th>
                        <th>{{$product->localite->name_localite}}</th>
                        <th>{{$product->business->name_business ?? 'particulier'}}</th>
                        <th><a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a></th>
                        <th>
                        
                        <form action="" method="post">
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