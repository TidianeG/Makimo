<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pack;
use App\Credit;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
class PackController extends Controller
{
    public function add_pack(Request $request){

        $pack = new Pack();
        $data = $request->validate([
            'nom_pack'=>'required|min:4',
            'prix_pack' => 'required|min:3|numeric',
            'nbre_credit' => 'numeric',
        ]);

        $pack->nom_pack = $request->input('nom_pack');
        $pack->prix_pack = $request->input('prix_pack');
        $pack->nbre_credit = $request->input('nbre_credit');
        $pack->save();
        if ($pack) {
            return redirect()->back()->with('success', 'Pack ajouté avec succès. Merci !!!!!!!');
        }
        else {
            return redirect()->back()->with('danger', 'pack non ajouté');
        }
    }

    public function details_pack($id){
        $pack=Pack::find($id);
        return view('details_pack',compact('pack'));
    }
    
    public function achat_credit(Request $request){
        $credit=Credit::find(Auth::user()->client->credit_id);
        $credit_pack=$request->input('nbre_credit');
        $credit->nbre_credit=$credit->nbre_credit+$credit_pack;
        $credit->save();
        if ($credit) {
            return redirect()->back()->with('success', 'Achat crédit reussi. Merci !!!!!!!');
         }
         else {
            return redirect()->back()->with('danger', 'Achat crédit échoué');
         }
    }
    public function purchase(Request $request){
        
        //$data = json_decode($request->getContent(), true);
        /*if($data['status']=="SUCCESSFUL"){
            $credit=Credit::find(Auth::user()->client->credit_id);
            $credit_pack=$request->input('nbre_credit');
            $credit->nbre_credit=$credit->nbre_credit+$credit_pack;
            $credit->save();
        }*/
        

        if ($data['status']=="SUCCESSFUL") {
            return redirect("/success-payment")->with('success', 'Vous avez acheter un pack de');
         }
         else {
            return redirect("/error-payment")->with('danger', 'Achat crédit échoué');
         }

    }
    public function success_payment(Request $request){


        if ($request->input("status")=="SUCCESSFUL") {
                $prix = $request->input("amount");
                $pack = Pack::where('prix_pack',$prix)->first();
            
             $credit=Credit::find(Auth::user()->client->credit_id);
             $credit_pack=$pack->nbre_credit;
     
             $credit->nbre_credit+=$credit_pack;
             $credit->update();
             if ($credit) {
                 
                 return redirect('/credit/retour-success-payment')->with('success', "Makimo  vous informe que votre achat d'un pack de crédit c'est passé avec succès, Merci !!!");
             }
        }
        
        else {
            return view('error-payment');
        }
       
        ;
    }
    public function valid_payment(){
       
        return view('success');
    }
    public function error_payment(){
       
        return view('error');
    }
}
