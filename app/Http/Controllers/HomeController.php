<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Client;
use App\User;
use App\Credit;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {  
      $request->validate([
         'nom'=>'required',
         'prenom'=> 'required',
         'phone' => 'required ',
         'adresse' => 'required',
         'password' => 'required ',
         
     ]);
            $credit= new Credit();
            $credit->nbre_credit=2;
            $credit->save();
       $client = new Client();
       $client->nom_client = $request->input('nom');
       $client->prenom_client = $request->input('prenom');
       $client->adresse_client = $request->input('adresse');
       $client->credit_id=$credit->id;
       $client->save();
    ///////////////////////////////////////////////////
    /////////////////////////////////////////////////////
       $user= new User();
       $user->name= $client->prenom_client;
       $user->email = $request->input('phone');
       $user->roles = "user";
       $user->client_id = $client->id;
       $user->password=Hash::make($request->input('password'));
       $user->save();
      $verif=User::find($user->id);

      //Auth::login($user);
         if($verif){
            
            return back()->with('success_info' , 'Compte créer avec succès, Veuiller utiliser votre login et mot de passe pour vous connecter');
         }
         else{
            return back()->with('danger_info' , 'Inscription non effectuée, verifier les informations entrées');
         }
      
    }

    public function destroy(Request $request): LogoutResponse
    {
        $this->guard->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return app(LogoutResponse::class);
    }
}