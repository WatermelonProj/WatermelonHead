@extends('layouts.dataTable')

@section('extra_links')

    @endsection

@section('page_title', 'Titulo da página!')

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
@endsection