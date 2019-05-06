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
                    ->whereBetween('ano', [$fromDate[0], $toDate[0]])
                    ->whereBetween('mes', [$fromDate[1], $toDate[1]])
                    ->get();

        foreach($users as $user){

           $receita = DB::table('relatorio')
                        ->select('mes_name', 'ano', 'receita', 'custo_fixo', 'commisao', 'lucro')
                        ->where('co_usuario', $user->co_usuario)
                        ->whereBetween('ano', [$fromDate[0], $toDate[0]])
                        ->whereBetween('mes', [$fromDate[1], $toDate[1]])
                        ->get();

           $totals = DB::table('relatorio')
                        ->select(DB::raw('SUM(receita) AS tot_receita, SUM(custo_fixo) AS tot_custo_fixo, SUM(commisao) AS tot_commisao, SUM(lucro) AS tot_lucro'))
                        ->where('co_usuario', $user->co_usuario)
                        ->whereBetween('ano', [$fromDate[0], $toDate[0]])
                        ->whereBetween('mes', [$fromDate[1], $toDate[1]])
                        ->get();

        //    $totals = DB::table('relatorio')
        //                 ->where('co_usuario', $user->co_usuario)
        //                 ->whereBetween('ano', [$fromDate[0], $toDate[0]])
        //                 ->whereBetween('mes', [$fromDate[1], $toDate[1]])
        //                 ->sum('receita')
        //                 ->sum('custo_fixo')
        //                 ->sum('commisao')
        //                 ->sum('lucro');

           $resp[] = ['name' => $user->no_usuario, 'receita' => $receita, 'totals' => $totals->toArray()[0]];

        }        

        return json_encode($resp);

    }


}
