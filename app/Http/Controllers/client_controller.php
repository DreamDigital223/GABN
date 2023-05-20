<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\client;
use App\Models\User;
use Illuminate\Http\Request;

class client_controller extends Controller
{
    public function index()
    { 
        $title ="Liste | des clients";
        $clients = client::all();
        $User    = User::all();
        $int=1;
        if (empty(Auth::user()->role_id))
         {
        return redirect('/');
         }
         else
         if (Auth::user()->role_id==2)
         {
            return view('user.client', compact('title', 'int', 'clients', 'User'));
         }
         else
         
         if (Auth::user()->role_id==1)
         {
            return view('liste_clients', compact('title', 'int','clients', 'User'));
         }
    }
    
    public function save_client(Request $request)

    {
       
        client::create([
        'user_id'  => $request->user_id, 
        'FirstName' => $request->FirstName,
        'LastName'  => $request->LastName,
        'phone'     => $request->phone,
        'quartier'  => $request->quartier,
        'shop_id_client'=>$request->shop_id_client,

        ]);
            return back()->with('success', " $request->FirstName $request->LastName
            ajouter avec succès") ;
    }
 
    public function edit ($id)
    {
        $client = client::find($id);

        return response()->json([
            'status'=>200,
            'client'=>$client,
        ]);

    }

    public function update (Request $request)

    {
        
        $clt_id = $request->input('id');
        $client = client::find($clt_id);

        $client->LastName = $request->input('LastName');
        $client->FirstName = $request->input('FirstName');
        $client->phone = $request->input('phone');
        $client->quartier = $request->input('quartier');
        $client->update();
        return redirect()->back()->with('success', "  $client->LastName $client->FirstName modifier avec success");

    }

    // public function update(Request $request, $id){
    //     $client = client::find($id);
    //     $input = $request->all();
    //     $client->fill($input)->save();
 
    //     return redirect('/Liste_Client');
    // }

    public function Delete_client ($id)
    {

     $clients= client::findOrFail($id);
     $clients->delete();
     return back()->with("success", "Supprimer avec succès");

    }

    public function delete ($id)
    {

     $clients= client::findOrFail($id);
     $non=$clients->FirstName;
     $prenon=$clients->LastName;
     $clients->delete();
     return back()->with('success', " $non $prenon supprimer avec succès") ;
    //  return response()->json(['status'=> " $non $prenon supprimer avec succès"

    //  ]);
    }
}
