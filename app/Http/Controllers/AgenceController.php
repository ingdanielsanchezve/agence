<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $resp = [];

        $users = DB::table('relatorio')
                    ->select('co_usuario', 'no_usuario')
                    ->distinct()
                    ->whereIn('co_usuario', array_column($request->input('seleccionados'), 'co_usuario'))
                    ->where('ano', '>=', $fromDate[0])
                    ->where('mes', '>=', $fromDate[1])
                    ->where('ano', '<=', $toDate[0])
                    ->where('mes', '>=', $toDate[1])
                    ->get();

        foreach($users as $user){

           $receita = DB::table('relatorio')
                        ->select('mes_name', 'ano', 'receita', 'custo_fixo', 'commisao', 'lucro')
                        ->where('co_usuario', $user->co_usuario)
                        ->where('ano', '>=', $fromDate[0])
                        ->where('mes', '>=', $fromDate[1])
                        ->where('ano', '<=', $toDate[0])
                        ->where('mes', '>=', $toDate[1])
                        ->get();

           $resp[] = ['name' => $user->no_usuario, 'receita' => $receita];

        }        

        return json_encode($resp);

    }


}
