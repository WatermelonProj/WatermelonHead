@extends('layouts.dataTable')

@section('page_title', "Resumo Mensal")

@section('table_title', "DD/MM/YYYY")

@section('table_head')
    <th>DIA</th>
    <th>Quantia Diaria</th>
@endsection

@section('table_body')
    @foreach($cardapios as $cardapio)
        <?php $nutrientes = $cardapio->getTotalNutrientes() ?>
        <tr>
            <td>{{ toCarbon($cardapio->dataUtilizacao)->format('d/m/y') }}</td>
            <td>
                {{ dump($nutrientes) }}
                {{--<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">--}}
                    {{--<div class="panel">--}}
                        {{--<a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse"--}}
                           {{--data-parent="#accordion" href="#collapseOne" aria-expanded="false"--}}
                           {{--aria-controls="collapseOne">--}}
                            {{--<h4 class="panel-title">Collapsible Group Items #1</h4>--}}
                        {{--</a>--}}
                        {{--<div id="collapseOne" class="panel-collapse collapse" role="tabpanel"--}}
                             {{--aria-labelledby="headingOne">--}}
                            {{--<div class="panel-body">--}}
                                {{--<table class="table table-bordered">--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th>#</th>--}}
                                        {{--<th>First Name</th>--}}
                                        {{--<th>Last Name</th>--}}
                                        {{--<th>Username</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tbody>--}}
                                    {{--<tr>--}}
                                        {{--<th scope="row">1</th>--}}
                                        {{--<td>Mark</td>--}}
                                        {{--<td>Otto</td>--}}
                                        {{--<td>@mdo</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<th scope="row">2</th>--}}
                                        {{--<td>Jacob</td>--}}
                                        {{--<td>Thornton</td>--}}
                                        {{--<td>@fat</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<th scope="row">3</th>--}}
                                        {{--<td>Larry</td>--}}
                                        {{--<td>the Bird</td>--}}
                                        {{--<td>@twitter</td>--}}
                                    {{--</tr>--}}
                                    {{--</tbody>--}}
                                {{--</table>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="panel">--}}
                        {{--<a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse"--}}
                           {{--data-parent="#accordion" href="#collapseTwo" aria-expanded="false"--}}
                           {{--aria-controls="collapseTwo">--}}
                            {{--<h4 class="panel-title">Collapsible Group Items #2</h4>--}}
                        {{--</a>--}}
                        {{--<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"--}}
                             {{--aria-labelledby="headingTwo">--}}
                            {{--<div class="panel-body">--}}
                                {{--<p><strong>Collapsible Item 2 data</strong>--}}
                                {{--</p>--}}
                                {{--Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad--}}
                                {{--squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck--}}
                                {{--quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="panel">--}}
                        {{--<a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse"--}}
                           {{--data-parent="#accordion" href="#collapseThree" aria-expanded="false"--}}
                           {{--aria-controls="collapseThree">--}}
                            {{--<h4 class="panel-title">Collapsible Group Items #3</h4>--}}
                        {{--</a>--}}
                        {{--<div id="collapseThree" class="panel-collapse collapse" role="tabpanel"--}}
                             {{--aria-labelledby="headingThree">--}}
                            {{--<div class="panel-body">--}}
                                {{--<p><strong>Collapsible Item 3 data</strong>--}}
                                {{--</p>--}}
                                {{--Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad--}}
                                {{--squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck--}}
                                {{--quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </td>
        </tr>
    @endforeach
@endsection