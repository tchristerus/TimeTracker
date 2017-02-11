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
                    <p style="clear:both">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In molestie elementum dui eget aliquam. Aliquam non ante arcu. Nulla posuere ipsum risus, ut hendrerit metus dignissim non. In mauris nunc, imperdiet sed turpis non, hendrerit pulvinar ante. Cras tincidunt molestie lobortis. Pellentesque ut lobortis arcu, et gravida eros. In turpis arcu, elementum eu nunc id, sodales gravida ipsum. Curabitur vulputate justo ut nulla iaculis, ac sagittis purus fringilla.

                        Fusce faucibus pretium turpis posuere suscipit. Maecenas faucibus pellentesque nibh, volutpat rhoncus leo commodo eget. Donec rutrum elit in auctor tristique. Nulla vehicula interdum magna, sed posuere nisl sollicitudin id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec nec ligula id dui lobortis fringilla. Sed quis consectetur metus, non sodales eros. Curabitur mattis blandit risus vitae porta.</p>
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