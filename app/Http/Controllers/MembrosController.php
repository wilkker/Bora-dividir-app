<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use App\Models\Membro;
use Illuminate\Http\Request;

class MembrosController extends Controller
{
    public function create(Request $request)
    {
        $grupo_id = $request->input('grupo_id');
        $nomes_membros = $request->input('nome_membro');

        // Verifica se é uma matriz (vários membros) ou uma string (um único membro)
        if (is_array($nomes_membros)) {
            foreach ($nomes_membros as $nome) {
                $membro = new Membro();
                $membro->nome = $nome;
                $membro->grupo_id = $grupo_id;
                $membro->valor = 0;
                $membro->save();
            }
        } else {
            $membro = new Membro();
            $membro->nome = $nomes_membros;
            $membro->grupo_id = $grupo_id;
            $membro->valor = 0;
            $membro->save();
        }

        return redirect()->route('grupo.detalhe', ['id' => $grupo_id]);
    }



    public function detalhes($id){
        //dd($id);

        $membro = Membro::where('id',$id)->first();
        $membro_item = Itens::where('membros_id',$id)->get();



        //dd($membro_item);


        return view('site.membro_detalhe', ['membro' => $membro , 'membro_item' => $membro_item]);
    }
}
