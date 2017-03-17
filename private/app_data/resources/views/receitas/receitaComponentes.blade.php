@extends('layouts.app')

@section('content')
<div class="clearfix"></div>

<div class="title_left">
    <h3>Receitas</h3>
</div>

<div class="col-md-8 col-sm-8 col-xs-8">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-bars"></i> A Receita <small>Informações da receita</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <div class="col-xs-3">
                <!-- required for floating -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-left">
                    <li class="active"><a href="#preparo" data-toggle="tab">Preparo</a>
                    </li>
                    <li><a href="#composicao" data-toggle="tab">Composição</a>
                    </li>
                    <li><a href="#outros" data-toggle="tab">Outros</a>
                    </li>
                </ul>
            </div>

            <div class="col-xs-9">
                <!-- Tab panes -->
                <div class="tab-content">

                    <div class="tab-pane active col-md-12 col-sm-12 col-xs-12" id="preparo">
                        <p class="lead">{{ $receita->nomeReceita }}</p>
                        <p>{{ $receita->preparoReceita }}</p>
                    </div>

                    <div class="tab-pane" id="composicao">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="outros">Messages Tab.</div>
                </div>
            </div>

            <div class="clearfix"></div>

        </div>
    </div>
</div>

@if(File::exists("img/Receitas/{$receita->idReceita}.png"))
        <!-- Imagem do Alimento -->
<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Alimento
            </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content2">
            <img src="{{ asset("img/Receitas/{$receita->idReceita}.png") }}" class="img-rounded"
                 alt="Cinque Terre" style="width:100%; height:100%;">
        </div>
    </div>
</div>
@endif

@endsection