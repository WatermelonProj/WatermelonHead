<?php

namespace App\Http\Controllers\Alimento;

use App\Models\Grupo\GrupoAlimentar;
use App\Models\Grupo\GrupoPiramide;
use App\Models\Nutriente\Nutriente;
use App\Models\Nutriente\NutrienteAlimento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alimento\Alimento;

class AlimentoController extends Controller
{
    /**
     * Lista os alimentos, junto com suas respectivas propriedades
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alimentos = Alimento::all();
        return view('alimentos.alimentoLista', compact('alimentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alimentos.alimentosCriacao ');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Criando um alimento
        $alimento = new Alimento();
        $alimento->descricaoAlimento = $request->descricaoAlimento;
        $alimento->grupoPiramide()->associate(GrupoPiramide::find($request->idGPiramide));
        $alimento->grupoAlimentar()->associate(GrupoAlimentar::find($request->idGAlimentar));
        $alimento->idTACO = $request->idTACO;
        $alimento->save();

//        $nutrienteAlm = new NutrienteAlimento();
//        $nutrienteAlm->alimento()->associate($alimento);
//        $nutrienteAlm->nutriente()->associate(Nutriente::where('nomeNutriente', 'Energia')->first());
//        $nutrienteAlm->qtde = ($request['Energia'] > 0 ? $request['Energia'] : 'NA');
//        $nutrienteAlm->save();

        //criando a relação do alimento para com o nutriente
        $keys = array_keys($request->toArray());
        for ($i = 5; $i < count($request->toArray()); $i++) {
            $nutrienteAlm = new NutrienteAlimento();
            $nutrienteAlm->alimento()->associate($alimento);
            $nutriente = Nutriente::where('nomeNutriente', $keys[$i])->first();
            $PORRA = $nutriente->idNutriente;
            dump($PORRA);
//            dump($nutriente);
//            $nutrienteAlm->idNutriente = $nutriente->idNutriente;
//            $nutrienteAlm->qtde = ($request[$keys[$i]] > 0 ? $request[$keys[$i]] : 'NA');
//            $nutrienteAlm->save();
//            dump($keys[$i]);
        }
        redirect()->route('alimentos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alimento = Alimento::find($id);
        return view('alimentos.alimentoComponentes', compact('alimento'));
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
        Alimento::find($id)->delete();
        return redirect()->route('alimentos')->with('status', 'Alimento removido com sucesso!');
    }
}
