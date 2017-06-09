<?php

namespace App\Http\Controllers\Cardapio;

use App\Http\Controllers\Controller;
use App\Models\Cardapio\Cardapio;
use App\Models\Cardapio\CardapioRefeicao;
use App\Models\Faixa_Etaria\FaixaEtaria;
use App\Models\Refeicao\Refeicao;
use Carbon\Carbon;
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

        // dividindo os cardapios, lactante, PRE, CMEI, Fundamental
        $cardapios = [];
        $faixa = new FaixaEtaria();

        if(Cardapio::where('idFEtaria', 1)->get()) {
            array_push($cardapios, Cardapio::where('idFEtaria', 1)->get());
        }
        if(Cardapio::where('idFEtaria', 2)->get()) {
            array_push($cardapios, Cardapio::where('idFEtaria', 2)->get());
        }
        if(Cardapio::where('idFEtaria', 3)->get()) {
            array_push($cardapios, Cardapio::where('idFEtaria', 3)->get());
        }
        if(Cardapio::where('idFEtaria', 4)->get()) {
            array_push($cardapios, Cardapio::where('idFEtaria', 4)->get());
        }


        return view('cardapio.cardapioLista', compact('cardapios', 'faixa'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // salvando, data, id do Usuario, data do cardápio
        $cardapio = new Cardapio();
        $cardapio->idFEtaria = $request->faixaEtaria;
        $cardapio->idUsuario = Auth::user()->id;
        $data = explode('/', $request->data);
        $cardapio->dataUtilizacao = Carbon::create($data[2], $data[1], $data[0]);
        $cardapio->save();

        foreach ($request->refeicoes as $index => $refeicao) {
            $cardapioRefeicao = new CardapioRefeicao();
            $cardapioRefeicao->idRefeicao = $refeicao;
            $cardapioRefeicao->idCardapio = $cardapio->idCardapio;

            // data do cardapio
            $hora = explode(':', $request[$refeicao]);
            $carconbDate = Carbon::create($data[2], $data[1], $data[0], $hora[0], $hora[1]);
            $cardapioRefeicao->dataUtilizacao = $carconbDate;
            $cardapioRefeicao->save();
        }

        return redirect()->route('cardapio')->with('status', 'Cardápio agendado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
