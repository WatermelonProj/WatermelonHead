<?php

namespace App\Http\Controllers\Receitas;

use App\Http\Controllers\Controller;
use App\Models\Alimento\Alimento;
use App\Models\Alimento\AlimentoReceita;
use App\Models\Faixa_Etaria\FaixaEtaria;
use App\Models\Nutriente\Nutriente;
use App\Models\Porcao\ReceitaPorcao;
use App\Models\Porcao\TipoPorcao;
use App\Models\Receita\Receita;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receitas = Receita::all();
        $receita_porcao = ReceitaPorcao::all();

        return view('receitas.receitaLista', compact('receitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alimentos = new Alimento();
        $tiposPorcao = new TipoPorcao();
        $faixas = FaixaEtaria::all();

        return view('receitas.receitaCriacao', compact('alimentos', 'tiposPorcao', 'faixas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'nomeReceita' => 'required',
        ]);

        // informações básicas de uma receita
        $receita = new Receita();
        $receita->nomeReceita = $request->nomeReceita;
        $receita->preparoReceita = $request->preparoReceita;
        $receita->ativoReceita = ($request->ativoReceita ? 1 : 0);
        $receita->idUsuario = Auth::user()->id;
        $receita->save();
        if ($request->hasFile('image')) {
            $request->image->storeAs('public/receitas', $receita->idReceita . ".png");
        }

        // armazenando os alimentos contidos em uma receita
        foreach ($request->alimentos as $alimento) {
            $alimentoReceita = new AlimentoReceita();
            $alimentoReceita->idAlimento = $alimento;
            $alimentoReceita->idReceita = $receita->idReceita;
            $alimentoReceita->qtde = $request[$alimento];
            $alimentoReceita->unidadeMedida = 2;
            $alimentoReceita->save();
        }

        // salvando as porções que uma receita possui
        $faixasEtarias = FaixaEtaria::all();
        foreach ($faixasEtarias as $index => $faixasEtaria) {
            //salvando todas as porções adicionadas
            $receitaPorcao = new ReceitaPorcao();
            $receitaPorcao->idReceita = $receita->idReceita;
            $receitaPorcao->idTipoPorcao = $request->tipoPorcao;
            $receitaPorcao->idFEtaria = $faixasEtaria->idFEtaria;
            $receitaPorcao->qtde = $request['faixa-' . $faixasEtaria->idFEtaria];
            $receitaPorcao->save();
        }

        return redirect()->route('receitas')->with('status', 'Receita criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $nutrientes = Nutriente::all();

        // encontrando a receita
        $receita = Receita::find($id);

        // encontrando todos os alimentos que uma receita contém
        $alimentosReceita = $receita->alimentoReceita;

        // array contendo a soma dos nutrientes da receita
        $nutrientesReceita = array();
        foreach (Nutriente::all() as $nutriente) {
            $nutrientesReceita[$nutriente->idNutriente] = 0;
        }


        // buscando os alimentos da receita
        foreach ($alimentosReceita as $alimentoReceita) {
            // buscando os nutrientes de um alimento
            foreach ($alimentoReceita->alimento->nutrienteAlimento as $nutrienteAlimento) {
                // realizando a soma de nutrientes de uma refeição
                $nutrientesReceita[$nutrienteAlimento->idNutriente] = $nutrientesReceita[$nutrienteAlimento->idNutriente]
                    + (($nutrienteAlimento->qtde / 100) * $alimentoReceita->qtde);
            }
        }

        //buscando as porções da receita e o tipo da mesma
        $receitasPorcoes = ReceitaPorcao::where('idReceita', $id)->get();
        $tipoPorcao = TipoPorcao::where('idTipoPorcao', $receitasPorcoes->first()->idTipoPorcao)->first()->nome;
        $faixas = new FaixaEtaria();

        return view('receitas.receitaComponentes', compact('receita', 'nutrientesReceita',
            'nutrientes', 'receitasPorcoes', 'tipoPorcao', 'faixas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receita = Receita::find($id);
        $alimentosLista = New Alimento();
        $alimentosReceita = $receita->alimentoReceita;
        $tiposPorcao = new TipoPorcao();
        $faixas = FaixaEtaria::all();
        $receita_porcao = new ReceitaPorcao();

        // pega todos os alimentos que uma receita possui para passar para a view
        $alimentosContidos = $alimentosReceita->map(function ($alm) {
            return $alm->idAlimento;
        });

        $alimentosContidos = $alimentosContidos->toArray();
        return view('receitas.receitaEditar', compact('receita', 'alimentosLista', 'alimentosContidos',
            'alimentoReceita', 'tiposPorcao', 'faixas', 'receita_porcao'));
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
        $this->validate($request, [
            'nomeReceita' => 'required',
        ]);


        $receita = Receita::find($id);
        $receita->nomeReceita = $request->nomeReceita;
        $receita->preparoReceita = $request->preparoReceita;
        $receita->ativoReceita = ($request->ativoReceita ? 1 : 0);
        $receita->save();
        if ($request->hasFile('image')) {
            $request->image->storeAs('public/receitas', $receita->idReceita . ".png");
        }

        // limpando dados antigos
        DB::delete("delete FROM alimento_receita WHERE idReceita = ?",
            [$receita->idReceita]);
        DB::delete("delete FROM receita_porcao WHERE idReceita = ?",
            [$receita->idReceita]);

        // armazenando os alimentos contidos em uma receita
        foreach ($request->alimentos as $alimento) {
            $alimentoReceita = new AlimentoReceita();
            $alimentoReceita->idAlimento = $alimento;
            $alimentoReceita->idReceita = $receita->idReceita;
            $alimentoReceita->qtde = $request[$alimento];
            $alimentoReceita->unidadeMedida = 2;
            $alimentoReceita->save();
        }

        // salvando as porções que uma receita possui
        $faixasEtarias = FaixaEtaria::all();
        foreach ($faixasEtarias as $index => $faixasEtaria) {
            //salvando todas as porções adicionadas
            $receitaPorcao = new ReceitaPorcao();
            $receitaPorcao->idReceita = $receita->idReceita;
            $receitaPorcao->idTipoPorcao = $request->tipoPorcao;
            $receitaPorcao->idFEtaria = $faixasEtaria->idFEtaria;
            $receitaPorcao->qtde = $request['faixa-' . $faixasEtaria->idFEtaria];
            $receitaPorcao->save();
        }

        return redirect()->route('receitas')->with('status', 'Receita atualizada com sucesso!');
    }

    /**
     * Remove uma refeição do BD
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        Receita::find($id)->delete();
        return redirect()->route('receitas')->with('status', 'Receita removido com sucesso!');
    }

    /**
     * Desabilita uma receita, deixando a mesma indisponível para acesso
     * ao cardápio.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function disable($id)
    {
        $receita = Receita::find($id);
        $receita->ativoReceita = 0;
        $receita->save();
        return redirect()->route('receitas')->with('status', 'Receita desabilitada!');
    }

    /**
     * Habilita um
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enable($id)
    {
        $receita = Receita::find($id);
        $receita->ativoReceita = 1;
        $receita->save();
        return redirect()->route('receitas')->with('status', 'Receita habilitada!');

    }
}