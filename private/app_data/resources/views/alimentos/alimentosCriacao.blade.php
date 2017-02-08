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
                    {!! Form::open(['route'=>'alimentos.store', 'class'=>'form-horizontal form-label-left']) !!}
                    <div class="form-group ">
                        {!! Form::label('descricaoAlimento', 'Alimento', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('descricaoAlimento', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('idGPiramide', 'Grupo Piramide', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('idGPiramide', \App\GrupoPiramide::pluck('descricaoGP', 'idGPiramide'), null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('idGAlimentar', 'Grupo', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('idGAlimentar', \App\GrupoAlimentar::pluck('descricaoGA', 'idGAlimentar'), null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('idTACO', 'ID TACO', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}--}}
                        {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                            {{--{!! Form::text('idTACO', null, ['class'=>'form-control']) !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--Nutrientes--}}
                    <div class="ln_solid"></div>
                    <div class="clearfix"></div>
                    <h2>Nutrientes</h2>

                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('energia', 'Energia', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('energia', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '1')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('proteina', 'Proteína', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('proteina', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '3')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('lipideos', 'Lipídeos', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('lipideos', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '4')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('Colesterol', 'Colesterol', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('Colesterol', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '5')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('carboidrato', 'Carboidrato', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('carboidrato', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '6')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('fibra_alimentar', 'Fibra Alimentar', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('fibra_alimentar', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '7')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('cinzas', 'Cinzas', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('cinzas', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '8')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('calcio', 'Cálcio', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('calcio', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '9')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('magnesio', 'Magnésio', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('magnesio', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '10')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('manganes', 'Manganês', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('manganes', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '11')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('fosforo', 'Fósforo', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('fosforo', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '12')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('ferro', 'Ferro', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('ferro', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '13')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('sodio', 'Sódio', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('sodio', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '14')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('Potássio', 'Potássio', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('Potássio', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '15')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('Cobre', 'Cobre', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('Cobre', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '16')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('zinco', 'Zinco', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('zinco', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '17')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('retinol', 'Retinol', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('retinol', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '18')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('re', 'RE', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('re', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '19')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('rae', 'RAE', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('rae', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '20')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('tiamina', 'Tiamina', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('tiamina', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '21')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('riboflavina', 'Riboflavina', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('riboflavina', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '22')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('piridoxina', 'Piridoxina', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('piridoxina', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '23')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('Niacina', 'Niacina', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('Niacina', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '24')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        {!! Form::label('vitamina_c', 'Vitamina C', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('vitamina_c', null, ['class'=>'form-control']) !!}
                        </div>
                        <p style="margin-left: 10px; margin-top: 5px;">{{ App\Nutriente::Where('idNutriente', '25')->first()
                            ->UnidadeMedida->siglaUnidade }}</p>
                    </div>
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
    @include('imports.resizeable_script')
@endsection