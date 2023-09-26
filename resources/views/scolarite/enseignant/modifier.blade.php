@extends('layouts.app')

@section('container')
    <div class="content-wrapper p-2" style="min-height: 339.816px;">

        <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                            <h1 class="m-0">Modification d'un enseignant</h1>
                            </div>

                        </div>
                    </div>
        </div>
        <div class="card card-success">
            <form action="" method="post" >
                  {{@csrf_field()}}
                <div class="card-body">
                   <div class="row">
                         <div class="form-group col-sm-6">
                            <label >Nom<span style="color: red">*</span> : </label>
                            <input type="text" class="form-control" value="{{old('email', $enseignant->nom)}}" name="nom" placeholder="votre nom" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Prenom<span style="color: red">*</span> : </label>
                            <input type="text" class="form-control" value="{{old('email', $enseignant->prenom)}}" name = "prenom" placeholder="votre prenom" required>
                        </div>
                   </div>
                   <div class="row">
                    <div class="form-group col-sm-6">
                       <label >Telephone 1<span style="color: red">*</span> : </label>
                       <input type="text" class="form-control" value="{{old('email', $enseignant->telephone)}}" name="phone" placeholder="votre telephone..." required>
                   </div>
                   <div class="form-group col-sm-6">
                       <label >Telephone 2: </label>
                       <input type="text" class="form-control" value="{{old('email', $enseignant->telephone2)}}" name = "phone2" placeholder="votre telephone...">
                   </div>
              </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label >Adresse email<span style="color: red">*</span> : </label>
                            <input type="email" class="form-control" value="{{old('email', $enseignant->email)}}" name="email"  placeholder="votre adresse email" required>
                        </div>

                        <div class="form-group col-sm-6">
                            <label >Grade<span style="color: red">*</span> : </label>
                            <select class="form-control" name="grade">
                                <option value="{{old('email', $enseignant->grade)}}">{{old('email', $enseignant->grade)}}</option>
                                <option value="Professeur">Professeur</option>
                                <option value="Docteur">Docteur</option> 
                                <option value="Professionnel">Professionnel</option> 
                            </select>
                        </div>
                        
                    </div>
                   
                  
                  
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label >Votre login<span style="color: red">*</span> : </label>
                            <input type="text" class="form-control"value="{{old('email', $enseignant->login)}}" name="login"  placeholder="votre login" required>
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