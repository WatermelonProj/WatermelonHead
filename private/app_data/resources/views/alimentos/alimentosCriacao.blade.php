@extends('layouts.app')

@section('content')

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
                    {!! Form::open(['route'=>'alimentos.store', 'class'=>'form-horizontal form-label-left' ]) !!}
                    <div class="form-group item">
                        {!! Form::label('descricaoAlimento', 'Alimento', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('descricaoAlimento', null, ['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required']) !!}
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
                            {!! Form::text('idTACO', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    {{--Nutrientes--}}
                    <div class="ln_solid"></div>
                    <div class="clearfix"></div>
                    <h2>Nutrientes</h2>

                    <?php $nutrientes = App\Models\Nutriente\Nutriente::all() ?>
                    @foreach($nutrientes as $nutriente)
                        @if($nutriente->idNutriente != 2)
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            {!! Form::label( $nutriente->nomeNutriente ,  $nutriente->nomeNutriente , ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                {!! Form::number($nutriente->nomeNutriente, null, ['class'=>'form-control']) !!}
                            </div>
                            <p style="margin-left: 10px; margin-top: 5px;">{{ $nutriente->unidadeMedida['siglaUnidade'] }}</p>
                        </div>
                        @endif
                    @endforeach

                    <div class="clearfix"></div>

                    <div class="ln_solid"></div>

                    {!! Form::submit('Cadastrar', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('imports.validator_script')
@endsection