@extends('layouts.app')

@section('content')
    <div class="clearfix"></div>

    <div class="title_left">
        <h3>Receitas</h3>
    </div>

    <div class="col-md-8 col-sm-8 col-xs-8">
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
                        <li><a href="#outros" data-toggle="tab">Outros</a></li>
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

                        <div class="tab-pane col-md-12 col-sm-12 col-xs-12" id="preparo">
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
                                {{--para cada alimento que a receita contém soma seus nutrientes de acordo quantidade de sua medidas--}}
                                {{ $nutrientes = array() }}
                                @foreach($receita->alimentoReceita as $alimentoReceita)
                                    @foreach($alimentoReceita->alimento->nutrienteAlimento as $nutrienteAlimento)
                                        {{ $nutrientes[$nutrienteAlimento->nutriente->nomeNutriente] =  }}
                                    @endforeach
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

    {{--Verifica se existe imagem relacionada ao alimento--}}
    @if((File::exists("img/Receitas/{$receita->idReceita}.png") xor File::exists("img/Receitas/{$receita->idReceita}.jpg")))
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
                    @if((File::exists("img/Receitas/{$receita->idReceita}.png")))
                        <img src="{{ asset("img/Receitas/{$receita->idReceita}.png") }}" class="img-rounded"
                             alt="Alimento" style="width:100%; height:100%;">
                    @else
                        <img src="{{ asset("img/Receitas/{$receita->idReceita}.jpg") }}" class="img-rounded"
                             alt="Alimento" style="width:100%; height:100%;">
                    @endif
                </div>
            </div>
        </div>
    @endif

@endsection