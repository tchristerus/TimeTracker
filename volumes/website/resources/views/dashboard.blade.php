@include('view')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard</title>

    @yield('css')

</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Dashboard</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$name}}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Projects</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Account settings</a></li>
                            <li><a href="/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>

    @if(session()->has('registered'))
        <div class="col-md-12">
            <div class="bs-component">
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong> {{ session('registered') }}
                </div>
            </div>
        </div>

    @endif

    <div class="row">
        <div class="col-md-3 well">
            <h1 class="header text-center">Latest actions</h1>
            <div class="bs-component">
                <div class="list-group">
                    <div class="list-group-item">
                        <div class="row-picture">
                            <img class="circle" src="img/profileImage.jpg" alt="icon">
                        </div>
                        <div class="row-content">
                            <h4 class="list-group-item-heading">Worked 25 minutes</h4>

                            <p class="list-group-item-text">You worked for 25 minutes on project 'TimeTracker'</p>
                        </div>
                    </div>
                    <div class="list-group-separator"></div>
                    <div class="list-group-item">
                        <div class="row-picture">
                            <img class="circle" src="img/profileImage.jpg" alt="icon">
                        </div>
                        <div class="row-content">
                            <h4 class="list-group-item-heading">Modified</h4>

                            <p class="list-group-item-text">You modified project 'TimeTracker'</p>
                        </div>
                    </div>
                    <div class="list-group-separator"></div>
                </div>
            </div>
        </div>
        <div class="col-md-9">

            @for ($i = 0; $i < 10; $i++)
                <div class="col-md-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Project {{$i+1}}</h3>
                        </div>
                        <div class="panel-body">
                            <i class="fa fa-clock-o fa-1x vcenter"></i><strong> Worked 352 hours on this project!</strong><br>
                            <i class="fa fa-hourglass-start fa-1x vcenter"></i> Not active
                            <a class="btn btn-raised btn-info btn-block">Start<div class="ripple-container"></div></a>
                        </div>
                    </div>
                </div>
             @endfor
        </div>
    </div>
</div>


@yield('scripts')
</body>
</html>