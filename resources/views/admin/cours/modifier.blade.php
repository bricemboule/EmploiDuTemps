@extends('layouts.app')

@section('container')
    <div class="content-wrapper p-2" style="min-height: 339.816px;">

        <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                            <h1 class="m-0">Modification d'un cours</h1>
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
                            <label >Code : </label>
                            <input type="text" class="form-control" value="{{$cour->code}}"  name = "code" placeholder="votre prenom" required>
                        </div>
                         <div class="form-group col-sm-6">
                            <label >Intitule : </label>
                            <input type="text" class="form-control" value="{{$cour->libelle}}" name="intitule" placeholder="votre nom" required>
                        </div>
                   </div>
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label>Semestre : </label>
                                <select class="form-control" name="semestre">
                                    <option value="{{$cour->code}}">{{$cour->semestre}}</option>
                                    <option value="SEMESTRE 1">SEMESTRE 1</option>
                                    <option value="SEMESTRE 2">SEMESTRE 2</option> 
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Volume total : </label>
                            <input type="number" class="form-control" value="{{$cour->volumeHoraire}}" name="volume" placeholder="votre nom" required>
                        </div>
                    </div>
                  

                </div>

                <div class="card-footer mx-5 mb-2">
                    <button type="submit" class="btn btn-primary col-11">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection