@extends('layouts.app')

@section('links')
    @include('imports.datatables_links')
@endsection

@section('content')

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Alimentos <small>Lista de Alimentos referênciados da tabela TACO</small></h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">

            <div class="">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Alimentos</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Id TACO</th>
                                <th>Alimento</th>
                                <th>Grupo Alimentar</th>
                                <th>Grupo Piramide</th>
                                <th>Ação</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($alimentos as $alimento)
                                <tr>
                                    <td>{{ $alimento->idTACO }}</td>
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
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-info" aria-hidden="true"></i> Detalhes
                                                </button></a>
                                            <a href="{{ route('alimentos.destroy', ['id'=>$alimento->idAlimento]) }}">
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
    @include('imports.morris_graphs')
@endsection