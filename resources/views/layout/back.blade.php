<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="icon" href="Favicon.png">
    
    <link href="/plugins/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/plugins/datatable/datatables.min.css" rel="stylesheet" type="text/css">
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
    <link href="/css/site.css" rel="stylesheet">
    
    <script src="/js/app.js"></script>
    <script src="/plugins/datatable/datatables.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>

    <title>Access Manager</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Access Manager</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">dashboard</a>
                </li>
                @auth
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">logout <i class="fas fa-sign-out-alt"></i></a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>
                @endif
            </ul>          
        </div>
    </div>
</nav>

    <div class="container">
        @yield('content')
    </div>
    <form id="frmDelete" method="post" accept-charset="UTF-8" style="display:hidden;">
        <input name="_method" value="DELETE" type="hidden">
        {{csrf_field()}}
    </form>
    @yield("script")
</body>
</html>