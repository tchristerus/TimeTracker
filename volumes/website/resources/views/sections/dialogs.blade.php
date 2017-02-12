@section('add_project_dialog')
    <div id="add-project-dialog" class="modal fade" tabindex="-1" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Create new project</h4>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/project/add" method="post">
                        {{csrf_field()}}

                        <div class="form-group label-floating is-empty">
                            <label for="name" class="control-label">Project title</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="form-group label-floating is-empty">
                            <label for="description" class="control-label">Description</label>
                            <textarea id="description" name="description" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-raised btn-info btn-block" value="Create project"><div class="ripple-container"></div></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('remove_project_warning_dialog')
    <div id="remove-project-dialog" class="modal fade" tabindex="-1" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Are you sure you want to remove this project?</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove project:  <strong id="project-name"></strong>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" id="btn_yes">Yes<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 38.6563px; top: 12px; background-color: rgb(0, 150, 136); transform: scale(10.875);"></div></div></a>
                    <a class="btn btn-primary btn-dismiss" data-dismiss="modal">No<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 38.6563px; top: 12px; background-color: rgb(0, 150, 136); transform: scale(10.875);"></div></div></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('create_team_dialog')
    <div id="create-team-dialog" class="modal fade" tabindex="-1" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Create new team</h4>
                </div>
                <div class="modal-body">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                    <form action="/dashboard/team/create" method="post">
                        {{csrf_field()}}

                        <div class="form-group label-floating is-empty">
                            <label for="name" class="control-label">Team name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                        </div>

                        <div class="form-group label-floating is-empty">
                            <label for="description" class="control-label">Description</label>
                            <textarea id="description" name="description" class="form-control">{{old('description')}}</textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-raised btn-info btn-block" value="Create team"><div class="ripple-container"></div></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection