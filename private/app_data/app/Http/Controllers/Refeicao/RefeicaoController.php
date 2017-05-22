<?php

namespace App\Http\Controllers\Refeicao;

use App\Models\Receita\Receita;
use App\Models\Receita\ReceitaRefeicao;
use App\Models\Refeicao\Refeicao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RefeicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refeicoes = Refeicao::all();

        return view('refeicao.refeicaoLista', compact('refeicoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //buscando todas as receitas ativas
        $receitas = Receita::where('ativoReceita', 1)->get();

        return view('refeicao.refeicaoCriacao', compact('receitas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'nomeRefeicao' => 'required',
        ]);

        $refeicao = new Refeicao();
        $refeicao->nomeRefeicao = $request->nomeRefeicao;
        $refeicao->ativoRefeicao = 1;
        $refeicao->save();

        foreach ($request->receitas as $index => $receita) {
            $receitaRefeicao = new ReceitaRefeicao();
            $receitaRefeicao->idReceita = $receita;
            $receitaRefeicao->idRefeicao = $refeicao->idRefeicao;
            $receitaRefeicao->save();
        }

        return redirect()->route('refeicao')->with('status', 'Refeicao criada com sucesso!');

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
        $refeicao = Refeicao::find($id);

        // receitas que compõem uma refeição
        $receitas = Receita::where('ativoReceita', 1)->get();
//        $receitaRefeicao
        //lmebrar dop receita refeicao
        return view('refeicao.refeicaoEditar', compact('refeicao', 'receitas'));
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
