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
                <a><i class="fa fa-spoon"></i>Refeição <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Criar Refeição</a></li>
                    @if(Auth::check())
                        <li><a href="#">Criar Receita</a></li>
                    @endif
                </ul>
            </li>
        </ul>

    </div>
</div>