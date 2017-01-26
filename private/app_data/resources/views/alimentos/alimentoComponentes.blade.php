@extends('layouts.app')

{{ Helpers::teste() }}

@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $alimento->descricaoAlimento }} </h2>
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

        <!-- pie chart -->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pie Chart <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content2">
                    <div id="graph_donut" style="width:100%; height:300px;"></div>
                </div>
            </div>
        </div>
        <!-- /Pie chart -->
    </div>

@endsection

@section('scripts')
    @include('imports.datatables_script')
    @include('imports.morris_graphs')

    <script>
        Morris.Donut({
            element: 'graph_donut',
            data: [
                {label: 'Jam', value: 124},
                {label: 'Frosted', value: 40},
                {label: 'Custard', value: 10},
                {label: 'Sugar', value: 70},
                {label: 'Carb', value: 10}

            ],
            colors: shuffle(['#26B99A', '#34495E', '#ACADAC', '#3498DB', '#ff99ff', '#66ffff', '#99cc00']),
            formatter: function (y) {
                return y + "%";
            },
            resize: true
        });
    </script>
@endsection