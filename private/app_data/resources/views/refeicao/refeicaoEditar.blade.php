@extends('layouts.collectiveForms')

@section('page_title', 'Refeição')

@section('form_links')
    @include('imports.icheck_links')
@endsection


@section('form_section')
    {!! Form::open(['route' => ['refeicao.update', 'id' => $refeicao->idRefeicao], 'class'=>'form-horizontal form-label-left', 'id'=> 'cadastro-form',
     'data-parsley-validate', 'files' => 'true']) !!}

    <div class="form-group item">
        {!! Form::label('nomeRefeicao', 'Nome da Refeição ', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::text('nomeRefeicao', $refeicao->nomeRefeicao, ['class'=>'form-control col-md-7 col-xs-12',
             'data-parsley-required', 'data-parsley-required-message' => "Preencha este campo" ]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('receitas', 'Receitas', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::select('receitas[]', $receitas->pluck('nomeReceita', 'idReceita'),
            array_values($receitaRefeicao->toArray()),
            ['id'=>'mselect' ,'class'=>'form-control select2_multiple', 'multiple'=>true, 'multiple'=>'multiple',
            'data-parsley-required', 'data-parsley-required-message' => "Insira ao menos um alimento para a receita"]) !!}
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="ln_solid"></div>
    {!! Form::submit('Cadastrar', ['class'=>'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
@endsection

@section('form_scripts')
    @include('imports.resizeable_script')
    @include('imports.icheck_scripts')
@endsection