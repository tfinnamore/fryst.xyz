<!DOCTYPE html>
<html>
    <head>
        <title>Fryst</title>

        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/custom.css">

    </head>
    <body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Fryst.xyz

                  <div class="pull-right">

                    @yield('menubar')

                  </div>

                </div>
                <div class="panel-body">

                @yield('content')

                </div>
            </div>
        </div>
    </div>
</div>
@yield('scripts')

    </body>
</html>
