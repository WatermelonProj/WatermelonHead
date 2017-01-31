@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$alimento->idAlimento ."-". $alimento->descricaoAlimento }} </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group col-md-4 col-sm-12 col-xs-12 pull-right">
                        <label class="control-label ">Medida Caseira</label>
                        <div class="form-group">
                            <div class="input-group">
                                <select class="form-control">
                                    <option class="medida" value="100g">100g</option>
                                    @foreach($alimento->alimentoMedidaCaseira as $medidaCaseira)
                                        <option class="medida" value="{{ $medidaCaseira->tipoMedidaCaseira->classeTMC }}">
                                            {{ $medidaCaseira->tipoMedidaCaseira->nomeTMC}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="input-group-btn">
                                    <button id="atualizaNutr" type="button" class="btn btn-primary">Go!</button>

                                </span>
                            </div>
                        </div>
                    </div>

                    <table class="table table-hover jambo_table ">
                        <thead>
                        <tr>
                            <th>Componente</th>
                            <th>Unidade</th>
                            <th>Quantidade</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($alimento->nutrienteAlimento as $nutrienteAlm)
                            @if($nutrienteAlm->qtde != "NA")
                                <tr>
                                    <td>{{ $nutrienteAlm->nutriente->nomeNutriente }}</td>
                                    <td>{{ $nutrienteAlm->nutriente->unidadeMedida->siglaUnidade }}</td>
                                    <td>{{ $nutrienteAlm->qtde }}</td>
                                </tr>
                            @endif
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
                    <h2>Composição
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
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
        function chart() {
            Morris.Donut({
                element: 'graph_donut',
                data: {!! grafoComposicao($alimento->nutrienteAlimento) !!},
                colors: shuffle(['#26B99A', '#34495E', '#ACADAC', '#3498DB', '#ff99ff', '#66ffff', '#99cc00']),
                formatter: function (y) {
                    return y + "%";
                },
                resize: true
            });
        }

        chart();

        $('#atualizaNutr').click(function () {

        });

        function atualizaNutrientes() {

        }
    </script>
@endsection