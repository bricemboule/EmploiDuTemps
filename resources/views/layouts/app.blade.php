
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ESSFAR</title>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(["resources/css/app.css", "resources/js/app.js"])
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

       <x-hearder />


        @yield('container')

       <x-sidebar />
       <x-footer />
    </div>
</body>
</html>
