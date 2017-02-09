@extends('layouts.app')

@section('links')
    @include('imports.datatables_links')
@endsection

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Receitas
                    <small>Selecione uma receita abaixo para ver suas informações</small>
                </h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="#">
                            <button class="btn btn-primary pull-right">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Adicionar Receita</button>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Receita</th>
                                <th>Criada Por</th>
                                <th>Ação</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($receitas as $receita)
                                <tr>
                                    <td>{{ $receita->idReceita }}</td>
                                    <td>{{ $receita->nomeReceita }}</td>
                                    <td>{{ $receita->user["name"] }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-info" aria-hidden="true"></i> Detalhes
                                                </button>
                                            </a>
                                            <a href="#">
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Remover
                                                </button>
                                            </a>
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
    @include('imports.morris_graphs')
@endsection