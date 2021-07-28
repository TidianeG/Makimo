<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pack;
use App\Credit;
use Illuminate\Support\Facades\Auth;
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
}
