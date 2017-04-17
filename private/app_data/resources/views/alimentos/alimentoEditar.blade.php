@extends('layouts.app')

@section('links')
    @include('imports.select2_links')
@endsection

@section('content')

    {{--Seção de erros--}}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{--Cabeçalho--}}
    <div class="row">
        <div class="col-lg-12">
            <h1>Alimento</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Cadastro
                        <small>Insira as informações conforme solicitadas</small>
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>

                    {{--Form--}}
                    {!! Form::open(['route' => ['alimentos.update', 'id' => $alimento->idAlimento], 'class'=>'form-horizontal form-label-left',
                    'id'=> 'cadastro-form', 'data-parsley-validate', 'files' => 'true' ]) !!}
                    <div class="form-group item">
                        {!! Form::label('descricaoAlimento', 'Alimento', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('descricaoAlimento', $alimento->descricaoAlimento, ['class'=>'form-control col-md-7 col-xs-12',
                             'data-parsley-required', 'data-parsley-required-message' => "Preencha este campo" ]) !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('idGPiramide', 'Grupo Piramide', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('idGPiramide', \App\Models\Grupo\GrupoPiramide::pluck('descricaoGP', 'idGPiramide'), $alimento->idGPiramide, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('idGAlimentar', 'Grupo', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('idGAlimentar', \App\Models\Grupo\GrupoAlimentar::pluck('descricaoGA', 'idGAlimentar'), $alimento->idGAlimentar, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('idTACO', 'ID TACO', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('idTACO', $alimento->idTACO, ['class'=>'form-control', 'data-parsley-type'=>"number",
                             'data-parsley-type-message' => "Preencha com um valor númerico", 'data-parsley-required', 'data-parsley-required-message' => "Preencha este campo"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('nutrientes', 'Nutrientes', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('nutrientes[]', \App\Models\Nutriente\Nutriente::pluck('nomeNutriente', 'idNutriente'), $nutrientesContidos,
                            ['id'=>'nutrienteSelect', 'class'=>'form-control select2_multiple', 'multiple'=>true, 'multiple'=>'multiple']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('medidas_caseiras', 'Medidas Caseiras', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('medidas_caseiras[]', \App\Models\Medida\TipoMedidaCaseira::pluck('nomeTMC', 'idTMCaseira'), $medidasContidas,
                            ['id'=>'medidaCaseiraSelect', 'class'=>'form-control select2_multiple', 'multiple'=>true, 'multiple'=>'multiple']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('image', 'Imagem do Alimento', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {!! Form::file('image', ['class' => 'btn btn-primary', 'accept' => 'image/*']) !!}
                        </div>
                    </div>

                    {{--Nutrientes--}}
                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>
                    <h2>Nutrientes
                        <small>Insira as quantidades</small>
                    </h2>
                    <div id="ntr">
                        @foreach($nutrientesAlimento as $nutrienteAlimento)
                            <div class='form-group col-md-6 col-sm-6 col-xs-12'>
                                {!! Form::label('Ntr-'.$nutrienteAlimento->idNutriente, $nutriente->where('idNutriente', $nutrienteAlimento->idNutriente)->first()->nomeNutriente, ['class'=>'control-label col-md-7 col-sm-3 col-xs-12']) !!}
                                <div class='col-md-4 col-sm-4 col-xs-12'>
                                    {!! Form::text('Ntr-'.$nutrienteAlimento->idNutriente, $nutrienteAlimento->qtde,
                                    ['type'=>'number', 'class'=>'form-control', 'step'=>'0.01', 'data-parsley'=>'number',
                                     'data-parsley-type-message'=>'Preencha com um valor numérico',
                                     'data-parsley-required'=>'data-parsley-required',
                                     'data-parsley-required-message'=>'Preencha este Campo!']) !!}
                                </div>
                                {!! Form::label('nutriente', 'g',  ['class'=>'control-label col-md-1 col-sm-3 col-xs-12 pull-left']) !!}
                            </div>
                        @endforeach
                    </div>


                    {{--Medidas Caseiras--}}
                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>
                    <h2>Medidas Caseiras
                        <small>Insira as quantidades</small>
                    </h2>
                    <div id="mdcase">
                        @foreach($medidasAlimento as $medidaAlimento)
                            <div class='form-group col-md-6 col-sm-6 col-xs-12'>
                                {!! Form::label('Alm-'.$medidaAlimento->idTMCaseira, $medidaCaseira->where('idTMCaseira', $medidaAlimento->idTMCaseira)->first()->nomeTMC, ['class'=>'control-label col-md-7 col-sm-3 col-xs-12']) !!}
                                <div class='col-md-4 col-sm-4 col-xs-12'>
                                    {!! Form::text('Alm-'.$medidaAlimento->idTMCaseira, $medidaAlimento->qtde,
                                    ['type'=>'number', 'class'=>'form-control', 'step'=>'0.01', 'data-parsley'=>'number',
                                     'data-parsley-type-message'=>'Preencha com um valor numérico',
                                     'data-parsley-required'=>'data-parsley-required',
                                     'data-parsley-required-message'=>'Preencha este Campo!']) !!}
                                </div>
                                {!! Form::label('medida', 'g',  ['class'=>'control-label col-md-1 col-sm-3 col-xs-12 pull-left']) !!}
                            </div>
                        @endforeach
                    </div>

                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>

                    {!! Form::submit('Cadastrar', ['class'=>'btn btn-primary pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{--@include('imports.validator_script')--}}
    @include('imports.select2_script')
    @include('imports.parsley_script')

    <script>
        //        $('document').ready(addNutriente);
        //        $('document').ready(addMedida);
        $('#nutrienteSelect').change(addNutriente);
        $('#medidaCaseiraSelect').change(addMedida);

        {{-- adiciona dinâmicamente o campo para valores dos nutrientes --}}
        function addNutriente() {
            var nutrientes = $('#nutrienteSelect').find(":selected");
            $('#ntr').empty();
            for (i = 0; i < nutrientes.length; i++) {
                $('#ntr').append(
                    "<div class='form-group col-md-6 col-sm-6 col-xs-12'>" +
                    "<label for='alimento' class='control-label col-md-7 col-sm-3 col-xs-12'>" + nutrientes[i].text + "</label>" +
                    "<div class='col-md-4 col-sm-4 col-xs-12'>" +
                    "<input name=Ntr-" + nutrientes[i].value + " type='number' class='form-control', step='0.01', data-parsley='number'" +
                    "data-parsley-type-message='Preencha com um valor numérico', " +
                    "data-parsley-required='data-parsley-required', data-parsley-required-message='Preencha este Campo!'>" +
                    "</div>" +
                    "<label for='alimento' class='control-label col-md-1 col-sm-3 col-xs-12 pull-left'>g</label>" +
                    "</div>"
                );
            }
        }

        {{-- adiciona dinâmicamente o campo para valores dos nutrientes --}}
        function addMedida() {
            var nutrientes = $('#medidaCaseiraSelect').find(":selected");
            $('#mdcase').empty();
            for (i = 0; i < nutrientes.length; i++) {
                $('#mdcase').append(
                    "<div class='form-group col-md-6 col-sm-6 col-xs-12'>" +
                    "<label for='alimento' class='control-label col-md-7 col-sm-3 col-xs-12'>" + nutrientes[i].text + "</label>" +
                    "<div class='col-md-4 col-sm-4 col-xs-12'>" +
                    "<input name=Alm-" + nutrientes[i].value + " type='number' class='form-control', step='0.01', data-parsley='number'" +
                    "data-parsley-type-message='Preencha com um valor numérico', " +
                    "data-parsley-required='data-parsley-required', data-parsley-required-message='Preencha este Campo!'>" +
                    "</div>" +
                    "<label for='alimento' class='control-label col-md-1 col-sm-3 col-xs-12 pull-left'>g</label>" +
                    "</div>"
                );
            }
        }
    </script>
@endsection