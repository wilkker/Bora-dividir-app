<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Membro;
use Illuminate\Http\Request;

class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $grupos = Grupo::all();
        //dd( $grupos);
        return view('site.home', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $grupos = new Grupo();
        $grupos->nome_grupo = $request->nome_grupo;
        $grupos->save();

        return back();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //dd($id);
        $valor_total = Membro::where('grupo_id', $id)->sum('valor');
        //d($valor_total);


        $grupo = Grupo::findOrFail($id);
        return view('site.detalhe', compact('grupo' , 'valor_total'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //dd('destroy');

        $grupo = Grupo::findOrFail($id);
        $grupo->delete();

        return redirect()->route('grupos.index');


    }

    public function teste (Request $request)
    {
        dd('aqui');
    }
}
