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
            <tr>
                <td>Proteína</td>
                <td>{{$nutrientes[3]}}</td>
                <td>g</td>
                <td>
                    <?php $qtd = ($nutrientes[3] * 100) / ($nutrientesPorFaixa[3] * 5);
                    $progressColor = $qtd < 20 ? 'progress-bar-danger' : 'progress-bar-success';
                    ?>
                    <div class="progress ">
                        <div class="progress-bar {{ $progressColor }}"
                             data-transitiongoal="{{ $qtd }}"></div>
                    </div>
                    <span>
                                                Mínimo Diário (100%) = {{ $nutrientesPorFaixa[3] * 5}}
                                            </span><br>
                    <span>% Exigida (20%) = {{ $nutrientesPorFaixa[3] }} </span><br>
                    <span>% Atingida = {{ $qtd }}</span>
                </td>
            </tr>
            <tr>
                <td>Lipídeos</td>
                <td>{{$nutrientes[4]}}</td>
                <td>g</td>
                <td>
                    <?php $qtd = ($nutrientes[4] * 100) / ($nutrientesPorFaixa[4] * 5);
                    $progressColor = $qtd < 20 ? 'progress-bar-danger' : 'progress-bar-success';
                    ?>
                    <div class="progress ">
                        <div class="progress-bar {{ $progressColor }}"
                             data-transitiongoal="{{ $qtd }}"></div>
                    </div>
                    <span>
                                                Mínimo Diário (100%) = {{ $nutrientesPorFaixa[4] * 5}}
                                            </span><br>
                    <span>% Exigida (20%) = {{ $nutrientesPorFaixa[4] }} </span><br>
                    <span>% Atingida = {{ $qtd }}</span>
                </td>
            </tr>
            <tr>
                <td>Carboidrato</td>
                <td>{{$nutrientes[6]}}</td>
                <td>g</td>
                <td>
                    <?php $qtd = ($nutrientes[6] * 100) / ($nutrientesPorFaixa[6] * 5);
                    $progressColor = $qtd < 20 ? 'progress-bar-danger' : 'progress-bar-success';
                    ?>
                    <div class="progress ">
                        <div class="progress-bar {{ $progressColor }}"
                             data-transitiongoal="{{ $qtd }}"></div>
                    </div>
                    <span>
                                                Mínimo Diário (100%) = {{ $nutrientesPorFaixa[6] * 5}}
                                            </span><br>
                    <span>% Exigida (20%) = {{ $nutrientesPorFaixa[6] }} </span><br>
                    <span>% Atingida = {{ $qtd }}</span>
                </td>
            </tr>
            <tr>
                <td>Fibra</td>
                <td>{{$nutrientes[7]}}</td>
                <td>g</td>
                <td>
                    @if($nutrientesPorFaixa[7] == 0)
                        <p>NA</p>
                    @else
                        <?php $qtd = ($nutrientes[7] * 100) / ($nutrientesPorFaixa[7] * 5);
                        $progressColor = $qtd < 20 ? 'progress-bar-danger' : 'progress-bar-success';
                        ?>
                        <div class="progress ">
                            <div class="progress-bar {{ $progressColor }}"
                                 data-transitiongoal="{{ $qtd }}"></div>
                        </div>
                        <span>
                                                Mínimo Diário (100%) = {{ $nutrientesPorFaixa[7] * 5}}
                                            </span><br>
                        <span>% Exigida (20%) = {{ $nutrientesPorFaixa[7] }} </span><br>
                        <span>% Atingida = {{ $qtd }}</span>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    @endforeach
@endsection

@section('scripts')
@endsection