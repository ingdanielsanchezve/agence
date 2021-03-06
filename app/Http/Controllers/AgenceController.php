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

        return json_encode(
            ['consultores' => $user->toArray()]
        );
            
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

           $resp[] = ['name' => $user->no_usuario, 'receita' => $receita, 'totals' => $totals->toArray()[0]];

        }        

        return json_encode($resp);

    }

    function getPieChartData(Request $request){

        $fromDate = explode("-", $request->input('fromDate'));
        $toDate = explode("-", $request->input('toDate'));
        $colors= ["#a0d6f6", "#c6d8f6", "#90b2ec", "#4e7ccc", "#3b3da0", "#2c0437"];
        $resp = [];
        $i = 0;

        $receita = DB::table('relatorio')
                    ->select(DB::raw('no_usuario x, round(SUM(receita), 2) AS value'))
                    ->whereIn('co_usuario', array_column($request->input('seleccionados'), 'co_usuario'))
                    ->whereBetween('ano', [$fromDate[0], $toDate[0]])
                    ->whereBetween('mes', [$fromDate[1], $toDate[1]])
                    ->groupBy('co_usuario')
                    ->get();

        foreach($receita as $val){

            $resp[] = ['x' => $val->x, 'value' => $val->value, 'fill' => $colors[$i]];
            $i++;

        }

        return json_encode($resp);

    }

    function getColumnChartData(Request $request){

        $fromDate = explode("-", $request->input('fromDate'));
        $toDate = explode("-", $request->input('toDate'));
        $header = ['#'];
        $data = $cost = [];

        $users = DB::table('relatorio')
                    ->select('co_usuario', 'no_usuario')
                    ->distinct()
                    ->whereIn('co_usuario', array_column($request->input('seleccionados'), 'co_usuario'))
                    ->whereBetween('ano', [$fromDate[0], $toDate[0]])
                    ->whereBetween('mes', [$fromDate[1], $toDate[1]])
                    ->get();

        foreach($users as $user){
          
           $header[] = $user->no_usuario;

           $query = DB::table('relatorio')
                        ->select('mes_name', 'ano', 'receita')
                        ->where('co_usuario', $user->co_usuario)
                        ->whereBetween('ano', [$fromDate[0], $toDate[0]])
                        ->whereBetween('mes', [$fromDate[1], $toDate[1]])
                        ->get();

            if(!isset($data[0])){
            
                for($i=0; $i < count($query); $i++){

                    if(isset($data[$i])){

                        $data[$i][] = $query[$i]->receita;

                    }else{

                        $data[$i] = [$query[$i]->mes_name.' '.$query[$i]->ano, $query[$i]->receita];

                    }

                }

            }else{

                $j = 0;
                for($i=0; $i < count($data); $i++){

                    if(isset($query[$j]) && $data[$i][0] == $query[$j]->mes_name.' '.$query[$j]->ano){

                        $data[$i][] = $query[$j]->receita;
                        $j++;

                    }else{

                        $data[$i][] = 0;
                        
                    }

                }

            }

        }

        $query = DB::table('relatorio')
                        ->select(DB::RAW("mes_name, ano, SUM(custo_fixo)/COUNT(co_usuario) custo_prom"))
                        ->whereIn('co_usuario', array_column($request->input('seleccionados'), 'co_usuario'))
                        ->whereBetween('ano', [$fromDate[0], $toDate[0]])
                        ->whereBetween('mes', [$fromDate[1], $toDate[1]])
                        ->groupBy('mes')
                        ->get();

        foreach($query as $val){

            $cost[] = [$val->mes_name.' '.$val->ano, $val->custo_prom];

        }

        return json_encode(
            ['header'  => $header, 'data' => $data, 'cost' => $cost]
        );

    }

}

    
