<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">

        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-apple"></i> Alimentos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('alimentos') }}">Ver Alimentos</a></li>
                    @if(Auth::check())
                        <li><a href="{{ route('alimentos.create') }}">Adicionar Alimento</a></li>
                    @endif
                </ul>
            </li>

            <li>
                <a><i class="fa fa-cutlery"></i>Receitas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('receitas') }}">Ver Receitas</a></li>
                    @if(Auth::check())
                        <li><a href="{{ route('receitas.create') }}">Criar Receita</a></li>
                    @endif
                </ul>
            </li>

            <li>
                <a><i class="fa fa-spoon"></i>Cardápio e Refeição<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">

                    <li><a>Refeição<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('refeicao') }}">Refeições</a></li>
                            @if(Auth::check())
                                <li><a href="{{ route('refeicao.create') }}">Criar Refeição</a></li>
                            @endif
                        </ul>
                    </li>

                    <li><a>Cardápio<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="{{ route('cardapio.create') }}">Agendar Cardápio</a>
                            </li>
                            <li>
                                <a href="{{ route('cardapio') }}">Vizualisar Cardápio Semanal</a>
                            </li>
                            <li>
                                <a href="{{ route('cardapio.all') }}">Histórico de Cardápios</a>
                            </li>
                            <li>
                                <a href="#">Histórico de mudanças</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>