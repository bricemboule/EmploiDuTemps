@extends('layouts.app')

@section('container')
    <div class="content-wrapper p-2" style="min-height: 339.816px;">

        <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                            <h1 class="m-0">Création d'un étudiant</h1>
                            </div>

                        </div>
                    </div>
        </div>
        <div class="card card-success">
          


            <form action="{{url('admin/etudiant/creer')}}" method="post" enctype="multipart/form-data">
                  {{@csrf_field()}}
                <div class="card-body">
                   <div class="row">
                         <div class="form-group col-sm-6">
                            <label >Nom<span style="color: red">*</span> : </label>
                            <input type="text" class="form-control" name="nom" placeholder="votre nom" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Prenom<span style="color: red">*</span> : </label>
                            <input type="text" class="form-control"  name = "prenom" placeholder="votre prenom" required>
                        </div>
                   </div>
                   <div class="row">
                    <div class="form-group col-sm-6">
                       <label >Date de naissance<span style="color: red">*</span> : </label>
                       <input type="date" class="form-control" name="date" required>
                   </div>
                   <div class="form-group col-sm-6">
                       <label >Lieu de naissance<span style="color: red">*</span>: </label>
                       <input type="text" class="form-control"  name = "lieu" placeholder="lieu de naissance" required>
                   </div>
              </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label >Téléphone<span style="color: red">*</span> : </label>
                            <input type="text" class="form-control" name="phone"  placeholder="votre téléphone" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Adresse email<span style="color: red">*</span> : </label>
                            <input type="email" class="form-control" name="email"  placeholder="votre adresse email" required>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label>Classe<span style="color: red">*</span> : </label>
                                <select class="form-control" name="classe">
                                    <option value=""></option>
                                    @foreach ($classes as $classe)
                                       
                                        <option value="{{$classe->intitule}}">{{$classe->intitule}}</option>
                                      
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                 <label for="exampleInputFile">Votre photo : </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="photo" >
                                        <label class="custom-file-label" >Veuillez choisir une photo de vous</label>
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label >Votre login<span style="color: red">*</span> : </label>
                            <input type="text" class="form-control" name="login"  placeholder="votre login" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Mot de passe<span style="color: red">*</span> : </label>
                            <input type="password" class="form-control" name="password"  placeholder="mot de passe" required>
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