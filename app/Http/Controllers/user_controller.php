<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\shop;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class user_controller extends Controller
{
    public function index()
    { 
        $title ="Liste | des Utilisateurs";
        $shops=shop::all();
        $role=role::all();
        $User  = DB::table('users')
        ->join('roles','users.role_id', '=', 'roles.id')
        ->join('shops','users.shops_id_user', '=', 'shops.id')
        ->select('users.id as id', 'users.phone as phone', 'users.name as name', 'users.email as email',
         'shops.libelle as libelle', 'roles.designation as designation')
        ->get();
         User::all();
         if (empty(Auth::user()->role_id))
         {
             return redirect('/');
         }
         else
         if (Auth::user()->role_id==1)
         {
            return view('liste_user', compact('title', 'User', 'role', 'shops'));
         }
    }

    public function delete($id)
    {

     $User = User::findOrFail($id);
     $User->delete();
     return  response()->json(['status'=> "supprimer avec succès"]);
    }
    public function edit ($id)
    {
        $User = User::find($id);

        return response()->json([
            'status'=>200,
            'User'=>$User,
        ]);

    }

    public function update (Request $request)

    {
        
        $user_id = $request->input('id');
        $User = User::find($user_id);
        $User->user_id_user = $request->input('user_id_user');
        $User->role_id = $request->input('role_id');
        $User->shops_id_user = $request->input('shops_id_user');
        $User->update();
        return redirect()->back()->with('success', " modifier avec success");

    }
    public function password (Request $request)

    {
        
        $user_id = $request->input('id');
        $User = User::find($user_id);
        $pass =  $request->input('password');
        $User->password =Hash::make($pass);
        $User->update();
        return redirect()->back()->with('success', " modifier avec success");

    }
}
