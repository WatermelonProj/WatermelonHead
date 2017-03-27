<?php

namespace App\Http\Controllers\Receitas;

use App\Models\Alimento\Alimento;
use App\Models\Nutriente\Nutriente;
use App\Models\Receita\Receita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        //
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

