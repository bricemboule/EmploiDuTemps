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
                                            <th style="text-align: center">CLASSE</th>
                                            <th style="text-align: center">COURS</th>
                                            <th style="text-align: center">VOLUME HORAIRE</th>
                                            <th style="text-align: center">SALLE</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($cours as $key=>$cour)
                                            <tr>
                                                <td style="text-align: center">{{$key + 1}}</td>
                                                @foreach ($cour->classes as $c)
                                                    <td style="text-align: center"> {{$c->code}}<br/></td>
                                                @endforeach
                                                <td style="text-align: center">{{$cour->libelle}}</td>
                                                <td style="text-align: center">{{$cour->volumeHoraire}}</td>
                                                <td style="text-align: center">{{$cour->volumeHoraire}}</td>
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
