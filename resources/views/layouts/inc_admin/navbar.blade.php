<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
    </ul>
    
                        <ul class="navbar-nav ml-auto">
    
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                {{ Auth::user()->user_type }} <i class="fas fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="http://localhost:8000/admin/akun" class="dropdown-item">
                                <i class="fas fa-user mr-2"></i> My Akun
                            </a>
                            <div class="dropdown-divider"></div>
                                <a href=""
                                 onclick="event.preventDefault();document.getElementById('logout-form').submit();" 
                                 class="dropdown-item">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                            <form action="http://localhost:8000/admin/logout" id="logout-form" method="post">
                                <input type="hidden" name="_token" value="OhEsjX29bGKpTiNYfTxVCSBwg9GtF8jIH900pKV">
                            </form>
                            </div>
                        </li>
                        </ul>
                    </nav>
</nav>