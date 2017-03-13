<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-apple"></i> Alimentos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('alimentos') }}">Lista</a></li>
                    <li><a href="{{ route('alimentos.create') }}">Criar Alimento</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-cutlery"></i>Receitas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('receitas') }}">Ver Receitas</a></li>
                    <li><a href="#">Criar Receita</a></li>
                </ul>
            </li>
        </ul>
    </div>

</div>