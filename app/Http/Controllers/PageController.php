<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function configuracion(){

         return view('user.configuracion');
    }


    public function confirmacion(){
        $user= User::find(auth()->user()->id );

        return view('user.confirmacion',compact('user'));
   }

   public function cuenta(){
    $user= User::find(auth()->user()->id );
    return view('user.cuenta',compact('user'));
}



}
