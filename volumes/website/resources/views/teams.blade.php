@include('view')
@include('sections/navbar')
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

    <nav class="navbar navbar-default navbar-no-margin-bottom">
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
                            <li><a href="/dashboard">Projects</a></li>
                            <li class="active"><a href="">Teams</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/account/settings">Account settings</a></li>
                            <li><a href="/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>

    <div class="row">
        @if(count($teams) > 0)
            <div class="col-md-4">
                <div class="whitespace-30"></div>
                <div class="list-group">

                    @foreach($teams as $team)
                        <div class="list-group-item">
                            <div class="row-action-primary">
                                <i class="material-icons">people</i>
                            </div>
                            <div class="row-content">
                                <h4 class="list-group-item-heading">{{$team->title}}</h4>

                                <p class="list-group-item-text">{{$team->description}}</p>
                            </div>
                        </div>
                        <div class="list-group-separator"></div>
                    @endforeach


                </div>
            </div>

            <div class="col-md-8 no-padding">
                <div class="whitespace-30"></div>

                <div class="bs-component">
                    <div class="alert alert-dismissible alert-info">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Info</strong> No team selected. Please click on one of the teams on the left.
                    </div>
                </div>

            </div>

        @else
            <div class="row">
                <div class="col-md-12 no-padding">
                    <div class="whitespace-30"></div>

                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Oops!</strong> You don't have any teams created yet. Click the button at the right bottom of the page in order to create one.
                        </div>
                    </div>

                </div>
            </div>
        @endif

    </div>
</div>

<a href="" class="btn btn-danger btn-fab btn-fab-add" data-toggle="modal" data-target="#add-project-dialog"><i class="material-icons">add</i><div class="ripple-container"></div></a>

@yield('add_project_dialog')
@yield('remove_project_warning_dialog')

@yield('scripts')

</body>
</html>