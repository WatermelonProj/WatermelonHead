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

        //validação do cadastro de alimentos
        $this->validate($request,
            [
                'descricaoAlimento' => 'required',
                'idGPiramide' => 'required|numeric',
                'idGAlimentar' => 'required|numeric',
                'idTACO' => 'numeric',
                "Energia" => "numeric",
                "Proteína" => "numeric",
                "Lipídeos" => "numeric",
                "Colesterol" => "numeric",
                "Carboidrato" => "numeric",
                "Fibra_Alimentar" => "numeric",
                "Cinzas" => "numeric",
                "Cálcio" => "numeric",
                "Magnésio" => "numeric",
                "Manganês" => "numeric",
                "Fósforo" => "numeric",
                "Ferro" => "numeric",
                "Sódio" => "numeric",
                "Potássio" => "numeric",
                "Cobre" => "numeric",
                "Zinco" => "numeric",
                "Retinol" => "numeric",
                "RE" => "numeric",
                "RAE" => "numeric",
                "Tiamina" => "numeric",
                "Riboflavina" => "numeric",
                "Piridoxina" => "numeric",
                "Niacina" => "numeric",
                "Vitamina_C" => "numeric",
                "Triptofano" => "numeric",
                "Treonina" => "numeric",
                "Isoleucina" => "numeric",
                "Leucina" => "numeric",
                "Lisina" => "numeric",
                "Metionina" => "numeric",
                "Cistina" => "numeric",
                "Fenilalanina" => "numeric",
                "Tirosina" => "numeric",
                "Valina" => "numeric",
                "Arginina" => "numeric",
                "Histidina" => "numeric",
                "Alanina" => "numeric",
                "Ácido_Aspártico" => "numeric",
                "Ácido_Glutâmico" => "numeric",
                "Glicina" => "numeric",
                "Prolina" => "numeric",
                "Serina" => "numeric"
            ]

        );

        // Criando um alimento
        $alimento = new Alimento();
        $alimento->descricaoAlimento = $request->descricaoAlimento;
        $alimento->grupoPiramide()->associate(GrupoPiramide::find($request->idGPiramide));
        $alimento->grupoAlimentar()->associate(GrupoAlimentar::find($request->idGAlimentar));
        $alimento->idTACO = $request->idTACO;
        $alimento->save();

        //criando a relação do alimento para com o nutriente
        $keys = array_keys($request->toArray());
        for ($i = 6; $i < count($request->toArray()); $i++) {
            $nutrienteAlm = new NutrienteAlimento();
            $nutrienteAlm->alimento()->associate($alimento);
            $nutriente = Nutriente::where('nomeNutriente', str_replace('_', ' ', $keys[$i]))->first();
            $nutrienteAlm->nutriente()->associate($nutriente);
            $nutrienteAlm->qtde = ($request[$keys[$i]] > 0 ? $request[$keys[$i]] : 'NA');
            $nutrienteAlm->save();
        }

        //criando a relação do alimento com suas respectivas medidas caseiras
        for ($i = 0; $i < count($request->medidas_caseiras); $i++) {
            $medidaCaseira = new AlimentoMedidaCaseira();
            $medidaCaseira->alimento()->associate($alimento); //indexando com o alimento
            $tipoMedida = TipoMedidaCaseira::where('idTMCaseira', $request->medidas_caseiras[$i])->first();
            $medidaCaseira->tipoMedidaCaseira()->associate($tipoMedida); //indexando com o tipo de medida caseira
            $unidadeMedida = UnidadeMedida::where('idUnidade', 2)->first();
            $medidaCaseira->unidadeMedida()->associate($unidadeMedida); // associando com a unidade de medida em g por padrï¿½o
            $medidaCaseira->save();
        }

        //Caso o alimento possua medidas caseiras, redireciona para a pagina de informaÃ§Ãµes das mesmas
        if (count($request->medidas_caseiras) > 0) {
            return redirect()->route('alimentos.createMedida', ['id' => $alimento->idAlimento])
                ->with('status', 'Alimento criado com sucesso, insira os valores das mediads caseiras');
        } else {
            return redirect()->route('alimentos')->with('status', 'Alimento criado com sucesso!');
        }

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
        foreach ($medidas as $medida) {
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
     * Carrega a página de edição de alimento
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alimento = Alimento::find($id);
        return view('alimentos.alimentoEditar', compact('alimento'));
    }

    /**
     * Atualiza os atributos do alimento
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validação do cadastro de alimentos
        $this->validate($request,
            [
                'descricaoAlimento' => 'required',
                'idGPiramide' => 'required|numeric',
                'idGAlimentar' => 'required|numeric',
                'idTACO' => 'numeric',
                "Energia" => "numeric",
                "Proteína" => "numeric",
                "Lipídeos" => "numeric",
                "Colesterol" => "numeric",
                "Carboidrato" => "numeric",
                "Fibra_Alimentar" => "numeric",
                "Cinzas" => "numeric",
                "Cálcio" => "numeric",
                "Magnésio" => "numeric",
                "Manganês" => "numeric",
                "Fósforo" => "numeric",
                "Ferro" => "numeric",
                "Sódio" => "numeric",
                "Potássio" => "numeric",
                "Cobre" => "numeric",
                "Zinco" => "numeric",
                "Retinol" => "numeric",
                "RE" => "numeric",
                "RAE" => "numeric",
                "Tiamina" => "numeric",
                "Riboflavina" => "numeric",
                "Piridoxina" => "numeric",
                "Niacina" => "numeric",
                "Vitamina_C" => "numeric",
                "Triptofano" => "numeric",
                "Treonina" => "numeric",
                "Isoleucina" => "numeric",
                "Leucina" => "numeric",
                "Lisina" => "numeric",
                "Metionina" => "numeric",
                "Cistina" => "numeric",
                "Fenilalanina" => "numeric",
                "Tirosina" => "numeric",
                "Valina" => "numeric",
                "Arginina" => "numeric",
                "Histidina" => "numeric",
                "Alanina" => "numeric",
                "Ácido_Aspártico" => "numeric",
                "Ácido_Glutâmico" => "numeric",
                "Glicina" => "numeric",
                "Prolina" => "numeric",
                "Serina" => "numeric"
            ]

        );

        // Editando um alimento
        $alimento = Alimento::find($id);
        $alimento->descricaoAlimento = $request->descricaoAlimento;
        $alimento->grupoPiramide()->associate(GrupoPiramide::find($request->idGPiramide));
        $alimento->grupoAlimentar()->associate(GrupoAlimentar::find($request->idGAlimentar));
        $alimento->idTACO = $request->idTACO;
        $alimento->save();

        //Editando os nutrientes do alimento
        $keys = array_keys($request->toArray());
        for ($i = 6; $i < count($request->toArray()); $i++) {
            $nutrienteAlm = NutrienteAlimento::find($id);
            $nutriente = Nutriente::where('nomeNutriente', str_replace('_', ' ', $keys[$i]))->first();
            $nutrienteAlm->nutriente()->associate($nutriente);
            $nutrienteAlm->qtde = ($request[$keys[$i]] > 0 ? $request[$keys[$i]] : 'NA');
            $nutrienteAlm->save();
        }

        //criando a relação do alimento com suas respectivas medidas caseiras
        for ($i = 0; $i < count($request->medidas_caseiras); $i++) {
            //verifica se o alimento ja possui a medida caseira, se sim alterar os valores senão adicionar
            if (is_null($alimento->alimentoMedidaCaseira()->where('idTMCaseira', $request->medidas_caseiras[$i])
                ->where('idAlimento', $alimento->idAlimento))) {
                $medidaCaseira = AlimentoMedidaCaseira();
                $medidaCaseira->alimento()->associate($alimento); //indexando com o alimento
                $tipoMedida = TipoMedidaCaseira::where('idTMCaseira', $request->medidas_caseiras[$i])->first();
                $medidaCaseira->tipoMedidaCaseira()->associate($tipoMedida); //indexando com o tipo de medida caseira
                $unidadeMedida = UnidadeMedida::where('idUnidade', 2)->first();
                $medidaCaseira->unidadeMedida()->associate($unidadeMedida); // associando com a unidade de medida em g por padrï¿½o
                $medidaCaseira->save();
            }
        }

        //Caso o alimento possua medidas caseiras, redireciona para a pagina de informaÃ§Ãµes das mesmas
        if (count($request->medidas_caseiras) > 0) {
            return redirect()->route('alimentos.editMedidaCaseira', ['id' => $alimento->idAlimento])
                ->with('status', 'Alimento atualizado com sucesso, insira os valores das mediads caseiras');
        } else {
            return redirect()->route('alimentos')->with('status', 'Alimento atualizado com sucesso!');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * Retorna view para criar as medidas caseiras de um alimento
     */
    public function editMedidaCaseira($id)
    {
        // passa o alimento previamente cadastrado para que sejam inseridos suas medidas caseiras
        $alimento = Alimento::find($id);
        return view('alimentos.alimentoEditarMedidaCaseira', compact('alimento'));
    }

    /**
     * @param $id
     * @param Request $request
     *
     * Atualiza a MedidaCaseira
     */
    public function updateMedidaCaseira($id, Request $request)
    {
        // varre todas as medidas do alimento previamente cadastrado e insere seu valores
        $medidas = Alimento::find($id)->alimentoMedidaCaseira()->get();
        foreach ($medidas as $medida) {
            $medida->qtde = $request[str_replace(' ', '_', $medida->tipoMedidaCaseira()->first()->nomeTMC)];
            $medida->save();
        }

        return redirect()->route('alimentos')->with('status', 'Alimento atualizado com sucesso!');
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
