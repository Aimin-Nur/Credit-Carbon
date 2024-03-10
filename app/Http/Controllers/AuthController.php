<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginUser(Request $request)
    {
        if (Auth::guard('swasta')->attempt([
            'email' => $request->input('name'),
            'password' => $request->input('password'),
        ])) {
            // Autentikasi sebagai user berhasil
            $user = Auth::guard('swasta')->user();
            $userId = $user->id;
            return redirect('/dashboardSwasta/' . $userId);

        } elseif (Auth::guard('dlh')->attempt([
            'email' => $request->input('name'),
            'password' => $request->input('password'),
        ])) {
            // Autentikasi sebagai admin DLH berhasil
            $user = Auth::guard('dlh')->user();
            $userId = $user->id;
            return redirect('/dashboardDlh/' . $userId);

        } elseif (Auth::guard('klh')->attempt([
            'email' => $request->input('name'),
            'password' => $request->input('password'),
        ])) {
            // Autentikasi sebagai admin KLH berhasil
            $user = Auth::guard('klh')->user();
            return redirect('/dashboardKlh');

        } elseif (Auth::guard('djp')->attempt([
            'email' => $request->input('name'),
            'password' => $request->input('password'),
        ])) {
            // Autentikasi sebagai admin DJP berhasil
            $user = Auth::guard('djp')->user();
            return redirect('/dashboardDjp');

        } elseif (Auth::guard('admin')->attempt([
            'email' => $request->input('name'),
            'password' => $request->input('password'),
        ])) {
            // Autentikasi sebagai super admin berhasil
            $user = Auth::guard('admin')->user();
            return redirect('/dashboardAdmin');
        }

        return redirect('/portal')->with(['warning' => 'Username atau Password Anda tidak terdaftar.']);
    }


    public function logoutAdmin(){
        $guards = ['admin', 'swasta', 'klh', 'djp', 'dlh'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
                break;
            }
        }

        return redirect('/portal')->with(['logout' => 'Anda berhasil Logout.']);
    }

    public function logoutKlh()
    {
        if(Auth::guard('klh')->check()){
            Auth::guard('klh')->logout();
            return redirect('/portal')->with(['logout' => 'Anda berhasil Logout.']);
        }
    }

    public function logoutDlh()
    {
        if(Auth::guard('dlh')->check()){
            Auth::guard('dlh')->logout();
            return redirect('/portal')->with(['logout' => 'Anda berhasil Logout.']);
        }
    }

    public function logoutUser()
    {
        if(Auth::guard('swasta')->check()){
            Auth::guard('swasta')->logout();
            return redirect('/portal')->with(['logout' => 'Anda berhasil Logout.']);
        }
    }

}
