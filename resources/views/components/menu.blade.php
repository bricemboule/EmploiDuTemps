 <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item menu-open">
            <a href="{{url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>

        </li>

        <li class="nav-item @if(Request::segment(2) == 'utilisateur') menu-open @endif ">
            <a href="{{url('admin/user')}}" class="nav-link @if(Request::segment(2) == 'utilisateur') active @endif">
                <i class="fa-solid fa-user-plus"></i>
                <p>
                    Utilisateurs
                </p>
            </a>
            <ul class="nav nav-treeview ml-3 mr-2">
                <li class="nav-item">
                     <a href="{{url('admin/utilisateur/ajouter')}}" class="nav-link @if(Request::segment(3) == 'ajouter') active @endif">
                       <i class="fa-solid fa-floppy-disk"></i>
                        <p>Ajouter</p>
                    </a>
                </li>
                <li class="nav-item">
                     <a href="{{url('admin/utilisateur/lister')}}" class="nav-link @if(Request::segment(3) == 'lister') active @endif">
                        <i class="fa-solid fa-list-ol"></i>
                        <p>Lister</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item @if(Request::segment(2) == 'salle') menu-open @endif" >
            <a href="{{url('admin/classe')}}" class="nav-link @if(Request::segment(2) == 'salle') active @endif">
                <i class="fa-solid fa-home"></i>
                <p>
                    Salles
                </p>
            </a>
            <ul class="nav nav-treeview ml-3 mr-2">
                <li class="nav-item">
                     <a href="{{url('admin/salle/ajouter')}}" class="nav-link @if(Request::segment(3) == 'ajouter') active @endif">
                       <i class="fa-solid fa-floppy-disk"></i>
                        <p>Ajouter</p>
                    </a>
                </li>
                <li class="nav-item">
                     <a href="{{url('admin/salle/lister')}}" class="nav-link @if(Request::segment(3) == 'lister') active @endif">
                        <i class="fa-solid fa-list-ol"></i>
                        <p>Lister</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item @if(Request::segment(2) == 'classe') menu-open @endif">
            <a href="{{url('admin/classe')}}" class="nav-link @if(Request::segment(2) == 'classe') active @endif">
                <i class="fa-solid fa-pen-to-square"></i>
                <p>
                    Classes
                </p>
            </a>
            <ul class="nav nav-treeview ml-3 mr-2">
                <li class="nav-item">
                     <a href="{{url('admin/classe/ajouter')}}" class="nav-link @if(Request::segment(3) == 'ajouter') active @endif">
                       <i class="fa-solid fa-floppy-disk"></i>
                        <p>Ajouter</p>
                    </a>
                </li>
                <li class="nav-item">
                     <a href="{{url('admin/classe/lister')}}" class="nav-link @if(Request::segment(3) == 'lister') active @endif">
                        <i class="fa-solid fa-list-ol"></i>
                        <p>Lister</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{url('admin/cours')}}" class="nav-link @if(Request::segment(2) == 'cours') active @endif">
                <i class="fa-solid fa-pen-to-square"></i>
                    <p>
                        Cours
                    </p>
            </a>
            <ul class="nav nav-treeview ml-3 mr-2">
                <li class="nav-item">
                     <a href="{{url('admin/cours/ajouter')}}" class="nav-link @if(Request::segment(3) == 'ajouter') active @endif">
                       <i class="fa-solid fa-floppy-disk"></i>
                        <p>Ajouter</p>
                    </a>
                </li>
                <li class="nav-item">
                     <a href="{{url('admin/cours/lister')}}" class="nav-link @if(Request::segment(3) == 'lister') active @endif">
                        <i class="fa-solid fa-list-ol"></i>
                        <p>Lister</p>
                    </a>
                </li>
            </ul>
        </li>
         
        <li class="nav-item">
            <a href="{{url('admin/enseignant')}}" class="nav-link @if(Request::segment(2) == 'enseignant') active @endif">
                <i class="fa-solid fa-chalkboard-user"></i>
                <p>
                    Enseignants
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('admin/etudiant')}}" class="nav-link @if(Request::segment(2) == 'etudiant') active @endif">
                <i class="fa-solid fa-graduation-cap"></i>
                <p>
                    Etudiants
                </p>
            </a>
        </li>
        
        <li class="nav-item">
                            <a href="{{url('admin/parent')}}" class="nav-link @if(Request::segment(2) == 'parent') active @endif">
                                <i class="fa-solid fa-user-tie"></i>
                                <p>
                                    Parents
                                </p>
                            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('logout')}}" class="nav-link">
                <i class="fa-solid fa-right-from-bracket"></i>
                <p>
                    Se déconnecter
                </p>
            </a>
        </li>
    </ul>
</nav>