@extends('layouts.app')

@section('container')
    <div class="content-wrapper" style="min-height: 339.816px;">
        <br>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    
                    <div class="col-sm-6">
                    <h1 class="m-0">Programmation des cours </h1>
                    </div>

                </div>
            </div>
        </div>
        <br>
        
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-4 col-6">

                        <div class="small-box bg-primary">
                            <div class="inner text-center">
                                <a href="{{url('scolarite/emploiDuTemps/ajouter')}}" class="text-white">
                                    <p>
                                        <h4> L1</h4>
                                    </p>
                                </a>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{url('scolarite/emploiDuTemps/L1')}}" class="small-box-footer"> Lister <i class="fas fa-arrow-circle-right"></i></a>
                            <a href="{{url('scolarite/emploiDuTemps/afficher')}}" class="small-box-footer"> Calendrier <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">

                        <div class="small-box bg-primary">
                            <div class="inner text-center">
                                <a href="{{url('scolarite/emploiDuTemps/ajouter')}}" class="text-white">
                                    <p>
                                        <h4> L2</h4>
                                    </p>
                                </a>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{url('scolarite/emploiDuTemps/L1')}}" class="small-box-footer"> Lister <i class="fas fa-arrow-circle-right"></i></a>
                            <a href="{{url('scolarite/emploiDuTemps/afficher')}}" class="small-box-footer"> Calendrier <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">

                        <div class="small-box bg-primary">
                            <div class="inner text-center">
                                <a href="{{url('scolarite/emploiDeTemps/ajouter')}}" class="text-white">
                                    <p>
                                        <h4> L3</h4>
                                    </p>
                                </a>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{url('scolarite/emploiDuTemps/L1')}}" class="small-box-footer"> Lister <i class="fas fa-arrow-circle-right"></i></a>
                            <a href="{{url('scolarite/emploiDuTemps/afficher')}}" class="small-box-footer"> Calendrier <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    
                    <div class="col-lg-4 col-6">

                        <div class="small-box bg-primary">
                            <div class="inner text-center">
                                <a href="{{url('scolarite/timetable/ajouter')}}" class="text-white">
                                    <p>
                                        <h4> M1 ACT</h4>
                                    </p>
                                </a>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{url('scolarite/emploiDuTemps/L1')}}" class="small-box-footer"> Lister <i class="fas fa-arrow-circle-right"></i></a>
                            <a href="{{url('scolarite/emploiDuTemps/afficher')}}" class="small-box-footer"> Calendrier <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">

                        <div class="small-box bg-primary">
                            <div class="inner text-center">
                                <a href="{{url('scolarite/timetable/ajouter')}}" class="text-white">
                                    <p>
                                        <h4> M1 INF</h4>
                                    </p>
                                </a>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{url('scolarite/emploiDuTemps/L1')}}" class="small-box-footer"> Lister <i class="fas fa-arrow-circle-right"></i></a>
                            <a href="{{url('scolarite/emploiDuTemps/afficher')}}" class="small-box-footer"> Calendrier <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">

                        <div class="small-box bg-primary">
                            <div class="inner text-center">
                                <a href="{{url('scolarite/timetable/ajouter')}}" class="text-white">
                                    <p>
                                        <h4> M1 SBD</h4>
                                    </p>
                                </a>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{url('scolarite/emploiDuTemps/L1')}}" class="small-box-footer"> Lister <i class="fas fa-arrow-circle-right"></i></a>
                            <a href="{{url('scolarite/emploiDuTemps/afficher')}}" class="small-box-footer"> Calendrier <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    
                    <div class="col-lg-4 col-6">

                        <div class="small-box bg-primary">
                            <div class="inner text-center">
                                <a href="{{url('scolarite/timetable/ajouter')}}" class="text-white">
                                    <p>
                                        <h4> M2 ACT</h4>
                                    </p>
                                </a>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{url('scolarite/emploiDuTemps/L1')}}" class="small-box-footer"> Lister <i class="fas fa-arrow-circle-right"></i></a>
                            <a href="{{url('scolarite/emploiDuTemps/afficher')}}" class="small-box-footer"> Calendrier <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">

                        <div class="small-box bg-primary">
                            <div class="inner text-center">
                                <a href="{{url('scolarite/timetable/ajouter')}}" class="text-white">
                                    <p>
                                        <h4> M2 INF</h4>
                                    </p>
                                </a>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{url('scolarite/emploiDuTemps/L1')}}" class="small-box-footer"> Lister <i class="fas fa-arrow-circle-right"></i></a>
                            <a href="{{url('scolarite/emploiDuTemps/afficher')}}" class="small-box-footer"> Calendrier <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">

                        <div class="small-box bg-primary">
                            <div class="inner text-center">
                                <a href="{{url('scolarite/timetable/ajouter')}}" class="text-white">
                                    <p>
                                        <h4> M2 SBD</h4>
                                    </p>
                                </a>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{url('scolarite/emploiDuTemps/L1')}}" class="small-box-footer"> Lister <i class="fas fa-arrow-circle-right"></i></a>
                            <a href="{{url('scolarite/emploiDuTemps/L1')}}" class="small-box-footer"> Calendrier <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                </div>

            
            </diV>


        </section>
    </div>
@endsection