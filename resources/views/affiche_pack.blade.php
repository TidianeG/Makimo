@extends('layouts.admin')

    @section('content')
    <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    
                    <th>Nom pack</th>
                    <th>Prix</th>
                    <th>Nobre crédit</th>
                    <th>edit</th>
                    <th>del</th>
                </tr>
                </thead>
                <tbody>
                @foreach($packs as $pack)
                    <tr>
                        <th>{{$pack->nom_pack}}</th>
                        <th>{{$pack->prix_pack}}</th>
                        <th>{{$pack->nbre_credit}}</th>
                       
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