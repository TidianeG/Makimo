@extends('layouts.admin')

    @section('content')
    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                
                                <th>ID Localite</th>
                                <th>Nom Localite</th>
                                <th>Editer</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($localities as $localite)
                                <tr>
                                     <th>{{$localite->id}}</th>
                                    <th>{{$localite->name_localite}}</th>
                                    <th><a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a></th>
                                    <th>
                                    <form action="affiche-localite/{{$localite->id}}" method="post">
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
                    
