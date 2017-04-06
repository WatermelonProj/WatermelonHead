@extends('layouts.collectiveForms')

@section('page_title', 'Receita')

@section('form_links')
    @include('imports.icheck_links')
@endsection

@section('form_section')
    {!! Form::open(['route'=>'receitas.store', 'class'=>'form-horizontal form-label-left', 'id'=> 'cadastro-form',
     'data-parsley-validate', 'files' => 'true']) !!}

    <div class="form-group item">
        {!! Form::label('nomeReceita', 'Nome da Receita', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::text('nomeReceita', null, ['class'=>'form-control col-md-7 col-xs-12',
             'data-parsley-required', 'data-parsley-required-message' => "Preencha este campo" ]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('alimentos', 'Alimentos', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::select('alimentos[]', $alimentos::pluck('descricaoAlimento', 'idAlimento'), null,
            [ 'id'=>'mselect' ,'class'=>'form-control select2_multiple', 'multiple'=>true, 'multiple'=>'multiple',
            'data-parsley-required', 'data-parsley-required-message' => "Insira ao menos um alimento para a receita"]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('preparoReceita', 'Preparo', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::textarea('preparoReceita', null, ['class' => 'resizable_textarea form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('ativoReceita', 'Receita Ativa?', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="checkbox">
                <input name="ativoReceita" type="checkbox" class="flat" checked>
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('image', 'Imagem da Receita', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::file('image', ['class' => 'btn btn-primary', 'accept' => 'image/*']) !!}
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="clearfix"></div>
    <h2>Alimentos
        <small>Insira as quantidades</small>
    </h2>

    <div id="alm"></div>

    <div class="clearfix"></div>
    <div class="ln_solid"></div>
    {!! Form::submit('Cadastrar', ['class'=>'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
@endsection

@section('form_scripts')
    <script>
        $('document').ready(addAlm);
        $('#mselect').change(addAlm);

        {{--adiciona dinâmicamente o campo para valores dos alimentos--}}
        function addAlm() {
            var alimentos = $('#mselect').find(":selected");
            $('#alm').empty();
            for (i = 0; i < alimentos.length; i++) {
                $('#alm').append(
                    "<div class='form-group col-md-6 col-sm-6 col-xs-12'>" +
                    "<label for='alimento' class='control-label col-md-7 col-sm-3 col-xs-12'>" + alimentos[i].text + "</label>" +
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