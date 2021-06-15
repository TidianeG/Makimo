<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueuilController extends Controller
{
    public function accueuil(){
        return view('accueuil');
    }

    // récupérationdes donner d'utilisteur

    public function store(Request $request){
        $client = App\Client::all();

        return redirect('/')->witch(("Veuiller utiliser vos informatons pour vous connecter à la plateforme"));
    }
}
