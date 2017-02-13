@include('view')
@include('sections/navbar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    @yield('css')


</head>
<body>
<div class="container-fluid">

    @yield('navbar')

    <div class="col-md-8">
        <div class="well page active" id="dropdown">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="header">Time Tracker started development!</h2>
                    <p>
                        Have you ever wondered how many hours you have worked on a project but did not keep track of it?
                        I had the same problem and therefore I have crated this tool, it includes single project tracking but also team projects. Which means you can create your own team! and keep track of all the people you have invited. Whenever a user stops working on something you will be able to see what they did and how long they worked on it.

                        Do not wait any longer and sign up to see it yourself!
                    </p>
                </div>
                <div class="col-md-4">
                    <img class="img-responsive" src="img/cartoon.jpg"/>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Latest news!</div>
            <div class="panel-body">
                Team system almost done!<br>
                13/02/2017
                <br><br>
                Login and register is done!<br>
                05/02/2017
                <br><br>
                Started working on Time tracker!<br>
                04/02/2017
            </div>
        </div>
    </div>
</div>

@yield('scripts')

</body>
</html>