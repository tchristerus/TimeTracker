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
        @if(count($ownTeams) > 0 || count($joinedTeams) > 0 )
            <div class="col-md-4">
                <div class="whitespace-30"></div>
                <div class="list-group">
                    <h5 class="text-center">Your teams</h5>
                    @foreach($ownTeams as $ownTeam)
                        <div class="list-group-item cursor-click" data-teamId="{{$ownTeam->id}}" data-owned="true">
                            <div class="row-action-primary">
                                <i class="material-icons">people</i>
                            </div>
                            <div class="row-content">
                                <h4 class="list-group-item-heading">{{$ownTeam->name}}</h4>

                                <p class="list-group-item-text">{{ str_limit($ownTeam->description, $limit = 50, $end = '...') }}</p>
                            </div>
                        </div>
                        <div class="list-group-separator"></div>
                    @endforeach
                    <h5 class="text-center">Teams you participate in</h5>
                    @foreach($joinedTeams as $joinedTeam)
                        <div class="list-group-item cursor-click" data-teamId="{{$joinedTeam->id}}" data-owned="false">
                            <div class="row-action-primary">
                                <i class="material-icons">people</i>
                            </div>
                            <div class="row-content">
                                <h4 class="list-group-item-heading">{{$joinedTeam->name}}</h4>

                                <p class="list-group-item-text">{{ str_limit($joinedTeam->description, $limit = 50, $end = '...') }}</p>
                            </div>
                        </div>
                        <div class="list-group-separator"></div>
                    @endforeach

                </div>
                <a href="" class="btn btn-raised btn-success btn-add-project" data-toggle="modal" data-target="#create-team-dialog" >Create team<div class="ripple-container"></div></a></div>

            <div class="col-md-8 no-padding">
                <div class="whitespace-30"></div>

                <div id="member-results">

                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Info</strong> No team selected. Please click on one of the teams on the left.
                        </div>
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
            <a href="" class="btn btn-danger btn-fab btn-fab-add" data-toggle="modal" data-target="#create-team-dialog"><i class="material-icons">add</i><div class="ripple-container"></div></a>
        @endif

            <a href="" id="btn-add-person" class="btn btn-danger btn-fab btn-fab-add hidden" data-toggle="modal" data-target="#invite-user-dialog" data-teamId=""><i class="material-icons">person_add</i><div class="ripple-container"></div></a>
    </div>
</div>


@yield('create_team_dialog')
@yield('invite_user_dialog')

@yield('scripts')

<script>
    $('div[data-teamId]').click(function(){
        var element = $(this);
        $( "#member-results" ).html('<div class="text-center">LOADING...</div>');


        // Ressetting all icons
        $('div[data-teamId] div i').each(function(){
            $(this).html('people');
        })


        //loading icon while fetching data
        element.find('div i').html('swap_vert');

        $.post("/dashboard/team/members", {'id': $(this).attr('data-teamId'),'_token': '{{ csrf_token() }}'}, function( data ) {
            $( "#member-results" ).html( data );
            element.find('div i').html('arrow_forward')

            if(element.attr('data-owned') == "true") {
                $('#btn-add-person').attr('data-teamId', element.attr('data-teamId'));
                $('#btn-add-person').removeClass('hidden');
            }else{
                if(!$('#btn-add-person').hasClass('hidden')){
                    $('#btn-add-person').addClass('hidden');
                }
            }
        });
    });

    @if(!$errors->isEmpty())
        $('#create-team-dialog').modal('show');
    @endif

    // are you sure to remove project ... dialog
    $('#invite-user-dialog').on('show.bs.modal', function(e) {
        console.log($(e.relatedTarget).attr('data-teamId'));
        $(this).find('#teamIdValue').attr('value', $(e.relatedTarget).attr('data-teamId'));
    });
</script>

</body>
</html>