<?php

namespace App\Http\Controllers\Cardapio;

use App\Http\Controllers\Controller;
use App\Models\Cardapio\Cardapio;
use App\Models\Cardapio\CardapioRefeicao;
use App\Models\Faixa_Etaria\FaixaEtaria;
use App\Models\Nutriente\Nutriente;
use App\Models\Nutriente\NutrientesPorFaixa;
use App\Models\Refeicao\Refeicao;
use Carbon\Carbon;
use DB;
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
        $dataAtual = Carbon::Now();

        foreach (FaixaEtaria::get() as $index => $faixaEtaria) {
            $item = Cardapio::where('idFEtaria', $faixaEtaria->idFEtaria)
                ->whereMonth('dataUtilizacao', '=', $dataAtual->month)
                ->whereDay('dataUtilizacao', '>=', $dataAtual->day)->orderBy('dataUtilizacao', 'asc')->get();
            if (sizeof($item) > 0) {
                array_push($cardapios, $item);
            }
        }

        return view('cardapio.cardapioLista', compact('cardapios', 'faixa'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function all()
    {
        $cardapios = Cardapio::all();
        return view('cardapio.cardapioListaTodos', compact('cardapios'));
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
        //todo ao agendar novo cardapio verificar se ja existe algum no mesmo dia, se sim confirmar a sobrescrição
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
        // recuperando o cardapio
        $cardapio = Cardapio::find($id);
        $cardapioRefeicoes = CardapioRefeicao::where('idCardapio', $id)->get();

        // faixas etarias
        $faixaEtaria = FaixaEtaria::all()->pluck('descricaoFaixa', 'idFEtaria');
        //refeições
        $refeicoes = Refeicao::all()->pluck('nomeRefeicao', 'idRefeicao');
        $refeicoesContidas = $cardapio->cardapioRefeicao->map(function ($item) {
            return $item->idRefeicao;
        })->toArray();

        return view('cardapio.cardapioEditar', compact('cardapio', 'cardapioRefeicoes', 'refeicoes',
            'faixaEtaria', 'refeicoesContidas'));
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
        $cardapio = Cardapio::find($id);
        $cardapio->idFEtaria = $request->faixaEtaria;
        $data = explode('/', $request->data);
        $cardapio->dataUtilizacao = Carbon::create($data[2], $data[1], $data[0]);
        $cardapio->save();

        DB::table('cardapio_refeicao')->where('idCardapio', $cardapio->idCardapio)->delete();

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

        return redirect()->route('cardapio')->with('status', 'Cardápio atualizado com sucesso!');

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

    /**
     * Leva a tela que permite o usuário escolher a faixaEtaria para a
     * geração de relatório
     */
    public function FaixaEtariaMensal()
    {
        $faixasEtarias = FaixaEtaria::pluck('descricaoFaixa', 'idFEtaria');
        $mesAtual = Carbon::now()->month;
        return view('cardapio.cardapioSelecionarFEtaria', compact('faixasEtarias', 'mesAtual'));
    }

    public function FaixaEtariaSemanal()
    {
        $faixasEtarias = FaixaEtaria::pluck('descricaoFaixa', 'idFEtaria');
        $mesAtual = Carbon::now()->month;
        return view('cardapio.cardapioSemanalSelecionarFEtaria', compact('faixasEtarias', 'mesAtual'));
    }

    /**
     * Realiza a Soma total
     */
    public function total(Request $request)
    {
        // retornando somente os dias do mês solicitado
        $cardapios = Cardapio::CardapioMensal($request->mes)->where('idFEtaria', $request->faixaEtaria)
            ->orderBy('dataUtilizacao', 'asc')->get();

        //retornando as quantidades minimas
        $nutrientesPorFaixa = NutrientesPorFaixa::where('idFetaria', $request->faixaEtaria)->get();
        $nutrientesPorFaixa = array_pluck($nutrientesPorFaixa, 'qtdeMin', 'idNutriente');

        $nutriente = new Nutriente();
        return view('cardapio.cardapioResumoMensal', compact('cardapios', 'nutriente', 'nutrientesPorFaixa'));
    }

    public function totalSemanal(Request $request)
    {
        // Pegando o primeiro dia do mês e ja inserindo na array, indexando o tamanho da primeira semana
        $semanas = [];

        //todo finalizar o relatorio mensal
//        $inicioDoMes = Cardapio::whereMonth('dataUtilizacao', $request->mes)->whereDay('dataUtilizacao', 1);
//        Carbon::create(Carbon::now()->year, $request->mes, 1);
//        $semanas[$inicioDoMes]

    }
}
