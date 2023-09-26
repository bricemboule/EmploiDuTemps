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
                                <h1 class="card-title">Liste des enseignants</h1>
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
                                            <th style="text-align: center">N°</th>
                                            <th style="text-align: center">Nom et Prenom</th>
                                            <th style="text-align: center">Téléphone</th>
                                            <th style="text-align: center">Téléphone 2</th>
                                            <th style="text-align: center">Grade</th>
                                            <th style="text-align: center">Email</th>
                                            <th style="text-align: center">Login</th>
                                             <th style="text-align: center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($enseignants as $key=>$enseignant)
                                            <tr >
                                            <td style="text-align: center">{{$key + 1}}</td>
                                            <td style="text-align: center">{{$enseignant->nom}} {{$enseignant->prenom}}</td>
                                            <td style="text-align: center">{{$enseignant->telephone}}</td>
                                            <td style="text-align: center">{{$enseignant->telephone2}}</td>
                                            <td style="text-align: center">{{$enseignant->grade}}</td>
                                            <td style="text-align: center">{{$enseignant->email}} </td>
                                            <td style="text-align: center">{{$enseignant->login}}</td>
                                            
                                            <td style="text-align: center">
                                                <a href="{{url('admin/enseignant/modifier/'.$enseignant->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{url('admin/enseignant/supprimer/'.$enseignant->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                                <a href="{{url('admin/enseignant/'.$enseignant->id.'/cours/')}}" class="btn btn-success">Cours</a>
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
