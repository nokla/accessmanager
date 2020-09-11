<html>
<head>
        <meta charset="utf-8">
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link href="/css/site.css" rel="stylesheet">
    
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<!------ Include the above in your HEAD tag ---------->
</head>
<body class="login-page">
    <div class="wrapper fadeInDown">
        <div id="formContent" class="bloc-formulaire-login">
            <!-- Tabs Titles -->
            <!-- Login Form -->
            {{Form::open(['route' => 'postLogin', 'method' => 'post'])}}
            <input type="text" id="email" class="fadeIn second form-control" name="email" placeholder="Login">
            <input type="password" id="password" class="fadeIn third form-control" name="password" placeholder="Password">
            <input type="submit" class="fadeIn fourth btn-login" value="Log In">
            {{ Form::close() }}
            <!-- Remind Passowrd -->
            <!-- <div id="formFooter">
            </div> -->
        </div>
    </div>
</body>
</html>
