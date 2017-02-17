<?php

namespace App\Http\Controllers\Alimento;

use App\Models\Alimento\AlimentoMedidaCaseira;
use App\Models\Grupo\GrupoAlimentar;
use App\Models\Grupo\GrupoPiramide;
use App\Models\Medida\TipoMedidaCaseira;
use App\Models\Medida\UnidadeMedida;
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

        //criando a relação do alimento para com o nutriente
        $keys = array_keys($request->toArray());
        for ($i = 5; $i < count($request->toArray()); $i++) {
            $nutrienteAlm = new NutrienteAlimento();
            $nutrienteAlm->alimento()->associate($alimento);
            $nutriente = Nutriente::where('nomeNutriente', str_replace('_', ' ', $keys[$i]))->first();
            $nutrienteAlm->nutriente()->associate($nutriente);
            $nutrienteAlm->qtde = ($request[$keys[$i]] > 0 ? $request[$keys[$i]] : 'NA');
            $nutrienteAlm->save();
        }

        //criando a relaçãop do alimento com suas respectivas medidas caseiras
        for ($i = 0; $i < count($request->medidas_caseiras); $i++) {
            $medidaCaseira = new AlimentoMedidaCaseira();
            $medidaCaseira->alimento()->associate($alimento); //indexando com o alimento
            $tipoMedida = TipoMedidaCaseira::where('idTMCaseira', $request->medidas_caseiras[$i])->first();
            $medidaCaseira->tipoMedidaCaseira()->associate($tipoMedida);
            $unidadeMedida = UnidadeMedida::where('idUnidade', 2);
            $medidaCaseira->unidadeMedida()->associate($unidadeMedida);

        }


        return redirect()->route('alimentos')->with('status', 'Alimento criado com sucesso!');
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
