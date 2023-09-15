 <aside class="control-sidebar control-sidebar-dark">

            <div class="card card-primary bg-dark card-outline">
                <div class="card-body box-profile">
                <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{asset('images/brice.jpg')}}" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{Auth::user()->nom}} {{Auth::user()->prenom}}</h3>
                <p class="text-muted text-center">{{Auth::user()->role->intitule}}</p>
                 <ul className="list-group bg-dark mb-3">
                        <li className="list-group-item d-flex">
                           
                            <a href="" className="align-items-center p-1 text-decoration-none">
                            <i class="fa-solid fa-lock"></i>
                                <p> Mot de passe</p>
                            </a>
                        </li>
                        <li className="list-group-item d-flex">
                             <i className="fa fa-user p-2">
                            </i>
                            <a href="" className=" align-items-center p-1 text-decoration-none">
                                       
                                <p> Mon profil</p>
                                       
                            </a>
                        </li>
                                
                    </ul>
                <a href="#" class="btn btn-primary btn-block"><b>Se Deconnecter</b></a>
            </div>

      
        </aside>