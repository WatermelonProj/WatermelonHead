@extends('layouts.dataTable')

@section('page_title', 'Receitas <small> Lista de receitas disponíveis</small>')

@section('buttons_top')
    <a href="{{ route('receitas.create') }}">
        <button class="btn btn-primary pull-right">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Adicionar Receita
        </button>
        <div class="clearfix"></div>
    </a>
@endsection

@section('table_head')
    <tr>
        <th>Id</th>
        <th>Receita</th>
        <th>Criada Por</th>
        <th>Ação</th>
    </tr>
@endsection

@section('table_body')
    @foreach($receitas as $receita)
        <tr>
            <td>{{ $receita->idReceita }}</td>
            <td>{{ $receita->nomeReceita }}</td>
            <td>{{ $receita->user["name"] }}</td>
            <td>
                <div class="btn-group">
                    <a href="{{ route('receitas.show', ['id' => $receita->idReceita]) }}">
                        <button class="btn btn-primary btn-sm">
                            <i class="fa fa-folder" aria-hidden="true"></i> Detalhes
                        </button>
                    </a>

                    @if(Auth::check())
                        <a href="{{ route('receitas.edit', ['id'=>$receita->idReceita]) }}">
                            <button class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil-square" aria-hidden="true"></i> Editar
                            </button>
                        </a>
                    @endif

                    @if((Auth::check()) && (Auth::user()->id === $receita->user['id']))
                        @if($receita->ativoReceita == 1)
                            {{-- Desativa Receita --}}
                            <a href="#">
                                <button class="btn btn-danger btn-sm " data-toggle="modal"
                                        data-target="#rct-{{ $receita->idReceita }}">
                                    <i class="fa fa-minus-square" aria-hidden="true"></i> Desativar
                                </button>
                            </a>

                            <div id="rct-{{ $receita->idReceita }}" class="modal fade bs-example-modal-sm" tabindex="-1"
                                 role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel2">DESABILITAR RECEITA</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Você deseja desabilitar esta receita?</h4>
                                            <p>É possível habilitar esta receita novamente por esta mesma tela.</p>
                                            <p>Você deseja continuar?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar
                                            </button>
                                            <a href="{{ route('receitas.disable', ['id' => $receita->idReceita]) }}">
                                                <button type="button" class="btn btn-danger">Desabilitar</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{-- Ativa Receita --}}
                            <a href="#">
                                <button class="btn btn-success btn-sm " data-toggle="modal"
                                        data-target="#rct-{{ $receita->idReceita }}">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i> Ativar
                                </button>
                            </a>

                            <div id="rct-{{ $receita->idReceita }}" class="modal fade bs-example-modal-sm" tabindex="-1"
                                 role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel2">HABILITAR RECEITA</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Você deseja reativar esta receita?</h4>
                                            <p>É possível desativar esta receita novamente por esta mesma tela.</p>
                                            <p>Você deseja continuar?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar
                                            </button>
                                            <a href="{{ route('receitas.enable', ['id' => $receita->idReceita]) }}">
                                                <button type="button" class="btn btn-success">Ativar</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <a href="#">
                            <button class="btn btn-danger btn-sm disabled">
                                <i class="fa fa-minus-square" aria-hidden="true"></i> Desativar
                            </button>
                        </a>
                    @endif
                </div>
            </td>
        </tr>
    @endforeach
@endsection