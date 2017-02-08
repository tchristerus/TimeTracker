@include('view')
@include('sections/dialogs')

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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$user->forename}} {{$user->surname}}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href="">Projects</a></li>
                            <li><a href="/teams">Teams</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/account/settings">Account settings</a></li>
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
        <div class="col-md-12">
            @foreach($projects as $project)
                <div class="col-md-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$project->name}}</h3>
                            <a href="" data-title="{{$project->name}}" data-href="dashboard/project/remove/{{$project->id}}" data-toggle="modal" data-target="#remove-project-dialog"><i class="material-icons delete-button">clear</i></a>
                        </div>
                        <div class="panel-body">
                            <strong>Description: </strong>
                            <p>{{$project->description}}</p>
                            <i class="fa fa-clock-o fa-1x vcenter"></i><strong> 200 hours total</strong><br>
                            <i class="fa fa-hourglass-start fa-1x vcenter"></i> Not active
                            <a class="btn btn-raised btn-info btn-block">Start<div class="ripple-container"></div></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<a href="" class="btn btn-danger btn-fab btn-fab-add" data-toggle="modal" data-target="#add-project-dialog"><i class="material-icons">add</i><div class="ripple-container"></div></a>

@yield('add_project_dialog')
@yield('remove_project_warning_dialog')

@yield('scripts')

</body>
</html>