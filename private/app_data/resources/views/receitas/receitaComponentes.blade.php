@extends('layouts.app')

@section('content')
    <div class="clearfix"></div>

    <div class="title_left">
        <h3>Receitas</h3>
        <a href="{{ route('receitas') }}">
            <i class="fa fa-arrow-left"></i>
            <button class="btn btn-link">Retornar as Receitas</button>
        </a>
    </div>

    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> A Receita
                        <small>Informações da receita</small>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <div class="col-xs-3">
                        <!-- required for floating -->
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabs-left">
                            <li class="active"><a href="#composicao" data-toggle="tab">Composição</a></li>
                            <li><a href="#preparo" data-toggle="tab">Preparo</a></li>
                            <li><a href="#outros" data-toggle="tab">Nutrientes</a></li>
                            <li><a href="#tipoPorcao" data-toggle="tab">Porções</a></li>
                        </ul>
                    </div>

                    <div class="col-xs-9">
                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="tab-pane active" id="composicao">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Alimento</th>
                                        <th>Quantidade</th>
                                        <th>Medida Utilizada</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($receita->alimentoReceita as $alimentoReceita)
                                        <tr>
                                            <td>{{ $alimentoReceita->alimento['descricaoAlimento'] }}</td>
                                            <td>{{ $alimentoReceita->qtde }}</td>
                                            <td>{{ $alimentoReceita->unidadeMedida()->first()['nomeUnidade'] }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane " id="preparo">
                                <p class="lead">{{ $receita->nomeReceita }}</p>
                                <p>{{ $receita->preparoReceita }}</p>
                            </div>

                            <div class="tab-pane" id="outros">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nutriente</th>
                                        <th>Quantidade</th>
                                        <th>Medida</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--nutrientes que o alimento contém--}}
                                    @foreach($nutrientes as $nutriente)
                                        @if($nutrientesReceita[$nutriente->idNutriente] != 0)
                                            <tr>
                                                <td>{{ $nutriente->nomeNutriente }}</td>
                                                <td>{{ $nutrientesReceita[$nutriente->idNutriente] }}</td>
                                                <td>{{ $nutriente->unidadeMedida->siglaUnidade }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane" id="tipoPorcao">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Faixa</th>
                                        <th>{{ $tipoPorcao }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($receitasPorcoes as $receitaPorcao)
                                        <tr>
                                            <td>{{ $faixas->where('idFEtaria', $receitaPorcao->idFEtaria)->first()->descricaoFaixa }}</td>
                                            <td>{{ $receitaPorcao->qtde }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        {{-- todo lembrar sempre de utilizar o comando php artisan storage:link para linkar o diretorio onde salvam as imagens dos alimentos--}}
        {{--Verifica se existe imagem relacionada ao alimento--}}
        @if((File::exists("storage/receitas/{$receita->idReceita}.png") xor File::exists("storage/receitas/{$receita->idReceita}.jpg")))
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Alimento
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content2">
                        {{--Verificando o formato da imagem--}}
                        @if((File::exists("storage/receitas/{$receita->idReceita}.png")))
                            <img src="{{ asset("storage/receitas/{$receita->idReceita}.png") }}" class="img-rounded"
                                 alt="Alimento" style="width:100%; height:100%;">
                        @else
                            <img src="{{ asset("storage/receitas/{$receita->idReceita}.jpg") }}" class="img-rounded"
                                 alt="Alimento" style="width:100%; height:100%;">
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>




@endsection