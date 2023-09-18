
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ESSFAR TIMETABLE</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>
<body class="hold-transition login-page">
    <div class="login-box w-50 h-75">

        <div class="card card-outline card-primary h-100">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>ESSFAR</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Connectez-vous à votre compte</p>
                @include('message')
                <form action="{{url('login')}}" method="post">
                    {{@csrf_field()}}
                    <div class="input-group py-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <input type="texte" class="form-control" required name="login" placeholder="login">
                        
                    </div>
                    <div class="input-group py-3">

                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input type="password" class="form-control" require name="password" placeholder="Password">
                        
                    </div>
                    <div class="row mt-3">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                Se Souvenir de moi
                                </label>
                            </div>
                        </div>

                       
                        <div class="text-center py-3 w-100">
                           <button type="submit" class="btn btn-primary btn-block">Se Connecter</button>
                        </div>
                    </div>
                </form>

                <p class="m-2">
                    <a href="forgot-password.html">Mot de passe oublié</a>
                </p>
               
            </div>

        </div>

    </div>

</body>
</html>
