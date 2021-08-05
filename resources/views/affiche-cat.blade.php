@extends('layouts.admin')

    @section('content')
    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID Rubrique</th>
                                <th>Nom Rubrique</th>
                                <th>Edit</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th>{{$category->id}}</th>
                                    <th>{{$category->name_category}}</th>
                                    <th><a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a></th>
                                    <th>
                                    <form action="affiche-cat/{{$category->id}}" method="post">
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
                    
