<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use App\Models\Membro;
use Illuminate\Http\Request;

class ItensController extends Controller
{
    public function create(Request $request){
        //cadastro de um item
        $membros = $request->membros_selecionados;

        foreach ($membros as $membro) {
            $item = new Itens();

            $item->item_nome = $request->nome_item;
            $item->item_valor = $request->valor_item;
            $item->membros_id = $membro ;

            $qtd_membros = count( $membros);
            $item->membro_valor = $item->item_valor / $qtd_membros;

            $item->save();
        }


        // Consulta para obter os valores da coluna "membro_valor" por "membros_id"
        $membroValoresTotais = [];

        foreach ($membros as $membro) {
            // Consulta no banco para obter o valor total da coluna "membro_valor"
            $valorTotal = Itens::where('membros_id', $membro)->sum('membro_valor');
            $membroValoresTotais[$membro] = $valorTotal;
        }


        // Atualizar a coluna 'valor' na tabela 'membros' com os valores totais
        foreach ($membroValoresTotais as $membroId => $valorTotal) {
            Membro::where('id', $membroId)->update(['valor' => $valorTotal]);
        }



        return redirect()->back();
    }









}


//  // Consulta para obter a contagem de itens por membro
//  $contagemItensPorMembro = Itens::select('membro_valor')
//  ->whereIn('membros_id',$membros )
//  ->get();

//  dd($contagemItensPorMembro);













