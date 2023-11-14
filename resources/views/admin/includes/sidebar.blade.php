<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('admin.main.index')}}" class="nav-link">
                    <i class="nav-icon fa-solid fa-house"></i>
                    <p>
                        Main
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.film.index')}}" class="nav-link">
                    <i class="nav-icon fa-solid fa-film"></i>
                    <p>
                        Films
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.actor.index')}}" class="nav-link">
                    <i class="nav-icon fa-solid fa-person"></i>
                    <p>
                        Actors
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.genre.index')}}" class="nav-link">
                    <i class="nav-icon fa-solid fa-filter"></i>
                    <p>
                        Genres
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.rejisor.index')}}" class="nav-link">
                    <i class="nav-icon fa-solid fa-circle-user"></i>
                    <p>
                        Rejisors
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link">
                    <i class="nav-icon fa-solid fa-users"></i>
                    <p>
                        Users
                    </p>
                </a>
            </li>

        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
