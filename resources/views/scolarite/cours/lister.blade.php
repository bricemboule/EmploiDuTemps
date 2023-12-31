@extends('layouts.app')

@section('container')
     <div class="content-wrapper p-2" style="min-height: 339.816px;">
        <div className="content">
            <div className="container-fluid"> 
                <br/>   
                <br/>  
                <div style="margin-bottom: 10px;" class="d-flex flex-row justify-content">
                    <div >
                            <button type="button" class="btn btn-primary" > <i class="fa-solid fa-plus"></i> Ajouter un cours </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title">Liste des cours</h1>
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
                                           
                                            <th class="text-center">Intitule</th>
                                            <th class="text-center">Semestre</th>
                                            <th class="text-center">Classe</th>
                                            <th class="text-center">Volume Total</th>
                                            <th class="text-center">Volume Effectué</th>
                                            <th class="text-center">Volume Restant</th>
                                             <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($cours as $key=>$cour)
                                            <tr >
                                                <td class="text-center">{{$key + 1}}</td>
                                                
                                                <td class="text-center">{{$cour->libelle}}</td>
                                                <td class="text-center">{{$cour->semestre}}</td>
                                                <td class="text-center">
                                                    @foreach ($cour->classes as $cl )
                                                        {{$cl->code}} 
                                                    @endforeach
                                                </td>
                                                <td class="text-center">{{$cour->volumeHoraire}} </td>
                                                <td class="text-center">{{$cour->effectue}}</td>
                                                <td class="text-center">{{$cour->restant}}</td>
                                                <td class="text-center">
                                                    <a href="{{url('scolarite/cours/modifier/'.$cour->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{url('scolarite/cours/supprimer/'.$cour->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
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
