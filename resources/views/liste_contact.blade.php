@extends('layouts.admin')

    @section('content')
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Objet</th>
                    <th>Message</th>
                   <th>Supprimer</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    <tr>
                    <th>{{$contact->nom}}</th>
                    <th>{{$contact->email}}</th>
                    <th>{{ $contact->objet}}</th>
                    <th>{{ $contact->message}}</th>
                    
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
                   
       