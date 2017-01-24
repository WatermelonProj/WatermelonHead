@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Hover rows <small>Try hovering over the rows</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-hover jambo_table ">
                        <thead>
                        <tr>
                            <th>Componente</th>
                            <th>Unidade</th>
                            <th>Quantidade</th>
                            <th>Nome Cientifíco</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($alimento->nutrienteAlimento as $nutrienteAlm)
                            <tr>
                                <td>{{ $nutrienteAlm->nutriente->nomeNutriente }}</td>
                                <td>{{ $nutrienteAlm->nutriente->unidadeMedida->siglaUnidade }}</td>
                                <td>{{ $nutrienteAlm->qtde }}</td>
                                <td>{{ $nutrienteAlm->nutriente->cientificoNutriente }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection