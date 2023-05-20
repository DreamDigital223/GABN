<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\client;
use App\Models\decoder;
use App\Models\decoder_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class decoder_controller extends Controller
{
    public function index()
    {   if (empty(Auth::user()->role_id))
        {
         return redirect('/');
        }
        
        $title ="Liste | des decoders";
        $decoders = DB::table('decoders')
        ->join('clients','decoders.client_id', '=', 'clients.id')
        ->join('decoder_types','decoders.decoder_type_id', '=', 'decoder_types.id')
        ->select('decoders.id as id', 'clients.phone as phone', 'decoders.Number as Number', 'clients.FirstName as FirstName', 'clients.LastName as LastName', 'decoder_types.Designation_deco as Designation_deco')
        ->get();
          
        $int=1;
        $clients   = client::all();
        $decoder_type  = decoder_type::all();
       
        if (Auth::user()->role_id==2)
        {   
          
             return view('user.decodeur', compact('title','decoders', 'int','clients', 'decoder_type'));
        }
        else
        
        if (Auth::user()->role_id==1)
        {
            return view('liste_decoder', compact('title','decoders', 'int', 'clients', 'decoder_type'));
        }
    }
    
    public function save_decoder(Request $request)

    {
       
        decoder::create([

        'Number' => $request->Number,
        'client_id'  => $request->client_id,
        'decoder_type_id'     => $request->decoder_type_id,
        'user_id'   => $request->user_id,
        'shop_id_decoder'   => $request->shop_id_decoder,

        ]);
            return redirect('/Liste_Decoder')->with('success', " $request->Number  ajouter avec succès") ;
    }
 
    public function edite (Request $request)
    {
        $decoder = decoder::where('id', $request->id)->get();
        $client = client::all();
        $decoder_type = decoder_type::where('id',$decoder[0]['id'])->get();

        return response()->json([
            'status'=>200,
            'decoder'=>$decoder,
        ]);

    }
    public function edit ($id)
    {
        $decoder = decoder::find($id);
        return response()->json([
            'status'=>200,
            'decoder'=>$decoder,
        ]);

    }

    public function update (Request $request)

    {
        
        $id = $request->input('id');
        $decoder = decoder::find($id);

        $decoder->Number = $request->input('Number');
        $decoder->client_id = $request->input('client_id');
        $decoder->decoder_type_id= $request->input('decoder_type_id');
        $decoder->update();
        return redirect()->back()->with('success', " $decoder->Number  modifier avec success ");

    }

   
    public function delete ($id)
    {

     $decoders= decoder::findOrFail($id);
     $non=$decoders->Number;
     $decoders->delete();
     return redirect()->back()->with('success', " $non  supprimer avec success ");

    //  return response()->json(['status'=> " $non  supprimer avec succès  ]);
    }
}
