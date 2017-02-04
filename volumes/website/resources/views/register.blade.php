<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Register</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Bootstrap Material Design -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-material-design.min.css">
    <link rel="stylesheet" type="text/css" href="css/ripples.min.css">

    <link rel="stylesheet" href="css/main.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Time tracker</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/login">Login <span class="sr-only"></span></a></li>
                    <li class="active"><a href="/register">Register</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>

    <div class="col-md-12 ">
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <div class="well page">
                <h1 class="header text-center">Register</h1>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                <form method="POST">
                    {{csrf_field()}}

                    <div class="form-group label-floating is-empty">
                        <label for="username" class="control-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>

                    <div class="form-group label-floating is-empty">
                        <label for="email" class="control-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="form-group label-floating is-empty">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="form-group label-floating is-empty">
                        <label for="password2" class="control-label">Re-enter password</label>
                        <input type="password" class="form-control" id="password2" name="password2">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-raised btn-info btn-block" value="Register"><div class="ripple-container"></div></a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/material.min.js"></script>
<script src="js/ripples.min.js"></script>

<!-- Initializing material design -->
<script>
    $.material.init();
</script>
</body>
</html>