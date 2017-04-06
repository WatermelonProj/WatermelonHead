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
                    {!! Form::open(['route'=>'alimentos.store', 'class'=>'form-horizontal form-label-left',
                    'id'=> 'cadastro-form', 'data-parsley-validate' ]) !!}
                    <div class="form-group item">
                        {!! Form::label('descricaoAlimento', 'Alimento', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('descricaoAlimento', null, ['class'=>'form-control col-md-7 col-xs-12',
                             'data-parsley-required', 'data-parsley-required-message' => "Preencha este campo" ]) !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('idGPiramide', 'Grupo Piramide', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('idGPiramide', \App\Models\Grupo\GrupoPiramide::pluck('descricaoGP', 'idGPiramide'), null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('idGAlimentar', 'Grupo', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('idGAlimentar', \App\Models\Grupo\GrupoAlimentar::pluck('descricaoGA', 'idGAlimentar'), null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('idTACO', 'ID TACO', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('idTACO', null, ['class'=>'form-control', 'data-parsley-type'=>"number",
                             'data-parsley-type-message' => "Preencha com um valor númerico", 'data-parsley-required', 'data-parsley-required-message' => "Preencha este campo"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('nutrientes', 'Nutrientes', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('nutrientes[]', \App\Models\Nutriente\Nutriente::pluck('nomeNutriente', 'idNutriente'), null,
                            ['class'=>'form-control select2_multiple', 'multiple'=>true, 'multiple'=>'multiple']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('medidas_caseiras', 'Medidas Caseiras', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('medidas_caseiras[]', \App\Models\Medida\TipoMedidaCaseira::pluck('nomeTMC', 'idTMCaseira'), null,
                            ['class'=>'form-control select2_multiple', 'multiple'=>true, 'multiple'=>'multiple']) !!}
                        </div>
                    </div>

                    {{--Nutrientes--}}
                    <div class="ln_solid"></div>
                    <div class="clearfix"></div>
                    <h2>Nutrientes</h2>

                    {{--@foreach($nutrientes as $nutriente)--}}
                        {{--@if($nutriente->idNutriente != 2)--}}
                            {{--<div class="form-group col-md-6 col-sm-6 col-xs-12">--}}
                                {{--{!! Form::label( $nutriente->nomeNutriente ,  $nutriente->nomeNutriente , ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}--}}
                                {{--<div class="col-md-3 col-sm-6 col-xs-12">--}}
                                    {{--{!! Form::number($nutriente->nomeNutriente, null, ['class'=>'form-control', 'step'=>'0.01',--}}
                                     {{--'data-parsley-type'=>"number",--}}
                                 {{--'data-parsley-type-message' => "Preencha com um valor númerico"]) !!}--}}
                                {{--</div>--}}
                                {{--<p style="margin-left: 10px; margin-top: 5px;">{{ $nutriente->unidadeMedida['siglaUnidade'] }}</p>--}}
                            {{--</div>--}}
                        {{--@endif--}}
                    {{--@endforeach --}}


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
@endsection