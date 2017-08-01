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
        //arrumando a data em vetores
        $data = explode('/', $request->data);

        // se o cardápio ja existe sobrescreve ele
        $verificaCardapio = Cardapio::whereYear('dataUtilizacao', $data[2])->whereMonth('dataUtilizacao', $data[1])
            ->whereDay('dataUtilizacao', $data[0])->where('idFetaria', $request->faixaEtaria);
        if ($verificaCardapio != null) {
            $verificaCardapio->delete();
        }

        // salvando, data, id do Usuario, data do cardápio
        $cardapio = new Cardapio();
        $cardapio->idFEtaria = $request->faixaEtaria;
        $cardapio->idUsuario = Auth::user()->id;
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
        // todo verificar o pq não esta pegando os dados de 0-6 meses
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

    /**
     * Retorna o total semnal de acordo com o mês e o ano fornecidos
     *
     * @param Request $request
     */
    public function totalSemanal(Request $request)
    {
        // definindo o inicio e fim do mês
        $diaAtual = Carbon::create($request->ano, $request->mes, 1);

        $somaNutrientesDiarios = Nutriente::all()->pluck(0, 'idNutriente')->toArray();

        //retornando as quantidades minimas
        $nutrientesPorFaixa = NutrientesPorFaixa::where('idFetaria', $request->faixaEtaria)->get();
        $nutrientesPorFaixa = array_pluck($nutrientesPorFaixa, 'qtdeMin', 'idNutriente');

        $nutriente = new Nutriente();

        //se ja começa no domingo ou sabado, pula para segunda
        if ($diaAtual->dayOfWeek == Carbon::SUNDAY) {
            $diaAtual->addDay(1);
        } elseif ($diaAtual->dayOfWeek == Carbon::SATURDAY) {
            $diaAtual->addDay(2);
        }

        // enquanto não fechar o mês continuar, caso seja o fim dem uma semana adicionar outro indice na array de somas
        $semanas =
                ['Semana 1' =>  $somaNutrientesDiarios, 'Semana 2' =>  $somaNutrientesDiarios,
                'Semana 3' =>  $somaNutrientesDiarios, 'Semana 4' =>  $somaNutrientesDiarios,
                'Semana 5' =>  $somaNutrientesDiarios, 'Semana 6' =>  $somaNutrientesDiarios];
        $cardapios = [];

        while (!$diaAtual->isNextMonth()) {
            // acabou uma semana, adicionar dois dias para voltar a segunda feira
            $cardapio = Cardapio::whereDay('dataUtilizacao', $diaAtual->day)
                ->where('idFEtaria', $request->faixaEtaria)->first();
            if ($cardapio != null) {
                array_push($cardapios, $cardapio);
                $totalNutrientes = $cardapio->getTotalNutrientes()->toArray();
                foreach ($totalNutrientes as $index => $totalNutriente) {
                    $semanas["Semana {$diaAtual->weekOfMonth}"][$index] += $totalNutriente;
                }
                unset($totalNutrientes);
            }
            $diaAtual->addDay(1);
        }


        // removendo as semandas nulas
        foreach ($semanas as $index => $semana) {
            if ($semana[1] == null)
                unset($semanas[$index]);
        }

        return view('cardapio.cardapioResumoSemanal', compact('semanas', 'cardapios',
            'nutrientesPorFaixa', 'nutriente'));
    }
}
