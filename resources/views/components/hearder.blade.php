 <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-user"></i>
                    </a>
                </li>
            </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="index3.html" class="brand-link">
            <span class="brand-text font-weight-light">ESSFAR</span>
        </a>

        <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('images/brice.jpg')}}" class="img-circle img-size-100" alt="User Image">
                    </div>
                    <div class="info">
                       <h3 class="profile-username text-center text-white">{{Auth::user()->nom}}</h3>
                       <h3 class="profile-username text-center text-white">{{Auth::user()->role->intitule}}</h3>
                    </div>
                </div>

                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

               <x-menu />

        </div>

    </aside>