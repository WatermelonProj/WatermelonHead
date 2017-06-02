<?php

namespace App\Http\Controllers\Cardapio;

use App\Http\Controllers\Controller;
use App\Models\Cardapio\Cardapio;
use App\Models\Faixa_Etaria\FaixaEtaria;
use App\Models\Refeicao\Refeicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardapioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // faixas etarias
        $faixaEtaria = FaixaEtaria::all()->pluck('descricaoFaixa', 'idFEtaria');
        //refeições
        $refeicoes = Refeicao::all()->pluck('nomeRefeicao', 'idRefeicao');

        return view('cardapio.cardapioCriacao', compact('faixaEtaria', 'refeicoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cardapio = new Cardapio();
        $cardapio->idFaixaEtaria = $request->faixaEtaria;
        $cardapio->idUsuario = Auth::user()->id;
//        $cardapio =
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
