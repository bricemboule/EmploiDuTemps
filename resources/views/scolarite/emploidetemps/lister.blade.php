@extends('layouts.app')

@section('container')
     <div class="content-wrapper p-2" style="min-height: 339.816px;">
        <div className="content">
            <div className="container-fluid"> 
                <br/>   
                <br/>  
                <div style="margin-bottom: 10px;" class="d-flex flex-row justify-content">
                    <div class="">
                            <button type="button" class="btn btn-primary"> <a href="{{url('scolarite/emploiDuTemps/ajouter')}}" class="text-white"><i class="fa-solid fa-plus"></i> Nouvelle leçon</a> </button>
                    </div>
                    <div class="ml-3">
                        <button type="button" class="btn btn-info"> <a href="{{url('scolarite/emploiDuTemps/L1/calendrier')}}" class="text-white"> <i class="fa-regular fa-calendar-days"></i> Calendrier</a> </button>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title">Liste des programmations Licence 1</h1>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">N°</th>
                                            <th class="text-center">ENSEIGNANT</th>
                                            <th class="text-center">COURS</th>
                                            <th class="text-center">SALLE</th>
                                            <th class="text-center">JOUR</th>
                                            <th class="text-center">DEBUT</th>
                                            <th class="text-center">FIN</th>
                                            
                                             <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                          @foreach ($lessons as $key=>$l)
                                          <tr >
                                            <td class="text-center">{{$key + 1}}</td>
                                            <td class="text-center">{{$l->user->nom}} {{$l->user->prenom}}</td>
                                            <td class="text-center">{{$l->cour->libelle}}</td>
                                            <td class="text-center">{{$l->salle->nomSalle}}</td>
                                            <td class="text-center">{{$l->jour}}</td>
                                            <td class="text-center">{{$l->debut}}</td>
                                            <td class="text-center">{{$l->fin}}</td>
                                            <td class="text-center">
                                                <a href="{{url('scolarite/timetable/L1/modifier/'.$l->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{url('scolarite/timetable/supprimer/'.$l->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                            </td>
                                        </tr>
                                          @endforeach
                                    

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
                                
            </div>
        </div>
    </div> 
@endsection