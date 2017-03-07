@extends('layouts.app')

@section('content')

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
                    {!! Form::open(['route'=>['alimentos.storeMedida', $alimento->idAlimento], 'class'=>'form-horizontal form-label-left' ]) !!}
                    @foreach($alimento->alimentoMedidaCaseira as $medidaCaseira)
                        <div class="form-group ">
                            {!! Form::label($medidaCaseira->tipoMedidaCaseira['nomeTMC'], $medidaCaseira->tipoMedidaCaseira['nomeTMC'], ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::number($medidaCaseira->tipoMedidaCaseira['nomeTMC'], null, ['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required']) !!}
                            </div>
                            <p><strong>{{ $medidaCaseira->unidadeMedida['siglaUnidade'] }}</strong></p>
                        </div>
                    @endforeach

                    <div class="clearfix"></div>

                    <div class="ln_solid"></div>

                    {!! Form::submit('Confirmar', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection