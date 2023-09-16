@extends('layouts.app')

@section('container')
    <div class="content-wrapper p-2" style="min-height: 339.816px;">

        <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                            <h1 class="m-0">Modification d'une salle</h1>
                            </div>

                        </div>
                    </div>
        </div>
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Nouvelle salle</h3>
            </div>


            <form action="" method="post">
                  {{@csrf_field()}}
                <div class="card-body">
                   <div class="row">
                        <div class="form-group col-sm-6">
                            <label >Nom salle : </label>
                            <input type="text" class="form-control" value={{$salle->nomSalle}}  name = "salle" placeholder="intitulé salle" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Capacité : </label>
                            <input type="number" class="form-control" value={{$salle->capacite}} name="capacite" placeholder="la contenance" required>
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