@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="title_left">
            <h3>{{ $alimento->descricaoAlimento }}</h3>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="jumbotron">
                <p>
                    ENERGIA = {{$nutrientes[0]['qtde']}} KCAL = {{$nutrientes[1]['qtde']}} KJ
                </p>
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

    @if(File::exists("storage/alimentos/{$alimento->idAlimento}.png") xor
            File::exists("storage/alimentos/{$alimento->idAlimento}.jpg"))
        <!-- Imagem do Alimento -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Alimento</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content2">
                        @if(File::exists("storage/alimentos/{$alimento->idAlimento}.png"))
                            <img src="{{ asset("storage/alimentos/{$alimento->idAlimento}.png") }}" class="img-rounded"
                                 alt="alimento" style="width:100%; height:100%;">
                        @else
                            <img src="{{ asset("storage/alimentos/{$alimento->idAlimento}.jpg") }}" class="img-rounded"
                                 alt="alimento" style="width:100%; height:100%;">
                        @endif
                    </div>
                </div>
            </div>
        @endif

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