@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ $alimento->descricaoAlimento }}</h1>
        </div>
    </div>

    {{--Tabela--}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    <table data-toggle="table"  data-show-toggle="true" data-show-columns="true" data-search="true"
                           data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
                           data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-field="id" data-sortable="false" >Componente</th>
                            <th data-field="unidade" data-sortable="false" >Unidade</th>
                            <th data-field="qtd" data-sortable="true" >Quantidade</th>
                        </tr>
                        </thead>
                        @foreach($alimento->nutrienteAlimento as $nutrienteAlm)
                            <tr>
                                <td>{{ $nutrienteAlm->nutriente->nomeNutriente }}</td>
                                <td>{{ $nutrienteAlm->nutriente->unidadeMedida->siglaUnidade }}</td>
                                <td>{{ $nutrienteAlm->qtde }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    {{--Scripts das tabelas--}}
    <script>
        $(function () {
            $('#hover, #striped, #condensed').click(function () {
                var classes = 'table';

                if ($('#hover').prop('checked')) {
                    classes += ' table-hover';
                }
                if ($('#condensed').prop('checked')) {
                    classes += ' table-condensed';
                }
                $('#table-style').bootstrapTable('destroy')
                        .bootstrapTable({
                            classes: classes,
                            striped: $('#striped').prop('checked')
                        });
            });
        });

        function rowStyle(row, index) {
            var classes = ['active', 'success', 'info', 'warning', 'danger'];

            if (index % 2 === 0 && index / 2 < classes.length) {
                return {
                    classes: classes[index / 2]
                };
            }
            return {};
        }
    </script>

@endsection