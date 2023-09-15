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
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Nouvel utilisateur</h3>
            </div>


            <form action="{{url('admin/utilisateur/creer')}}" method="post">
                  {{@csrf_field()}}
                <div class="card-body">
                   <div class="row">
                         <div class="form-group col-sm-6">
                            <label >Nom : </label>
                            <input type="text" class="form-control" name="nom" placeholder="votre nom" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Prenom : </label>
                            <input type="text" class="form-control"  name = "prenom" placeholder="votre prenom" required>
                        </div>
                   </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label >Téléphone : </label>
                            <input type="text" class="form-control" name="login"  placeholder="votre téléphone" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Adresse email : </label>
                            <input type="email" class="form-control" name="password"  placeholder="votre adresse email" required>
                        </div>
                    </div>
                     <div class="row">
                        <div class="form-group col-sm-6">
                            <label >Login ou user : </label>
                            <input type="text" class="form-control" name="login"  placeholder="votre login" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label >Mot de passe (Password) : </label>
                            <input type="password" class="form-control" name="password"  placeholder="mot de passe" required>
                        </div>
                    </div>
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

                <div class="card-footer mx-5 mb-2">
                    <button type="submit" class="btn btn-primary col-11">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection