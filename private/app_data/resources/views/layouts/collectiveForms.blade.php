@extends('layouts.app')

@section('links')
    @include('imports.select2_links')
    @yield('form_links')
@endsection

@section('content')
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
            <h1>@yield('page_title')</h1>
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
                    @yield('form_section')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{--@include('imports.validator_script')--}}
    @include('imports.select2_script')
    @include('imports.parsley_script')
    @yield('form_scripts')
@endsection