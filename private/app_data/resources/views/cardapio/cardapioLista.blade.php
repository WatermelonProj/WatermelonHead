@extends('layouts.app')

@section('content')
    <div class="row">
        {{--Percorrendo as faixas etárias--}}
        @foreach($cardapios as $index => $cardapioFE)
            <div class="col-md-4" style="min-height: 600px;">
                <div class="x_panel">
                    <div class="x_title">
                        {{--Descrição da Faixa Etaria--}}
                        <h2>{{ $faixa::find($cardapioFE->first()['idFEtaria'])['descricaoFaixa'] }}
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {{--percorrendo os cardapios das faixas etárias--}}
                        @foreach($cardapioFE as $cardapio)
                            <article class="media event">
                                {{--Data do cardápio--}}
                                <a class="pull-left date">
                                    <p class="month">{{ toCarbon($cardapio->dataUtilizacao)->formatLocalized('%b') }}</p>
                                    <p class="day">{{ toCarbon($cardapio->dataUtilizacao)->day }}</p>
                                </a>
                                {{--Refeições do cardápio--}}
                                <div class="media-body">
                                    <table class="table">
                                        <thead>
                                        <th>Refeição</th>
                                        <th>Horário</th>
                                        </thead>
                                        @foreach($cardapio->cardapioRefeicao as $refeicao)
                                            <tr>
                                                <td>
                                                    <a target="_blank" class="title pull-left"
                                                       href="{{ route('refeicao.show', ['id' => $refeicao->idRefeicao]) }}">
                                                        {{$refeicao->refeicao->nomeRefeicao}}
                                                    </a>
                                                </td>
                                                <td>
                                                    <p class="pull-left ">
                                                        Horário: {{ toCarbon($refeicao->dataUtilizacao)->toTimeString() }}</p>
                                                    <br>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </article>
                            <div class="clearfix"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection