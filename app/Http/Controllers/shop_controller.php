<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\shop;
use Illuminate\Http\Request;

class shop_controller extends Controller
{
    public function index()
    {  if (empty(Auth::user()->role_id))
        {
            return redirect('/');
        }
        
        $title ="Liste | des boutiques";
        $shops = shop::all();
       
        if (Auth::user()->role_id==1)
        {
            return view('liste_shop', compact('title','shops'));
        }
    }
    
    public function save_shop(Request $request)

    {
        shop::create([
        'libelle' => $request->libelle,
        'adresse'  => $request->adresse,
        'phone'     => $request->phone,
        'mail'  => $request->mail,
        ]);
            return redirect('/Liste_shop')->with('success', " $request->libelle
            ajouter avec succès") ;
    }
 
    public function edit ($id)
    {
        $shop = shop::find($id);

        return response()->json([
            'status'=>200,
            'shop'=>$shop,
        ]);

    }

    public function update (Request $request)

    {
        
        $clt_id = $request->input('id');
        $shop = shop::find($clt_id);
        $shop->libelle = $request->input('libelle');
        $shop->adresse = $request->input('adresse');
        $shop->phone = $request->input('phone');
        $shop->mail = $request->input('mail');
        $shop->update();
        return redirect()->back()->with('success', "  $shop->libelle  modifier avec success");

    }

  

    public function delete ($id)
    {

     $shops= shop::findOrFail($id);
     $non=$shops->libelle;
     $shops->delete();
     return response()->json(['status'=> " $non supprimer avec succès"

     ]);
    }
}
