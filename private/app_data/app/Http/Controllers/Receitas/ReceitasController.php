<?php

namespace App\Http\Controllers\Receitas;

use App\Http\Controllers\Controller;
use App\Models\Alimento\Alimento;
use App\Models\Alimento\AlimentoReceita;
use App\Models\Nutriente\Nutriente;
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

        return view('receitas.receitaCriacao', compact('alimentos'));
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

        return view('receitas.receitaComponentes', compact('receita', 'nutrientesReceita', 'nutrientes'));
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

        // pega todos os alimentos que uma receita possui para passar para a view
        $alimentosContidos = $alimentosReceita->map(function ($alm) {
            return $alm->idAlimento;
        });

        $alimentosContidos = $alimentosContidos->toArray();
        return view('receitas.receitaEditar', compact('receita', 'alimentosLista', 'alimentosContidos', 'alimentoReceita'));
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

        // armazenando os alimentos contidos em uma receita
        foreach ($request->alimentos as $alimento) {
            $alimentoReceita = new AlimentoReceita();
            $alimentoReceita->idAlimento = $alimento;
            $alimentoReceita->idReceita = $receita->idReceita;
            $alimentoReceita->qtde = $request[$alimento];
            $alimentoReceita->unidadeMedida = 2;
            $alimentoReceita->save();
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