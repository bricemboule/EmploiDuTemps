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
          


            <form action="" method="post" enctype="multipart/form-data">
                  {{@csrf_field()}}
                <div class="card-body">
                   <div class="row">
                         <div class="form-group col-sm-6">
                            <label >Nom<span style="color: red">*</span> : </label>
                            <input type="text" class="form-control" name="nom" value="{{old('email', $etudiant->nom)}}" placeholder="votre nom" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Prenom<span style="color: red">*</span> : </label>
                            <input type="text" class="form-control" value="{{old('email', $etudiant->prenom)}}"  name = "prenom" placeholder="votre prenom" required>
                        </div>
                   </div>
                   <div class="row">
                    <div class="form-group col-sm-6">
                       <label >Date de naissance<span style="color: red">*</span> : </label>
                       <input type="date" class="form-control" value="{{old('email', $etudiant->date)}}" name="date" required>
                   </div>
                   <div class="form-group col-sm-6">
                       <label >Lieu de naissance<span style="color: red">*</span>: </label>
                       <input type="text" class="form-control" value="{{old('email', $etudiant->lieu)}}"  name = "lieu" placeholder="lieu de naissance" required>
                   </div>
              </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label >Téléphone<span style="color: red">*</span> : </label>
                            <input type="text" class="form-control" value="{{old('email', $etudiant->telephone)}}" name="phone"  placeholder="votre téléphone" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Adresse email<span style="color: red">*</span> : </label>
                            <input type="email" class="form-control" name="email" value="{{old('email', $etudiant->email)}}" placeholder="votre adresse email" required>
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
                            <input type="text" class="form-control" name="login" value="{{old('email', $etudiant->login)}}"  placeholder="votre login" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Mot de passe<span style="color: red">*</span> : </label>
                            <input type="password" class="form-control" name="password"  placeholder="mot de passe">
                            <p>Voulez-vous modifier le mot de passe ?</p>
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