@extends('layouts.collectiveForms')

@section('page_title', 'Receita')

@section('form_section')
    {!! Form::open(['route'=>'receitas.store', 'class'=>'form-horizontal form-label-left',
                    'id'=> 'cadastro-form', 'data-parsley-validate' ]) !!}


    {!! Form::submit('') !!}

    {!! Form::submit('Cadastrar', ['class'=>'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
    <h1>deu</h1>
@endsection