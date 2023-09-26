@extends('layouts.app')

@section('container')
     <div class="content-wrapper p-2" style="min-height: 339.816px;">
        <div className="content">
            <div className="container-fluid"> 
                <br/>   
                <br/>  
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title">Liste des étudiant</h1>
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
            
                                            <th></th>
                                            <th>Matricule</th>
                                            <th>Nom et Prenom</th>
                                            <th>Date naissance</th>
                                            <th>Lieu naissance</th>
                                            <th>Téléphone</th>
                                            <th>Email</th>
                                            <th>Classe</th>
                                             <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($etudiants as $key=>$etudiant)
                                            <tr >
                                          
                                            <td><img src="{{asset('/images/'.$etudiant->photo)}}" width="50px" height="35px" /></td>
                                            <td>{{$etudiant->matricule}}</td>
                                            <td>{{$etudiant->nom}} {{$etudiant->prenom}}</td>
                                            <td>{{$etudiant->date}}</td>
                                            <td>{{$etudiant->lieu}}</td>
                                            <td>{{$etudiant->telephone}}</td>
                                            <td>{{$etudiant->email}} </td>
                                            <td>{{$etudiant->classe->code}}</td>
                                            <td>
                                                <a href="{{url('admin/etudiant/modifier/'.$etudiant->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{url('admin/etudiant/supprimer/'.$etudiant->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
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
