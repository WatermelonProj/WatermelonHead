@extends('layouts.dataTable')

@section('page_title', "Resumo Mensal")

@section('table_title', "DD/MM/YYYY")

@section('table_head')
    <th>DIA</th>
    <th>Quantia Diaria</th>
@endsection

@section('table_body')
    @foreach($cardapios as $index => $cardapio)
        <?php $nutrientes = $cardapio->getTotalNutrientes() ?>
        <tr>
            <td>{{ toCarbon($cardapio->dataUtilizacao)->format('d/m/y') }}</td>
            <td>
                <div class="accordion" id="accordion-{{$index}}" role="tablist" aria-multiselectable="true">
                    {{--ENERGIA fornecida pelo alimento--}}
                    <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingOne-{{$index}}" data-toggle="collapse"
                           data-parent="#accordion-{{$index}}" href="#collapseOne-{{$index}}" aria-expanded="false"
                           aria-controls="collapseOne-{{$index}}">
                            <h4 class="panel-title">Energia</h4>
                        </a>
                        <div id="collapseOne-{{$index}}" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div style="text-align: center;">
                                            <span class="">
                                                <i class="fa fa-flash fa-2x"></i> ENERGIA
                                                = {{$nutrientes[1]}} KCAL
                                                = {{$nutrientes[2]}} KJ
                                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Macronutrientes--}}
                    <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo-{{$index}}" data-toggle="collapse"
                           data-parent="#accordion-{{$index}}" href="#collapseTwo-{{$index}}" aria-expanded="false"
                           aria-controls="collapseTwo-{{$index}}">
                            <h4 class="panel-title">Macronutrientes</h4>
                        </a>
                        <div id="collapseTwo-{{$index}}" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingTwo-{{$index}}">
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nutriente</th>
                                        <th>Quantidade</th>
                                        <th>Unidade</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Proteína</td>
                                        <td>{{$nutrientes[3]}}</td>
                                        <td>g</td>
                                    </tr>
                                    <tr>
                                        <td>Lipídeos</td>
                                        <td>{{$nutrientes[4]}}</td>
                                        <td>g</td>
                                    </tr>
                                    <tr>
                                        <td>Carboidrato</td>
                                        <td>{{$nutrientes[6]}}</td>
                                        <td>g</td>
                                    </tr>
                                    <tr>
                                        <td>Fibra</td>
                                        <td>{{$nutrientes[7]}}</td>
                                        <td>g</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{--Micronutrientes--}}
                    <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree-{{$index}}"
                           data-toggle="collapse"
                           data-parent="#accordion-{{$index}}" href="#collapseThree-{{$index}}" aria-expanded="false"
                           aria-controls="collapseThree-{{$index}}">
                            <h4 class="panel-title">Micronutrientes - Minerais</h4>
                        </a>
                        <div id="collapseThree-{{$index}}" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingThree-{{$index}}">
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nutriente</th>
                                        <th>Quantidade</th>
                                        <th>Unidade</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Cálcio</td>
                                        <td>{{$nutrientes[9]}}</td>
                                        <td>mg</td>
                                    </tr>
                                    <tr>
                                        <td>Magnésio</td>
                                        <td>{{$nutrientes[10]}}</td>
                                        <td>mg</td>
                                    </tr>
                                    <tr>
                                        <td>Manganês</td>
                                        <td>{{$nutrientes[11]}}</td>
                                        <td>mg</td>
                                    </tr>
                                    <tr>
                                        <td>Ferro</td>
                                        <td>{{$nutrientes[13]}}</td>
                                        <td>mg</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{--Macronutrientes--}}
                    <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingFour-{{$index}}" data-toggle="collapse"
                           data-parent="#accordion-{{$index}}" href="#collapseFour-{{$index}}" aria-expanded="false"
                           aria-controls="collapseFour-{{$index}}">
                            <h4 class="panel-title">Micronutrientes - Vitaminas</h4>
                        </a>
                        <div id="collapseFour-{{$index}}" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingFour-{{$index}}">
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nutriente</th>
                                        <th>Quantidade</th>
                                        <th>Unidade</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Retinol</td>
                                        <td>{{$nutrientes[18]}}</td>
                                        <td>µg</td>
                                    </tr>
                                    <tr>
                                        <td>Vitamina C</td>
                                        <td>{{$nutrientes[25]}}</td>
                                        <td>mg</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
@endsection