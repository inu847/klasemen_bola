<div id="aside" class="app-aside box-shadow-z3 modal fade lg nav-expand">
    <div class="left navside white dk" layout="column">
        <div class="navbar navbar-md info no-radius box-shadow-z4">
            <!-- brand -->
            <a class="navbar-brand">
                <div ui-include="'../assets/images/logo.white.svg'"></div>
                <img src="../assets/images/logo.png" alt="." class="hide">
                <span class="hidden-folded inline">Klasemen Bola</span>
            </a>
            <!-- / brand -->
        </div>
        <div flex class="hide-scroll">
            <nav class="scroll">
                <div ui-include="'../views/blocks/aside.top.4.html'"></div>

                <ul class="nav" ui-nav>
                    <li class="nav-header hidden-folded">
                        <small class="text-muted">Main</small>
                    </li>

                    <li>
                        <a href="{{ route('dashboard') }}">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe3fc;
                                    <span ui-include="{{ asset('assets/images/i_0.svg')}}"></span>
                                </i>
                            </span>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a>
                            <span class="nav-caret">
                                <i class="fa fa-caret-down"></i>
                            </span>
                            <span class="nav-label">
                                <b class="label rounded label-sm primary">2</b>
                            </span>
                            <span class="nav-icon">
                                <i class="material-icons">&#xe5c3;
                                    <span ui-include="{{ asset('assets/images/i_1.svg')}}"></span>
                                </i>
                            </span>
                            <span class="nav-text">Klub</span>
                        </a>
                        <ul class="nav-sub">
                            <li>
                                <a href="{{ route('klub.index') }}">
                                    <span class="nav-text">List Klub</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('klub.create') }}">
                                    <span class="nav-text">Buat Klub</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a>
                            <span class="nav-caret">
                                <i class="fa fa-caret-down"></i>
                            </span>
                            <span class="nav-label">
                                <b class="label rounded label-sm primary">2</b>
                            </span>
                            <span class="nav-icon">
                                <i class="material-icons">&#xe5c3;
                                    <span ui-include="{{ asset('assets/images/i_1.svg')}}"></span>
                                </i>
                            </span>
                            <span class="nav-text">Skor Pertandingan</span>
                        </a>
                        <ul class="nav-sub">
                            <li>
                                <a href="{{ route('skor.index') }}">
                                    <span class="nav-text">List Skor</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('skor.create') }}">
                                    <span class="nav-text">Buat Skor Pertandingan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('skor.create_multiple') }}">
                                    <span class="nav-text">Buat Skor Pertandingan Multiple</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="hidden-folded">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe5c3;
                                    <span ui-include="{{ asset('assets/images/i_1.svg')}}"></span>
                                </i>
                            </span>
                            <span class="nav-text">Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
        <div flex-no-shrink>
            <div ui-include="'../views/blocks/aside.bottom.1.html'"></div>
        </div>
    </div>
</div>