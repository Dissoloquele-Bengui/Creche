<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    //
    public function logout()
    {

        Auth::logout();
        //dd(Auth::check());

        return Redirect::to('/authenticate'); // Redirecione para a página inicial após o logout
    }



}
