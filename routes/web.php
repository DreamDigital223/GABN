<?php
 use App\Http\Controllers\abonnement_controller;
 use App\Http\Controllers\client_controller;
 use App\Http\Controllers\client_user;
 use App\Http\Controllers\abonnement_user;
 use App\Http\Controllers\decoder_user;
 use App\Http\Controllers\dashboard_user;
 use App\Http\Controllers\decoder_controller;
 use App\Http\Controllers\shop_controller;
 use App\Http\Controllers\user_controller;
use App\Http\Controllers\dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Route dashboard
Route::get('/Dashbord', [dashboard::class, 'index'])->name('dashbord');
// Route liste client
Route::get('/Liste_Client', [client_controller::class, 'index'])->name('liste_client');
Route::post('/Save_Client', [client_controller::class, 'save_client'])->name('posts.save_client');
Route::get('/delete_client/{id}', [client_controller::class, 'delete']);
Route::get('/edit_client/{id}', [client_controller::class, 'edit'])->name('');
Route::put('/update_client', [client_controller::class, 'update'])->name('');
// Route decodeur
Route::get('/Liste_Decoder', [decoder_controller::class, 'index'])->name('liste_client');
Route::post('/Save_Decoder', [decoder_controller::class, 'save_decoder']);
Route::get('/delete_decoder/{id}', [decoder_controller::class, 'delete']);
Route::get('/edit_decoder/{id}', [decoder_controller::class, 'edit'])->name('');
Route::put('/update_decoder', [decoder_controller::class, 'update'])->name('');


// Route boutiques
Route::get('/Liste_shop', [shop_controller::class, 'index']);
Route::post('/Save_Shop', [shop_controller::class, 'save_shop']);
Route::delete('/delete_shop/{id}', [shop_controller::class, 'delete']);
Route::get('/edit_shop/{id}', [shop_controller::class, 'edit'])->name('');
Route::put('/update_shop', [shop_controller::class, 'update'])->name('');

// Route Abonnement
 Route::get('/Liste_Abonnement', [abonnement_controller::class, 'index']);
 Route::post('/Save_Abonnement', [abonnement_controller::class, 'save_abonnement']);
 Route::get('/Add_Abonnement', [abonnement_controller::class, 'Add']);
 Route::get('/Get_Price/{id}', [abonnement_controller::class, 'get_price']);
 Route::get('/Get_Clt/{id}', [abonnement_controller::class, 'get_client']);
 Route::get('/delete_abonnement/{id}', [abonnement_controller::class, 'delete']);
 Route::get('/edit_abonnement/{id}', [abonnement_controller::class, 'edit'])->name('');
 Route::put('/update_abonnement', [abonnement_controller::class, 'update'])->name('');
//  Route::post('/api_abn', [abonnement_controller::class, 'Api_Abn']);
 Route::get('/get_abn/{id}', [abonnement_controller::class,'getPlans']);

 //Route Utilisateur
 Route::get('/Liste_User', [user_controller::class, 'index']);
 Route::delete('/delete_user/{id}', [user_controller::class, 'delete']);
 Route::get('/edit_user/{id}', [user_controller::class, 'edit'])->name('');
 Route::put('/edit_pass', [user_controller::class, 'password'])->name('');
 Route::put('/update_user', [user_controller::class, 'update']);


// // Utilisateur Controlleur

//  Route::get('/User_Dashbord', [dashboard_user::class, 'index']);
//  Route::get('/User_Client', [client_user::class, 'index']);
//  Route::delete('/user_del_client/{id}', [client_user::class, 'delete']);
//  Route::get('/User_Decoder', [decoder_user::class, 'index']);
//  Route::get('/User_Abonnement', [abonnement_user::class, 'index']);
//  Route::get('/User_Abonnement', [abonnement_user::class, 'index']);