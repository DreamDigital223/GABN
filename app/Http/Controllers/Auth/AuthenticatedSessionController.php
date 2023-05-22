<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $startDate=date_create('2023-05-20');
        $endDate=now();
        $diffDate=date_diff($endDate,$startDate);
        $dif=$diffDate->format("%a");
       
        if ($dif >30){
            Auth::guard('web')->logout();

            $request->session()->invalidate();
                
            $request->session()->regenerateToken();  
            return redirect('/')->with('success', "  Désolé ! Vous n'avez plus de license");
          }
          else
        if ( Auth::user()->role_id==1)
            {
            return redirect("/Dashbord");
            }
        else
                    if ( Auth::user()->role_id==2)
                    {
                        return redirect("/Dashbord");
                    }
        else

                    if ( Auth::user()->role_id==3)
                    {
                        Auth::guard('web')->logout();

                        $request->session()->invalidate();
                
                        $request->session()->regenerateToken();  
                    return redirect("/")->with('success', "  Désolé ! votre droit est désactivé");
                    }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
