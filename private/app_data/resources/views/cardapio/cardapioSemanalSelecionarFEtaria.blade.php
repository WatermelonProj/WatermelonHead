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
            <h1>Relatório Mensal</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <small>Selecione uma faixa etária para gerar o relatório mensal</small>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    {{--Form--}}
                    {!! Form::open(['route' => 'cardapio.totalSemanal', 'class'=>'form-horizontal form-label-left',
                    'cadastro-form', 'data-parsley-validate']) !!}

                    <div class="form-group ">
                        {!! Form::label('faixaEtaria', 'Faixa Etaria', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            {!! Form::select('faixaEtaria', $faixasEtarias, null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('mes', 'Mês', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            {!! Form::select('mes', ['1' => 'Janeiro', '2' => 'Fevereiro', '3' => 'Março',
                            '4' => 'Abril', '5' => 'Maio', '6' => 'Junho', '7' => 'Julho', '8' => 'Agosto',
                            '9' => 'Setembro',  '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro'],
                             $mesAtual, ['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            {!! Form::number('ano', \Carbon\Carbon::now()->year, ['class' => 'form-control', 'placeholder' => 'ano']) !!}
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>

                    {!! Form::submit('Gerar', ['class'=>'btn btn-primary pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('imports.validator_script')
    @include('imports.select2_script')
    @include('imports.parsley_script')
@endsection