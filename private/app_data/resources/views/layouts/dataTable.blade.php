<?php
/**
 * Blade gerador de tabelas
 */
?>

@extends('layouts.app')

@section('links')
    @include('imports.datatables_links')
    @include('imports.pnotify_links')
    @yield('extra_links')
@endsection

{{--todo mnelhorar esta tela, organizar semanas--}}

{{--Seção de conteúdo--}}
@section('content')

    {{--div principal--}}
    <div>
        {{--titulo da página--}}
        <div class="page-title">
            <div class="title_left">
                <h3>
                    @yield('page_title')
                </h3>
            </div>
        </div>

        <div class="clearfix"></div>

        {{--Inicio da tabela--}}
        <div class="row">

            <div>
                <div class="x_panel">

                    {{--Titulo da tabela--}}
                    <div class="x_title">

                        {{--Seção para titulo da tabela--}}
                        @yield('table_title')

                        {{--Seção destinada a adicionar botõe acima da tabela, como por exemplo adicionar algum item--}}
                        @yield('buttons_top')
                        <div class="clearfix"></div>
                    </div>

                    {{--Tabela--}}
                    <div class="x_content">
                        <table id="datatable" class="table table-bordered @yield('table_class')">
                            <thead>
                            @yield('table_head')
                            </thead>

                            <tbody>
                            @yield('table_body')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    @include('imports.datatables_script')
    @include('imports.pnotify_script')

    @if (session('status'))
        <script>
            $(document).ready(function () {
                new PNotify({
                    title: "Sucesso!",
                    type: "success",
                    text: "{!! session('status') !!}",
                    nonblock: {
                        nonblock: true
                    },
                    styling: 'bootstrap3',
                    hide: true
                });

            });
        </script>
    @endif
@endsection