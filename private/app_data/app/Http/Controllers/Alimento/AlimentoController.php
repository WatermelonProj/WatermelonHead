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
     * Salva as informações básicas de um alimento e redireciona para a criação de medidas caseiras
     * se o alimento a possuir
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dump($request);

        //validação
//        $this->validate($request,
//            [
//                'descricaoAlimento' => 'required',
//                'idGpiramide' => 'required',
//                'idTACO' => 'required',
//            ]
//
//        );
//
//        // Criando um alimento
//        $alimento = new Alimento();
//        $alimento->descricaoAlimento = $request->descricaoAlimento;
//        $alimento->grupoPiramide()->associate(GrupoPiramide::find($request->idGPiramide));
//        $alimento->grupoAlimentar()->associate(GrupoAlimentar::find($request->idGAlimentar));
//        $alimento->idTACO = $request->idTACO;
//        $alimento->save();
//
//        //criando a relaï¿½ï¿½o do alimento para com o nutriente
//        $keys = array_keys($request->toArray());
//        for ($i = 6; $i < count($request->toArray()); $i++) {
//            $nutrienteAlm = new NutrienteAlimento();
//            $nutrienteAlm->alimento()->associate($alimento);
//            $nutriente = Nutriente::where('nomeNutriente', str_replace('_', ' ', $keys[$i]))->first();
//            $nutrienteAlm->nutriente()->associate($nutriente);
//            $nutrienteAlm->qtde = ($request[$keys[$i]] > 0 ? $request[$keys[$i]] : 'NA');
//            $nutrienteAlm->save();
//        }
//
//        //criando a relaï¿½ï¿½o do alimento com suas respectivas medidas caseiras
//        for ($i = 0; $i < count($request->medidas_caseiras); $i++) {
//            $medidaCaseira = new AlimentoMedidaCaseira();
//            $medidaCaseira->alimento()->associate($alimento); //indexando com o alimento
//            $tipoMedida = TipoMedidaCaseira::where('idTMCaseira', $request->medidas_caseiras[$i])->first();
//            $medidaCaseira->tipoMedidaCaseira()->associate($tipoMedida); //indexando com o tipo de medida caseira
//            $unidadeMedida = UnidadeMedida::where('idUnidade', 2)->first();
//            $medidaCaseira->unidadeMedida()->associate($unidadeMedida); // associando com a unidade de medida em g por padrï¿½o
//            $medidaCaseira->save();
//        }
//
//        //Caso o alimento possua medidas caseiras, redireciona para a pagina de informaÃ§Ãµes das mesmas
//        if (count($request->medidas_caseiras) > 0) {
//            return redirect()->route('alimentos.createMedida', ['id' => $alimento->idAlimento])
//                ->with('status', 'Alimento criado com sucesso, insira os valores das mediads caseiras');
//        } else {
//            return redirect()->route('alimentos')->with('status', 'Alimento criado com sucesso!');
//        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * Retorna view para criar as medidas caseiras de um alimento
     */
    public function createMedidaCaseira($id)
    {
        // passa o alimento previamente cadastrado para que sejam inseridos suas medidas caseiras
        $alimento = Alimento::find($id);
        return view('alimentos.alimentoMedidaCaseira', compact('alimento'));
    }

    /**
     * @param $id
     * @param Request $request
     *
     * Realiza o cadastro
     */
    public function storeMedidaCaseira($id, Request $request)
    {
        // varre todas as medidas do alimento previamente cadastrado e insere seu valores
        $medidas = Alimento::find($id)->alimentoMedidaCaseira()->get();
        foreach($medidas as $medida) {
            $medida->qtde = $request[str_replace(' ', '_', $medida->tipoMedidaCaseira()->first()->nomeTMC)];
            $medida->save();
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
        // lista as medidas caseiras, as quais o alimento possui para serem preenchidas
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
