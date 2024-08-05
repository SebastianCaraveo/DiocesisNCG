<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
{
    $parroquia = $user->parroquia;

    if ($parroquia) {
        session(['parroquia_id' => $parroquia->id]);
        session(['parroquia_nombre' => $parroquia->nombre]);
        session(['parroquia_municipio' => $parroquia->municipio]);
    } else {
        session(['parroquia_id' => null]);
        session(['parroquia_nombre' => 'Sin Parroquia']);
        session(['parroquia_municipio' => 'Sin Municipio']);
    }

    return redirect()->intended($this->redirectPath());
}

}
