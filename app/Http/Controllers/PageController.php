<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function configuracion(){

         return view('user.configuracion');
    }


    public function confirmacion(){

        return view('user.confirmacion');
   }

   public function cuenta(){

    return view('user.cuenta');
}



}
