@extends('layouts.app')

@section('container')
    <div class="content-wrapper p-2" style="min-height: 339.816px;">

        <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                            <h1 class="m-0">Programmer une plage</h1>
                            </div>

                        </div>
                    </div>
        </div>
        <div class="card card-success">

            <form action="" method="post">
                  {{@csrf_field()}}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label >Cours<span style="color: red">*</span> : </label>
                            <select class="form-control" name="cours">
                                <option value="{{$lesson->cour->libelle}}">{{$lesson->cour->libelle}}</option>
                                @foreach ($cours as $cour )
                                   
                                        <option value="{{$cour->libelle}}">{{$cour->libelle}}</option>
                                   
                                @endforeach
                            </select>
                        </div>
                         <div class="form-group col-sm-6">
                            <label >Salle<span style="color: red">*</span> : </label>
                            <select class="form-control" name="salle">
                                <option value="{{$lesson->salle->nomSalle}}">{{$lesson->salle->nomSalle}}</option>
                                @foreach ($salle as $s)
                                    <option value="{{$s->nomSalle}}">{{$s->nomSalle}}</option>
                                @endforeach 
                            </select>
                        </div>
                   </div>
                   <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Jour <span style="color: red">*</span> : </label>
                            <select class="form-control" name="jour">
                                <option value="{{$lesson->jour}}">{{$lesson->jour}}</option>
                                <option value="Lundi">Lundi</option>
                                <option value="Mardi">Mardi</option> 
                                <option value="Mercredi">Mercredre</option>
                                <option value="Jeudi">Jeudi</option> 
                                <option value="Vendredi">Vendredi</option>
                                <option value="Samedi">Samedi</option>
                                <option value="Dimanche">Dimanche</option> 
                            </select>
                        
                        </div>
                    </div>
                
                </div>
                   <div class="row">
                        <div class="col-sm-6">
                
                            <div class="form-group">
                                <label>Heure Debut<span style="color: red">*</span> : </label>
                                <input type="time" class="form-control" value="{{$lesson->debut}}" name="debut" placeholder="votre nom" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Heure Fin<span style="color: red">*</span> : </label>
                            <input type="time" class="form-control" value="{{$lesson->fin}}" name="fin" placeholder="votre nom" required>
                        </div>
                   </div>

                  
                    </div>

                <div class="card-footer mx-5 mb-2">
                    <button type="submit" class="btn btn-primary col-11">Modifier</button>
                </div>
            </form>
        </div>
    </div>
@endsection

