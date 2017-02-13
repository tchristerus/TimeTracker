@section('teams_content')
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
@endsection