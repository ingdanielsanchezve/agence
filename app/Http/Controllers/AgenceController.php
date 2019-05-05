<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class AgenceController extends Controller
{

    function index(){
        return view('layout');
    }

    function getConsultores(){

        $user = User::select('co_usuario', 'no_usuario')
            ->whereHas('grants', function($q){
                $q->where('co_sistema', 1)
                  ->where('in_ativo', '=', 'S')
                  ->whereIn('co_tipo_usuario', [0, 1, 2]);
            })
            ->get();

        dd($user);
            
    }
}
