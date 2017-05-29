@extends('layouts.app')

@section('content')
    <div class="clearfix"></div>

    <div class="title_left">
        <h3>Refeição</h3>
        <a href="{{ route('refeicao') }}">
            <i class="fa fa-arrow-left"></i>
            <button class="btn btn-link">Retornar as Refeições</button>
        </a>
    </div>

    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Refeição
                        <small>Lista de Receitas contidas em uma refeição</small>
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped">
                        <thead>
                        <tr class="headings">
                            <th>#</th>
                            <th>Receita</th>
                            <th>Link para Receita</th>
                        </tr>
                        </thead>
                        @foreach($receitaRefeicao as $index => $receita)
                            <tr>
                                <td>{{ $index }}</td>
                                <td>{{ $receita->nomeReceita }}</td>
                                <td>
                                    <a target="_blank" href="{{ route('receitas.show', ['id' => $receita->idReceita]) }}" class="links">
                                        Ir para receita <i class="fa fa-external-link"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection