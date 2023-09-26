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
                                <h1 class="card-title">Liste des classes</h1>
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
                                            <th class="text-center">CODE</th>
                                            <th class="text-center">INTITULE</th>
                                            <th class="text-center">CYCLE</th>
                                            <th class="text-center">SPECIALITE</th>
                                             <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($classes as $key=>$classe)
                                            <tr >
                                            <td class="text-center">{{$key + 1}}</td>
                                            <td class="text-center">{{$classe->code}}</td>
                                            <td class="text-center">{{$classe->intitule}}</td>
                                            <td class="text-center">{{$classe->cycle}}</td>
                                            <td class="text-center">{{$classe->specialite->intitule}}</td>
                                            
                                            <td class="text-center">
                                                <a href="{{url('scolarite/classe/modifier/'.$classe->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{url('scolarite/classe/supprimer/'.$classe->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
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
