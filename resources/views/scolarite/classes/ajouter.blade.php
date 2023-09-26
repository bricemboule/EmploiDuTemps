@extends('layouts.app')

@section('container')
    <div class="content-wrapper p-2" style="min-height: 339.816px;">

        <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                            <h1 class="m-0">Création d'une classe</h1>
                            </div>

                        </div>
                    </div>
        </div>
        <div class="card card-success">

            <form action="{{url('scolarite/classe/creer')}}" method="post">
                  {{@csrf_field()}}
                <div class="card-body">
                   <div class="row">
                        <div class="form-group col-sm-6">
                            <label >Code : </label>
                            <select class="form-control" name="code">
                                    <option value=""></option>
                                    <option value="L1">L1</option>
                                    <option value="L2">L2</option> 
                                    <option value="L3">L3</option>
                                    <option value="M1 ACT">M1 ACT</option> 
                                    <option value="M1 INF">M1 INF</option>
                                    <option value="M1 SBD">M1 SBD</option>
                                    <option value="M2 ACT">M2 ACT</option> 
                                    <option value="M2 INF">M2 INF</option>
                                    <option value="M2 SBD">M2 SBD</option>
                            </select>
                        </div>
                         <div class="form-group col-sm-6">
                            <label >Intitule : </label>
                            <select class="form-control" name="intitule">
                                    <option value=""></option>
                                    <option value="Licence 1">Licence 1</option>
                                    <option value="Licence 2">Licence 2</option> 
                                    <option value="Licence 3">Licence 3</option>
                                    <option value="Master 1 ACTUARIAT">Master 1 ACTUARIAT</option> 
                                    <option value="Master 1 INGENIERIE FINANCIERE">Master 1 INGENIERIE FINANCIERE</option>
                                    <option value="Master 1 STATISTIQUE ET BIG DATA">Master 1 STATISTIQUE ET BIG DATA</option>
                                    <option value="Master 2 ACTUARIAT">Master 2 ACTUARIAT</option> 
                                    <option value="Master 2 INGENIERIE FINANCIERE">Master 2 INGENIERIE FINANCIERE</option>
                                    <option value="Master 2 STATISTIQUE ET BIG DATA">Master 2 STATISTIQUE ET BIG DATA</option>
                            </select>
                        </div>
                   </div>
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label>Cycle : </label>
                                <select class="form-control" name="cycle">
                                    <option value=""></option>
                                    <option value="LICENCE">LICENCE</option>
                                    <option value="LICENCE">MASTER</option> 
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Specialité : </label>
                             <select class="form-control" name="specialite">
                                    <option value=""></option>
                                    @foreach ($specialites as $specialite)
                                         <option value="{{$specialite->intitule}}">{{$specialite->intitule}}</option>
                                    @endforeach
                                </select>
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