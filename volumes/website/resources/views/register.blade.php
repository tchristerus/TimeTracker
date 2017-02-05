@include('view')
@include('sections/forms')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Register</title>

   @yield('css')

</head>
<body>
<div class="container-fluid">

    @yield('navbar')

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

                @yield('register')

            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>


@yield('scripts')

</body>
</html>