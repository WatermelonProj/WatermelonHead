@extends('layouts.main')

@section('content')

    {{--Cabeçalho--}}
    <div class="row">
        <div class="col-lg-12">
            <h1>Alimento</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastro de Alimentos</div>
                <div class="panel-body">
                    {{--Form--}}
                    {!! Form::open(['route'=>'alimentos.store', 'class'=>'col-lg-6 col-lg-offset-3']) !!}
                    <div class="form-group ">
                        {!! Form::label('idGPiramide', 'Grupo Piramide') !!}
                        {!! Form::select('idGPiramide', \App\GrupoPiramide::pluck('descricaoGP', 'idGPiramide'), null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group ">
                        {!! Form::label('idGAlimentar', 'Grupo') !!}
                        {!! Form::select('idGAlimentar', \App\GrupoAlimentar::pluck('descricaoGA', 'idGAlimentar'), null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group ">
                        {!! Form::label('descricaoAlimento', 'Descrição') !!}
                        {!! Form::text('descricaoAlimento', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('idTACO', 'ID TACO') !!}
                        {!! Form::text('idTACO', null, ['class'=>'form-control']) !!}
                    </div>
                    {!! Form::submit('Cadastrar', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
