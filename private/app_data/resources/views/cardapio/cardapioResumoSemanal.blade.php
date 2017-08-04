@extends('layouts.dataTable')

@section('page_title', "Resumo Mensal")

@section('links')
    <!-- bootstrap-progressbar -->
    <link href="{{asset('theme/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}"
          rel="stylesheet">
@endsection

@section('table_title', "Semanas")

@section('table_head')
    <th>Semana</th>
    <th>Quantidades Semanais</th>
@endsection

@section('table_body')
    @foreach($semanas as $index => $semana)
        <td>{{ $index }}</td>
        <td>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Nutriente</th>
                    <th>Quantidade</th>
                    <th>Unidade</th>
                    <th>Quantidades</th>
                </tr>
                </thead>
                <tbody>
                @foreach($semana as $i => $nutrienteSemana)
                    @if(in_array($i, array(1, 3, 4, 6, 7, 9, 10, 11, 13, 18, 25)))
                    <tr>
                        <td>
                            {{ $nutrientes->find($i)->nomeNutriente}}
                        </td>
                        <td>
                            {{ $nutrienteSemana }}
                        </td>
                        <td>
                            {{ $nutrientes->find($i)->unidadeMedida->siglaUnidade }}
                        </td>
                        <td>
                            @if($nutrientesPorFaixa[$i] != 0)
                                <?php $qtd = ($nutrienteSemana * 100) / (($nutrientesPorFaixa[$i] * 5) * 5);
                                $progressColor = $qtd < 20 ? 'progress-bar-danger' : 'progress-bar-success';
                                ?>
                                <div class="progress ">
                                    <div class="progress-bar {{ $progressColor }}"
                                         data-transitiongoal="{{ $qtd }}"></div>
                                </div>
                                    <span>
                                        Mínimo Semanal (100%) = {{ ($nutrientesPorFaixa[$i] * 5) * 5}}
                                    </span><br>
                                    <span>
                                        % Exigida (20%) = {{ ($nutrientesPorFaixa[$i]) * 5 }}
                                    </span><br>
                                    <span>
                                        % Atingida = {{ $qtd }}
                                    </span>
                            @else
                                <span>
                                    ---
                                </span>
                            @endif
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </td>
    @endforeach
@endsection

@section('scripts')
@endsection