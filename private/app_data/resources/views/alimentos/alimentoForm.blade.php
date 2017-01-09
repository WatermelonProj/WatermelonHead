@extends('layouts.main')

@section('content')
    <div class="form-group">
    {!! Form::open(['route' => 'alimentos.teste']) !!}
        {{!! Form::label('email', 'E-Mail Address', ['class' => 'awesome']); !!}}

    {!! Form::close() !!}
    </div>
@endsection