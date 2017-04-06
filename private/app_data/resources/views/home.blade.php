@extends('layouts.app')

@section('content')

    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total de Usuários</span>
            <div class="count">35</div>
            <span class="count_bottom"><i class="green">4% </i> Desde o mês passado</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-home"></i> Total de Escolas</span>
            <div class="count">120</div>
            <span class="count_bottom"><i class="green">3% </i> Desde o mês passado</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-apple"></i> Total de Alimentos Cadastrados</span>
            <div class="count">31</div>
            <span class="count_bottom"><i class="green">12% </i> Desde o mês passado</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-cutlery"></i> Total de Receitas Cadastradas</span>
            <div class="count">79</div>
            <span class="count_bottom"><i class="green">9% </i> Desde o mês passado</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-spoon"></i> Total de Cardápios Ativos</span>
            <div class="count">55</div>
            <span class="count_bottom"><i class="green">4% </i> Desde semana passada</span>
        </div>
    </div>

@endsection