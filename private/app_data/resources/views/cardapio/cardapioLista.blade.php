@extends('layouts.app')

@section('content')
    <div class="row">
        {{--Percorrendo as faixas etárias--}}
        @foreach($cardapios as $index => $cardapioFE)
            {{-- Ó AS GAMBI--}}
            @if($index > 2)
                <div class="clearfix"></div>
            @endif
            <div class="col-md-4 pull-left">
                <div class="x_panel">
                    <div class="x_title">
                        {{--Descrição da Faixa Etaria--}}
                        <h2>{{ $faixa::find($cardapioFE->first()['idFEtaria'])['descricaoFaixa'] }}
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li>
                                <a class="close-link"><i class="fa fa-close"></i></a>
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
                                        <th>
                                            <a href="{{ route('cardapio.edit', ['id' => $cardapio->idCardapio]) }}">
                                                <button class="btn btn-warning btn-xs">
                                                    <i class="fa fa-pencil-square" aria-hidden="true"></i> Editar
                                                </button>
                                            </a>
                                        </th>
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

@section('scripts')
    @if (session('status'))
        <script>
            $(document).ready(function () {
                new PNotify({
                    title: "Sucesso!",
                    type: "success",
                    text: "{!! session('status') !!}",
                    nonblock: {
                        nonblock: true
                    },
                    styling: 'bootstrap3',
                    hide: true
                });

            });
        </script>
    @endif
@endsection