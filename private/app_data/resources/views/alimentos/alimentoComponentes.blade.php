@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><strong>{{ $alimento->idAlimento ." : "}}</strong> {{$alimento->descricaoAlimento }} </h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group col-md-6 col-sm-12 col-xs-12 pull-right">
                        <label class="control-label ">Medida</label>

                        <div class="form-group">
                            <div class="input-group">
                                <select name="selector" id="selector" class="form-control">
                                    <option class="medida" value="100.00">100g</option>
                                    @foreach($alimento->alimentoMedidaCaseira as $medidaCaseira)
                                        <option class="medida"
                                                value="{{ $medidaCaseira->qtde }}">
                                            {{ $medidaCaseira->tipoMedidaCaseira->nomeTMC}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="input-group-btn">
                                    <button id="atualizaNutr" type="button" class="btn btn-primary">Atualizar Medida</button>
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
                            @if($nutrienteAlm->qtde != "NA" && $nutrienteAlm->qtde != "Tr")
                                <tr>
                                    <td>{{ $nutrienteAlm->nutriente->nomeNutriente }}</td>
                                    <td>{{ $nutrienteAlm->nutriente->unidadeMedida->siglaUnidade }}</td>
                                    <td class="qtd">{{ $nutrienteAlm->qtde }}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        @if(File::exists("img/Alimentos/{$alimento->idAlimento}.png"))
        <!-- Imagem do Alimento -->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Alimento
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content2">
                    <img src="{{ asset("img/Alimentos/{$alimento->idAlimento}.png") }}" class="img-rounded"
                         alt="Cinque Terre" style="width:100%; height:100%;">
                </div>
            </div>
        </div>
        @endif

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

        var medidaAtual = 100;

        function atualizaNutrientes() {
            var qtd = $('.qtd');
            $.each(qtd, function (i, key) {
                if (key.text != 'NA' && key.text != "Tr") {
                    var vlr = (parseFloat($(key).text()) / medidaAtual)
                            * parseFloat($('select[name=selector]').val());
                    $(key).text(vlr.toFixed(2));
                }
            });
            medidaAtual = parseFloat($('select[name=selector]').val());
        }

        $('#atualizaNutr').click(function () {
            //console.log($('select[name=selector]').val())
            atualizaNutrientes();
        });
    </script>
@endsection