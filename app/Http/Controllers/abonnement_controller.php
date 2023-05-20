<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\abonnement;
use App\Models\decoder;
use App\Models\client;
use App\Models\abonnement_type;
use App\Models\decoder_type;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class abonnement_controller extends Controller
{
    public function index()
    { 
        $title ="Liste | des abonnements";
        $abonnement = DB::table('abonnements')
                        ->join('decoders','decoders.id', '=', 'abonnements.decoder_id')
                        ->join('abonnement_types','abonnement_types.id', '=', 'abonnements.abonnement_type_id')
                        ->select('decoders.Number as Number', 'abonnement_types.Designation_abn as Designation_abn',
                        'abonnements.EndDate as EndDate', 'abonnements.StartDate as StartDate',
                        'abonnements.id as id')
                        ->get();
        $decoders   = DB::table('decoders')
                        ->join('decoder_types','decoders.decoder_type_id', '=', 'decoder_types.id')
                        ->select('decoders.id as id',  'decoders.decoder_type_id as decoder_type_id', 'decoders.Number as Number', 'decoder_types.Designation_deco as Designation_deco')
                        ->get();
                        $int=1;
        $decoder_type=decoder_type::all();
        $abonnement_type = abonnement_type::all();
        $client      = client::all();
        
        if (empty(Auth::user()->role_id))
         {
        return redirect('/');
         }
         else
         if (Auth::user()->role_id==2)
         {
            return view('user.abonnement', compact('title', 'int', 'client','abonnement', 'decoders', 'decoder_type', 'abonnement_type'));
         }
         else
         
         if (Auth::user()->role_id==1)
         {
            return view('liste_abonnement', compact('title', 'int', 'client','abonnement', 'decoders', 'decoder_type', 'abonnement_type'));
         }
    }
    
    public function save_abonnement(Request $request)

    {
        $date= date_create($request->StartDate);
        abonnement::create([
        'date_time' => date("Y-m-d"), 
        'decoder_id' => $request->decoder_id,
        'abonnement_type_id'  => $request->abonnement_type_id,
        'decoder_id'     => $request->decoder_id,
        'EndDate'  =>date_add($date, date_interval_create_from_date_string("31 days")),
        'StartDate'  =>$request->StartDate,
        'shop_id_abonnement'  => $request->shop_id_abonnement,
        'user_id_abn'  => $request->user_id_abn,
        ]);
            return redirect('/Liste_Abonnement')->with('success', " 
            ajouter avec succès") ;
    }
 
    public function get_price ($id)
    {
        $abonnement = abonnement_type::find($id);

        return response()->json([
            'status'=>200,
            'abonnement'=>$abonnement,
        ]);

    }
    public function get_client ($id)
    {
        $decoder = decoder::find($id);
        return response()->json([
            'status'=>200,
            'decoder'=>$decoder,
        ]);

    }
    public function edit ($id)
    {
         $abonnement =abonnement::where('id', $id)->find($id);
 
        // $abonnement=DB::select("SELECT from abonnements where id= '[$id]' " );
        // // $abonnement = $selectg->find($id);
        return response()->json([
            'abonnement'=>$abonnement
        ]);

    }
    public function update (Request $request)

    {
        $abn_id = $request->input('id');
        $abonnement = abonnement::find($abn_id);
        $date= date_create($request->input('StartDate'));
        $abonnement->decoder_id = $request->input('decoder_id');
        $abonnement->abonnement_type_id = $request->input('abonnement_type_id');
        $abonnement->EndDate =date_add($date, date_interval_create_from_date_string("31 days"));
        $abonnement->StartDate = $request->input('StartDate');
        $abonnement->update();
        return redirect()->back()->with('success', " modifier avec success");

    }
   
    public function getPlans($subject_id)
    {
        $abonnement_type = abonnement_type::where('decoder_type_id',$subject_id)->get();
        return  response()->json(['abonnement_type'=>$abonnement_type]);
    }

    // public function update(Request $request, $id){
    //     $abonnement = abonnement::find($id);
    //     $input = $request->all();
    //     $abonnement->fill($input)->save();
 
    //     return redirect('/Liste_abonnement');
    // }

    public function delete ($id)
    {

     $abonnements= abonnement::findOrFail($id);
     $abonnements->delete();
     return back()->with("success", "Supprimer avec succès");

    }
    public function Api_Abn(Request $request)
    {
        $data['abonnement_type'] = abonnement_type::where('decoder_type_id ',$request->decoder_type_id )->get(['Designation_abn','id']);
 
        return response()->json($data);
    }
    // public function delete ($id)
    // {

    //  $abonnements= abonnement::findOrFail($id);
    //  $abonnements->delete();
    //  return response()->json(['status'=> "supprimer avec succès"

    //  ]);
    // }
}
