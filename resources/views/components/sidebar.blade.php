<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="Logo Progestão">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Painel</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Administrador</span>
        </li>
        @canany(['states_view'])
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-edit"></i>
                <div data-i18n="Cadastros">Cadastros</div>
            </a>
            <ul class="menu-sub">
                @can('states_view')
                <li class="menu-item">
                    <a href="{{ route('states.index') }}" class="menu-link">
                        <div>Estados</div>
                    </a>
                </li>
                @endcan
                @can('cities_view')
                <li class="menu-item">
                    <a href="{{ route('cities.index') }}" class="menu-link">
                        <div>Cidades</div>
                    </a>
                </li>
                @endcan
                @can('states_view')
                <li class="menu-item">
                    <a href="{{ route('mandates.index') }}" class="menu-link">
                        <div>Mandatos</div>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcanany
        @canany(['roles_view', 'users_view'])
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Gerenciamento">Gerenciamento</div>
            </a>
            <ul class="menu-sub">
                @can('roles_view')
                <li class="menu-item">
                    <a href="{{ route('roles.index') }}" class="menu-link">
                        <div>Atribuições</div>
                    </a>
                </li>
                @endcan
                @can('users_view')
                <li class="menu-item">
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <div>Usuários</div>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcanany
    </ul>
</aside>
