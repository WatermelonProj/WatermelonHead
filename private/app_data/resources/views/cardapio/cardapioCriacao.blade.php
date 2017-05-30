@extends('layouts.collectiveForms')

@section('page_title', 'Receita')

@section('form_links')
    @include('imports.icheck_links')
@endsection

@section('form_section')
    {!! Form::open(['route'=>'refeicao.store', 'class'=>'form-horizontal form-label-left', 'id'=> 'cadastro-form',
     'data-parsley-validate', 'files' => 'true']) !!}

    {{--Faixa Etaria--}}
    <div class="form-group ">
        {!! Form::label('faixaEtaria', 'Faixa Etaria', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::select('faixaEtaria', $faixaEtaria::pluck('descricaoGP', 'idGPiramide'), null, ['class'=>'form-control']) !!}
        </div>
    </div>

    {!! Form::submit('Cadastrar', ['class'=>'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
@endsection

@section('form_scripts')
    <script>
        $('#mselect').change(addAlm);

        {{-- adiciona dinâmicamente o campo para valores dos alimentos --}}
        function addAlm() {
            var alimentos = $('#mselect').find(":selected");
            $('#alm').empty();
            for (i = 0; i < alimentos.length; i++) {
                $('#alm').append(
                    "<div class='form-group col-md-6 col-sm-6 col-xs-12'>" +
                    "<label for='alimento' class='control-label col-md-3 col-sm-3 col-xs-12'>" + alimentos[i].text + "</label>" +
                    "<div class='col-md-4 col-sm-4 col-xs-12'>" +
                    "<input name=" + alimentos[i].value + " type='number' class='form-control', step='0.01', data-parsley='number'" +
                    "data-parsley-type-message='Preencha com um valor numérico', " +
                    "data-parsley-required='data-parsley-required', data-parsley-required-message='Preencha este Campo!'>" +
                    "</div>" +
                    "<label for='alimento' class='control-label col-md-1 col-sm-3 col-xs-12 pull-left'>g</label>" +
                    "</div>"
                );
            }
        }
    </script>
    @include('imports.resizeable_script')
    @include('imports.icheck_scripts')
@endsection