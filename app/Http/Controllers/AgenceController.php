<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class AgenceController extends Controller
{

    function index(){
        return view('consultores');
    }

    function getConsultores(){

        $user = User::select('co_usuario', 'no_usuario')
                    ->whereHas('grants', function($q){
                        $q->where('co_sistema', 1)
                        ->where('in_ativo', '=', 'S')
                        ->whereIn('co_tipo_usuario', [0, 1, 2]);
                    })
                    ->get();

        return $user->toJson();
            
    }

    function getRelatorio(Request $request){

        $fromDate = explode("-", $request->input('fromDate'));
        $toDate = explode("-", $request->input('toDate'));
        $usuarios = [];
        
        foreach($request->input('seleccionados') as $value){
            $usuarios[] = $value['co_usuario'];
        }

    }


}
