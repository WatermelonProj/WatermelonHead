@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Alimentos</h1>
    </div>
</div>

{{--Tabela--}}
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Lista de Alimentos</div>
            <div class="panel-body">
                <table data-toggle="table"  data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="id" data-sortable="true" >ID</th>
                            <th data-field="idGA" data-sortable="true">Grupo</th>
                            <th data-field="idGP"  data-sortable="true">Grupo Pirâmide</th>
                            <th data-field="idTaco" data-sortable="true">Id Taco</th>
                            <th data-field="descricao" data-sortable="false">Descrição</th>
                            <th data-field="acao" data-sortable="false">Ação</th>
                        </tr>
                    </thead>
                    @foreach($alimentos as $alimento)
                        <tr>
                            <td>{{ $alimento->idAlimento }}</td>
                            @if(empty($alimento->idGAlimentar))
                                <td>Não Classificado</td>
                            @else
                                <td>{{ $alimento->idGAlimentar }}</td>
                            @endif
                            <td>{{ $alimento->grupoPiramide['descricaoGP']}}</td>
                            <td>{{ $alimento->idTACO }}</td>
                            <td>{{ $alimento->descricaoAlimento }}</td>
                            <td>
                                <button class="btn btn-info btn-sm" >Informções</button>
                                <button class="btn btn-danger btn-sm" >Excluir</button>
                            </td>
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