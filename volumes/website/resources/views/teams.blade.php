@include('view')
@include('sections/navbar/navbar_dashboard')
@include('sections/navbar')
@include('sections/dialogs')
@include('sections/teams/teams_content')

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

    @yield('navbar')

    <div class="row">
        @yield('teams_content')
    </div>
</div>


@yield('create_team_dialog')
@yield('invite_user_dialog')

@yield('scripts')
@yield('scripts_custom_teams')

</body>
</html>