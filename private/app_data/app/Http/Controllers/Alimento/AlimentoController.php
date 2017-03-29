<?php

namespace App\Http\Controllers\Alimento;

use App\Http\Controllers\Controller;
use App\Models\Alimento\Alimento;
use App\Models\Alimento\AlimentoMedidaCaseira;
use App\Models\Grupo\GrupoAlimentar;
use App\Models\Grupo\GrupoPiramide;
use App\Models\Medida\TipoMedidaCaseira;
use App\Models\Medida\UnidadeMedida;
use App\Models\Nutriente\Nutriente;
use App\Models\Nutriente\NutrienteAlimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class AlimentoController
 * @package App\Http\Controllers\Alimento
 */
class AlimentoController extends Controller
{
    /**
     * Mostra uma lista com os alimentos ja cadastrados no banco de dados, junto com as funções
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alimentos = Alimento::all();
        return view('alimentos.alimentoLista', compact('alimentos'));
    }

    /**
     * Formulário de criação de alimentos.
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
                'Energia' => 'numeric',
                'Proteína' => 'numeric',
                'Lipídeos' => 'numeric',
                'Colesterol' => 'numeric',
                'Carboidrato' => 'numeric',
                'Fibra_Alimentar' => 'numeric',
                'Cinzas' => 'numeric',
                'Cálcio' => 'numeric',
                'Magnésio' => 'numeric',
                'Manganês' => 'numeric',
                'Fósforo' => 'numeric',
                'Ferro' => 'numeric',
                'Sódio' => 'numeric',
                'Potássio' => 'numeric',
                'Cobre' => 'numeric',
                'Zinco' => 'numeric',
                'Retinol' => 'numeric',
                'RE' => 'numeric',
                'RAE' => 'numeric',
                'Tiamina' => 'numeric',
                'Riboflavina' => 'numeric',
                'Piridoxina' => 'numeric',
                'Niacina' => 'numeric',
                'Vitamina_C' => 'numeric',
                'Triptofano' => 'numeric',
                'Treonina' => 'numeric',
                'Isoleucina' => 'numeric',
                'Leucina' => 'numeric',
                'Lisina' => 'numeric',
                'Metionina' => 'numeric',
                'Cistina' => 'numeric',
                'Fenilalanina' => 'numeric',
                'Tirosina' => 'numeric',
                'Valina' => 'numeric',
                'Arginina' => 'numeric',
                'Histidina' => 'numeric',
                'Alanina' => 'numeric',
                'Ácido_Aspártico' => 'numeric',
                'Ácido_Glutâmico' => 'numeric',
                'Glicina' => 'numeric',
                'Prolina' => 'numeric',
                'Serina' => 'numeric'
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
     * Retorna view para criar as medidas caseiras de um alimento
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
        $img = Storage::url('Alimentos/4.png');
        return view('alimentos.alimentoComponentes', compact('alimento', 'img'));
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

        //Editando os nutrientes do alimento, atualiza na tabela alimento_medidaCaseira
        // o alimento do id recebido com o nutriente atual
        $keys = array_keys($request->toArray());

        //tratando do contador caso a Request venha com as medidas caseiras
        $i = (count($request->medidas_caseiras) > 0 ? 6 : 5);

        for ($i; $i < count($request->toArray()); $i++) {
            $nutriente = Nutriente::where('nomeNutriente', str_replace('_', ' ', $keys[$i]))->first();
            if (!is_null(NutrienteAlimento::where('idAlimento', $alimento->idAlimento)
                ->where('idNutriente', $nutriente->idNutriente)->first())
            ) {
                $nutrienteAlm = $alimento->nutrienteAlimento()->where('idNutriente', $nutriente->idNutriente)->first();
                $nutrienteAlm['qtde'] = $request[$keys[$i]];
                $nutrienteAlm->save();
            }
        }

        //verifica se o alimento ja possui a medida caseira, se sim alterar os valores senão adicionar
        for ($i = 0; $i < count($request->medidas_caseiras); $i++) {
            //pegando o ID da medida caseira para verificar se a mesma ja esta nas relação entre alimento e medida
            if (is_null($alimento->alimentoMedidaCaseira()->where('idTMCaseira', $request->medidas_caseiras[$i])->first())) {
                $medidaCaseira = new AlimentoMedidaCaseira();
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
     * Retorna view para criar as medidas caseiras de um alimento
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function editMedidaCaseira($id)
    {
        // passa o alimento previamente cadastrado para que sejam inseridos suas medidas caseiras
        $alimento = Alimento::find($id);

        return view('alimentos.alimentoEditarMedidaCaseira', compact('alimento'));
    }

    /**
     * Atualiza a MedidaCaseira
     *
     * @param $id
     * @param Request $request
     *
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
     * Deleta um alimento
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
