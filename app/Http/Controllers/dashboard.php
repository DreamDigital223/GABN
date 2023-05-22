<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\abonnement;
use App\Models\client;
use App\Models\decoder;
use App\Models\shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboard extends Controller
{
    public function index()
    { 
        $title ="Tableau | de bord";
        $shop=shop::count();
        $clients=client::count();
        $decoder=decoder::count();
        $abonnement=abonnement::count();
        $select=DB::select('SELECT FirstName, LastName, phone, EndDate, Number, Designation_deco from abonnements a
        inner join decoders d on a.decoder_id=d.id
        inner join clients c on d.client_id=c.id
        inner join decoder_types t on d.decoder_type_id=t.id
        where TIMESTAMPDIFF(day,now(),EndDate)<=7  and TIMESTAMPDIFF(day,now(),EndDate)>=1');
        $ca=DB::select('SELECT count(prix) as count, sum(prix) as mount FROM `abonnements` a
        inner join abonnement_types t on a.abonnement_type_id=t.id
        WHERE date_time=CURRENT_DATE');
        $CAF=DB::select('SELECT  sum(prix) as mount FROM `abonnements` a
        inner join abonnement_types t on a.abonnement_type_id=t.id'); 
        
       if (empty(Auth::user()->role_id))
        {
         return redirect('/');
        }
        else
        
          if (Auth::user()->role_id==2)
         {
            return view('user.acceuil',  compact('title', 'shop', 'ca', 'CAF',  'select', 'clients', 'decoder', 'abonnement'));
         }
         else
         
         if (Auth::user()->role_id==1)
         {
            return view('accueil', compact('title', 'shop', 'ca', 'select', 'CAF', 'clients', 'decoder', 'abonnement')); 
         }
   }
}
