@extends('layouts.dataTable')

@section('page_title', 'Alimentos <small>Lista de Alimentos referênciados da tabela TACO</small>')

@section('buttons_top')

    <a href="{{ route('alimentos.create') }}">
        <button class="btn btn-primary pull-right">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Adicionar Alimento
        </button>
        <div class="clearfix"></div>
    </a>

@endsection

@section('table_head')
    <tr>
        <th>Id</th>
        <th>Alimento</th>
        <th>Grupo Alimentar</th>
        <th>Grupo Piramide</th>
        <th>Ação</th>
    </tr>
@endsection

@section('table_body')
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
                        <button class="btn btn-primary btn-sm">
                            <i class="fa fa-folder" aria-hidden="true"></i> Detalhes
                        </button>
                    </a>
                    @if(Auth::check())
                        <a href="{{ route('alimentos.edit', ['id'=>$alimento->idAlimento]) }}">
                            <button class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil-square" aria-hidden="true"></i> Editar
                            </button>
                        </a>
                    @endif

                    @if(Auth::check())
                        <a href="#">
                            <button class="btn btn-danger btn-sm " data-toggle="modal"
                                    data-target="#alm-{{ $alimento->idAlimento }}">
                                <i class="fa fa-trash" aria-hidden="true"></i> Remover
                            </button>
                        </a>

                        <div id="alm-{{ $alimento->idAlimento }}" class="modal fade bs-example-modal-sm" tabindex="-1"
                             role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">REMOÇÃO DE ALIMENTO</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Você deseja realmente excluir este alimento?</h4>
                                        <p>Uma vez <span style="color: red;">removido</span>, o alimento
                                            <span style="color: red;">não poderá ser restaurado</span>.</p>
                                        <p>Você deseja continuar?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar
                                        </button>
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
@endsection