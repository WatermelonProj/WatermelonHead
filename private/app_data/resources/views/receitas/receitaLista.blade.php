@extends('layouts.dataTable')

@section('page_title', 'Receitas <small> Lista de receitas disponíveis</small>')

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
                        <a href="#">
                            <button class="btn btn-danger btn-sm " data-toggle="modal" data-target="#rct-{{ $receita->idReceita }}">
                                <i class="fa fa-trash" aria-hidden="true"></i> Remover
                            </button>
                        </a>

                        <div id="rct-{{ $receita->idReceita }}" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">REMOÇÃO DE RECEITA</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Você deseja realmente excluir esta receita?</h4>
                                        <p>Uma vez <span style="color: red;">removida</span>, a receita
                                            <span style="color: red;">não poderá ser restaurada</span>.</p>
                                        <p>Você deseja continuar?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <a href="{{ route('receitas.destroy', ['id' => $receita->idReceita]) }}">
                                            <button type="button" class="btn btn-danger">Remover</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="#">
                            <button class="btn btn-danger btn-sm disabled">
                                <i class="fa fa-trash" aria-hidden="true"></i> Remover
                            </button>
                        </a>
                    @endif
                </div>
            </td>
        </tr>
    @endforeach
@endsection