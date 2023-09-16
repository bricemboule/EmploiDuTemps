@extends('layouts.app')

@section('container')
    <div class="content-wrapper p-2" style="min-height: 339.816px;">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Modification d'un utilisateur</h1>
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
                            <label >Nom : </label>
                            <input type="text" class="form-control" value="{{old('email', $user->nom)}}" name="nom" placeholder="votre nom" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Prenom : </label>
                            <input type="text" class="form-control" value="{{old('email',$user->prenom)}}" name = "prenom" placeholder="votre prenom" required>
                        </div>
                   </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label >Téléphone : </label>
                            <input type="text" class="form-control" value="{{old('email',$user->telephone)}}" name="phone"  placeholder="votre téléphone" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Adresse email : </label>
                            <input type="email" class="form-control" value="{{old('email',$user->email)}}" name="email"  placeholder="votre adresse email" required>
                        </div>
                    </div>
                     <div class="row">
                        <div class="form-group col-sm-6">
                            <label >Login ou user : </label>
                            <input type="text" class="form-control" value="{{old('email', $user->login)}}" name="login"  placeholder="votre login" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Mot de passe (Password) : </label>
                            <input type="password" class="form-control" name="password"  placeholder="mot de passe" >
                            <p>Voulez-vous modifier le mot de passe ?</p>
                        </div>
                    </div>
                   <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label>Role : </label>
                                <select class="form-control"  name="role" required>
                                    <option value="{{$user->role->intitule}}">{{old('email', $user->role->intitule)}}</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->intitule}}">{{$role->intitule}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                 <label for="exampleInputFile">Votre photo : </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="photo" value="{{old('email',$user->photo)}}">
                                        <label class="custom-file-label" >Veuillez choisir une photo de vous</label>
                                    </div>
                            
                                </div>
                            </div>
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