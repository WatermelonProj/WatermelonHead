@extends('layouts.collectiveForms')

@section('page_title', 'Cardápio')

@section('form_links')
    @include('imports.icheck_links')
@endsection

@section('form_section')
    {!! Form::open(['route'=>'cardapio.store', 'class'=>'form-horizontal form-label-left', 'id'=> 'cadastro-form',
     'data-parsley-validate', 'files' => 'true']) !!}

    {{--Faixa Etaria--}}
    <div class="form-group ">
        {!! Form::label('faixaEtaria', 'Faixa Etaria', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-3 col-sm-6 col-xs-12">
            {!! Form::select('faixaEtaria', $faixaEtaria, $cardapio->idFEtaria, ['class'=>'form-control']) !!}
        </div>
    </div>

    {{--Data do Cardápio--}}
    <div class="form-group">
        {!! Form::label('data', 'Data', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="form-group">
            <div class="controls">
                <div class="col-md-3 xdisplay_inputx form-group has-feedback">
                    {!! Form::text('data', toCarbon($cardapio->dataUtilizacao)->format("d/m/y"),
                     ['class'=>'form-control has-feedback-left', 'id'=>'single_cal1',
                    'placeholder'=>'DD/MM/AAAA', 'aria-describedby'=>'inputSuccess2Status']) !!}
                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                    <span id="inputSuccess2Status" class="sr-only">(success)</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('refeicoes', 'Refeições do Cardápio', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            <div class="col-md-4 col-sm-6 col-xs-12">
                {!! Form::select('refeicoes[]', $refeicoes, array_values($refeicoesContidas),
                [ 'id'=>'mselect' ,'class'=>'form-control select2_multiple', 'multiple'=>true, 'multiple'=>'multiple',
                'data-parsley-required', 'data-parsley-required-message' => "Insira ao menos uma receita"]) !!}
            </div>
        </div>
    </div>

    {{--Horários--}}
    <div class="clearfix"></div>
    <div class="ln_solid"></div>
    <h2>Horários
        <small>Insira os horários de acordo com a refeição</small>
    </h2>
    <div id="date">
        @foreach($cardapioRefeicoes as $item)
            <div class='form-group col-md-6 col-sm-6 col-xs-12'>
                <label for='refeicao' class='control-label col-md-3 col-sm-3 col-xs-12'>{{ $item->refeicao['nomeRefeicao'] }}</label>
                <div class='col-md-4 col-sm-4 col-xs-12'>
                    <input name={{ $item->idRefeicao }} type='text' class='form-control' placeholder='HH:MM'
                           pattern='[0-9][0-9]:[0-9][0-9]' value="{{ toCarbon($item->dataUtilizacao)->format('h:i') }}"
                           data-parsley-required data-parsley-pattern-message='Insira a hora no seguinte formato : Hora/Minuto(s)'>
                </div>
            </div>
        @endforeach
    </div>

    {!! Form::submit('Salvar', ['class'=>'btn btn-primary pull-right']) !!}
    {!! Form::close() !!}
@endsection

@section('form_scripts')
    @include('imports.resizeable_script')
    @include('imports.icheck_scripts')
    {{--dateranger--}}
    <script src="{{ asset('theme/gentelella/production/js/moment/moment.min.js') }}"></script>
    <script src="{{ asset('theme/gentelella/production/js/datepicker/daterangepicker.js') }}"></script>
    <!-- jquery.inputmask -->
    <script src="{{ asset(('theme/gentelella/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')) }}"></script>

    <!-- jquery.inputmask -->
    <script>
        $(document).ready(function () {
            $(":input").inputmask();
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#single_cal1').daterangepicker({
                format: 'DD/MM/YYYY',
                locale: {
                    daysOfWeek: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                    monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                },
                singleDatePicker: true,
                calender_style: "picker_1"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        })
    </script>

    <script>
        $('#mselect').change(addDate);

        {{-- adiciona dinâmicamente o campo para valores dos alimentos --}}
        function addDate() {
            var refeicoes = $('#mselect').find(":selected");
            $('#date').empty();
            for (i = 0; i < refeicoes.length; i++) {
                $('#date').append(
                    "<div class=\'form-group col-md-6 col-sm-6 col-xs-12\'>\n    " +
                    "<label for=\'refeicao\' class=\'control-label col-md-3 col-sm-3 col-xs-12\'>" + refeicoes[i].text + "</label>\n    " +
                    "<div class=\'col-md-4 col-sm-4 col-xs-12\'>\n        " +
                    "<input name=" + refeicoes[i].value + " type=\'text\' class=\'form-control\'" +
                    " placeholder=\'HH:MM\'\n               pattern=\'[0-9][0-9]:[0-9][0-9]\' data-parsley-required data-parsley-pattern-message=\'Insira a hora no seguinte formato : Hora/Minuto(s)\'>\n    " +
                    "</div>\n" +
                    "</div>"
                );
            }
        }
    </script>
@endsection