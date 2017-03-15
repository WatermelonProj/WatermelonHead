@extends('layouts.app')

@section('links')
    @include('imports.datatables_links')
    @include('imports.pnotify_links')
@endsection

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Alimentos
                    <small>Lista de Alimentos referênciados da tabela TACO</small>
                </h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="{{ route('alimentos.create') }}">
                            <button class="btn btn-primary pull-right">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Adicionar Alimento</button>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Alimento</th>
                                <th>Grupo Alimentar</th>
                                <th>Grupo Piramide</th>
                                <th>Ação</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($alimentos as $alimento)
                                <tr>
                                    <td>{{ $alimento->idAlimento }}</td>
                                    <td>{{ $alimento->descricaoAlimento }}</td>
                                    <td>
                                        @if($alimento->grupoAlimentar['descricaoGA'])
                                            {{ $alimento->grupoAlimentar['descricaoGA'] }}
                                        @else
                                            Não classificado
                                        @endif
                                    </td>
                                    <td>{{ $alimento->grupoPiramide['descricaoGP'] }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('alimentos.show', ['id'=>$alimento->idAlimento]) }}">
                                                <button class=" btn-info btn-sm">
                                                    <i class="fa fa-folder" aria-hidden="true"></i> Detalhes
                                                </button>
                                            </a>
                                            @if(Auth::check())
                                            <a href="{{ route('alimentos.edit', ['id'=>$alimento->idAlimento]) }}">
                                                <button class=" btn-warning btn-sm">
                                                    <i class="fa fa-pencil-square" aria-hidden="true"></i> Editar
                                                </button>
                                            </a>
                                            @endif

                                            @if(Auth::check())
                                                <button class=" btn-danger btn-sm " data-toggle="modal" data-target="#alm-{{ $alimento->idAlimento }}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Remover
                                                </button>

                                                <div id="alm-{{ $alimento->idAlimento }}" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                                </button>
                                                                <h4 class="modal-title" id="myModalLabel2">REMOÇÃO DE ALIMENTO</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4>Você deseja realmente excluir este alimento?</h4>
                                                                <p>Uma vez removido, o alimento não poderá ser restaurado.</p>
                                                                <p>Você deseja continuar?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                <a href="{{ route('alimentos.destroy', ['id'=>$alimento->idAlimento]) }}">
                                                                    <button type="button" class="btn btn-danger">Remover</button>
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    @include('imports.datatables_script')
    @include('imports.pnotify_script')
    @include('imports.morris_graphs')

    @if (session('status'))
        <script>
            $(document).ready(function() {
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

    <script>

    </script>
@endsection